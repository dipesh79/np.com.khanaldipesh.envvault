<?php

namespace App\Traits;

use App\Models\ActivityLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

trait LogsActivity
{
    protected static function bootLogsActivity(): void
    {
        static::created(function (Model $model) {
            static::logActivity($model, 'created');
        });

        static::updated(function (Model $model) {
            static::logActivity($model, 'updated');
        });

        static::deleted(function (Model $model) {
            static::logActivity($model, 'deleted');
        });
    }

    protected static function logActivity(Model $model, string $event): void
    {
        ActivityLog::create([
            'organization_id' => static::resolveOrganization($model),
            'user_id' => Auth::id(),
            'subject_type' => get_class($model),
            'subject_id' => $model->getKey(),
            'event' => $event,
        ]);
    }

    protected static function resolveOrganization(Model $model): ?int
    {
        return $model->organization_id ?? $model->environment?->organization_id;
    }
}
