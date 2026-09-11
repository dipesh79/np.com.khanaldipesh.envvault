<?php

namespace Database\Factories;

use App\Enums\OrganizationUserRole;
use App\Models\Organization;
use App\Models\OrganizationUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<OrganizationUser>
 */
class OrganizationUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->create()->id,
            'organization_id' => Organization::factory()->create()->id,
            'role' => fake()->randomElement(OrganizationUserRole::cases()),
        ];
    }
}
