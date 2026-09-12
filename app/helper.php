<?php

use App\Enums\OrganizationUserRole;
use App\Enums\ProjectTeamRole;
use App\Models\Environment;
use App\Models\Organization;
use App\Models\OrganizationUser;
use App\Models\Project;
use Filament\Facades\Filament;

if (! function_exists('canAccessOrganization')) {
    function canAccessOrganization(): bool
    {
        /** @var Organization $organization */
        $organization = Filament::getTenant();
        $organizationUser = OrganizationUser::where('organization_id', $organization->id)
            ->where('user_id', auth()->id())
            ->first();
        if (! $organizationUser) {
            return false;
        }
        if (
            auth()->id() === $organization->owner_id ||
            $organizationUser->role === OrganizationUserRole::OWNER->value ||
            $organizationUser->role === OrganizationUserRole::ADMIN->value
        ) {
            return true;
        }

        return false;
    }

    if (! function_exists('canAccessProject')) {
        function canAccessProject(Project $project): bool
        {
            if (canAccessOrganization()) {
                return true;
            }

            $userId = auth()->id();

            return $project->projectTeams()
                ->whereHas('team.users', function ($query) use ($userId) {
                    $query->where('users.id', $userId);
                })
                ->whereIn('role', [ProjectTeamRole::ADMIN->value, ProjectTeamRole::EDITOR->value])
                ->exists();
        }
    }

    if (! function_exists('canAccessEnvironment')) {
        function canAccessEnvironment(Environment $environment): bool
        {
            return canAccessProject($environment->project);
        }
    }
}
