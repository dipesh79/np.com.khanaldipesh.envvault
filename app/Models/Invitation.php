<?php

namespace App\Models;

use App\Enums\OrganizationUserRole;
use App\Observers\InvitationObserver;
use Database\Factories\InvitationFactory;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

#[ObservedBy(InvitationObserver::class)]
class Invitation extends Model
{
    /** @use HasFactory<InvitationFactory> */
    use HasFactory;

    public ?string $plainToken = null;

    public static function hashToken(string $token): string
    {
        return hash('sha256', $token);
    }

    public static function findByToken(string $token): ?static
    {
        $hashed = static::hashToken($token);

        return static::where('token', $hashed)
            ->orWhere('token', $token)
            ->with(['organization', 'inviter', 'invitee'])
            ->first();
    }

    protected static function booted(): void
    {
        static::creating(function (Invitation $invitation) {
            if (filled($invitation->token) && ! Str::contains($invitation->token, '$')) {
                $invitation->plainToken = $invitation->token;
                $invitation->token = static::hashToken($invitation->token);
            }
        });
    }

    public function scopeValid(Builder $query): Builder
    {
        return $query->whereNull('accepted_at')
            ->where('expires_at', '>', now());
    }

    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class, 'organization_id');
    }

    public function inviter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'inviter_id');
    }

    public function invitee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'invitee_id');
    }

    public function isExpired(): bool
    {
        return $this->expires_at->isPast();
    }

    public function isAccepted(): bool
    {
        return $this->accepted_at !== null;
    }

    protected function casts(): array
    {
        return [
            'role' => OrganizationUserRole::class,
            'expires_at' => 'datetime',
            'accepted_at' => 'datetime',
            'rejected_at' => 'datetime',
        ];
    }
}
