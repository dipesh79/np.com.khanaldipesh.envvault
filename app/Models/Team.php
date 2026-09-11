<?php

namespace App\Models;

use Database\Factories\TeamFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Team extends Model
{
    /** @use HasFactory<TeamFactory> */
    use HasFactory;

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
            ->using(TeamUser::class)
            ->withTimestamps();
    }

    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class, 'organization_id');
    }

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class)
            ->using(ProjectTeam::class)
            ->withTimestamps()
            ->withPivot(['role']);
    }
}
