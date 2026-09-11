<?php

namespace Database\Factories;

use App\Models\Invitation;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Invitation>
 */
class InvitationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'organization_id' => Organization::factory()->create()->id,
            'inviter_id' => User::factory()->create()->id,
            'invitee_id' => User::factory()->create()->id,
            'role' => 'user',
            'email' => fake()->email(),
            'token' => fake()->uuid(),
            'expires_at' => now()->addDays(7),
            'accepted_at' => null,
            'rejected_at' => null,
        ];
    }
}
