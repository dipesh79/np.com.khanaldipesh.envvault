<?php

namespace App\Actions;

use App\Models\Invitation;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AcceptInvitation
{
    public function accept(Invitation $invitation, User $user): void
    {
        DB::transaction(function () use ($invitation, $user) {
            $existingMembership = $invitation->organization->users()
                ->where('user_id', $user->id)
                ->exists();

            if (! $existingMembership) {
                $invitation->organization->users()->attach($user->id, [
                    'role' => $invitation->role->value,
                ]);
            }

            $invitation->update(['accepted_at' => now()]);
        });
    }
}
