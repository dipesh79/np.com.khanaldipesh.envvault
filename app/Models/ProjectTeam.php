<?php

namespace App\Models;

use App\Enums\ProjectTeamRole;
use Database\Factories\ProjectTeamFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProjectTeam extends Pivot
{
    public $incrementing = true;

    /** @use HasFactory<ProjectTeamFactory> */
    use HasFactory;

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    protected function casts(): array
    {
        return [
            'role' => ProjectTeamRole::class,
        ];
    }
}
