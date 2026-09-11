<?php

namespace App\Models;

use Database\Factories\EnvironmentValueFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EnvironmentValue extends Model
{
    /** @use HasFactory<EnvironmentValueFactory> */
    use HasFactory;

    public function environment(): BelongsTo
    {
        return $this->belongsTo(Environment::class, 'environment_id');
    }

    protected function casts(): array
    {
        return [
            'value' => 'encrypted',
            'gap_after' => 'boolean',
        ];
    }
}
