<?php

namespace App\Models;

use App\Traits\LogsActivity;
use Database\Factories\EnvironmentFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Environment extends Model
{
    /** @use HasFactory<EnvironmentFactory> */
    use HasFactory, LogsActivity;

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class, 'organization_id');
    }

    public function environmentValues(): HasMany
    {
        return $this->hasMany(EnvironmentValue::class, 'environment_id');
    }
}
