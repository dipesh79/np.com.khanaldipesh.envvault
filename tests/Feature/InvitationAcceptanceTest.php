<?php

use App\Actions\AcceptInvitation;
use App\Enums\OrganizationUserRole;
use App\Models\Invitation;
use App\Models\Organization;
use App\Models\OrganizationUser;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

beforeEach(function () {
    Mail::fake();
});

describe('Invitation Creation', function () {
    test('invitation can be created', function () {
        $invitation = Invitation::factory()->create();

        expect($invitation)->toBeInstanceOf(Invitation::class);
        expect($invitation->id)->not->toBeNull();
    });

    test('token is hashed in database', function () {
        $plainToken = Str::random(60);
        $invitation = Invitation::factory()->create(['token' => $plainToken]);

        expect($invitation->token)->not->toBe($plainToken);
        expect($invitation->token)->toBe(hash('sha256', $plainToken));
    });

    test('plain token is available on model after creation', function () {
        $plainToken = Str::random(60);
        $invitation = Invitation::factory()->create(['token' => $plainToken]);

        expect($invitation->plainToken)->toBe($plainToken);
    });

    test('invitation contains correct organization', function () {
        $organization = Organization::factory()->create();
        $invitation = Invitation::factory()->create(['organization_id' => $organization->id]);

        expect($invitation->organization_id)->toBe($organization->id);
        expect($invitation->organization->name)->toBe($organization->name);
    });

    test('invitation contains correct email', function () {
        $email = 'test@example.com';
        $invitation = Invitation::factory()->create(['email' => $email]);

        expect($invitation->email)->toBe($email);
    });

    test('invitation contains correct role', function () {
        $invitation = Invitation::factory()->create(['role' => OrganizationUserRole::ADMIN]);

        expect($invitation->role)->toBe(OrganizationUserRole::ADMIN);
    });

    test('invitation expiry is set', function () {
        $invitation = Invitation::factory()->create(['expires_at' => now()->addDays(5)]);

        expect($invitation->expires_at)->toBeInstanceOf(Carbon\Carbon::class);
        expect($invitation->expires_at->isFuture())->toBeTrue();
    });
});

describe('Guest Invitation Flow', function () {
    test('guest can view invitation', function () {
        $invitation = Invitation::factory()->create();
        $plainToken = $invitation->plainToken;

        $response = $this->get(route('invitations.show', $plainToken));

        $response->assertStatus(200);
    });

    test('guest sees login and register links', function () {
        $invitation = Invitation::factory()->create();
        $plainToken = $invitation->plainToken;

        $response = $this->get(route('invitations.show', $plainToken));

        $response->assertSee('Log In');
        $response->assertSee('Register');
        $response->assertSee($invitation->organization->name);
    });

    test('invitation token is stored in session for redirect after auth', function () {
        $invitation = Invitation::factory()->create();
        $plainToken = $invitation->plainToken;

        $this->get(route('invitations.show', $plainToken));

        expect(session('url.intended'))->toBe(route('invitations.show', $plainToken));
    });
});

describe('Invitation Acceptance', function () {
    test('authenticated user can accept invitation', function () {
        $user = User::factory()->create(['email' => 'invitee@example.com']);
        $invitation = Invitation::factory()->create([
            'invitee_id' => $user->id,
            'email' => null,
            'expires_at' => now()->addDays(7),
        ]);

        $this->actingAs($user);

        $response = $this->post(route('invitations.accept', $invitation->plainToken));

        $response->assertRedirect('/app');
    });

    test('organization user is created on acceptance', function () {
        $user = User::factory()->create(['email' => 'invitee@example.com']);
        $invitation = Invitation::factory()->create([
            'invitee_id' => $user->id,
            'email' => null,
            'expires_at' => now()->addDays(7),
        ]);

        $this->actingAs($user);
        $this->post(route('invitations.accept', $invitation->plainToken));

        expect(OrganizationUser::where('organization_id', $invitation->organization_id)
            ->where('user_id', $user->id)
            ->exists())->toBeTrue();
    });

    test('correct role is assigned on acceptance', function () {
        $user = User::factory()->create(['email' => 'invitee@example.com']);
        $invitation = Invitation::factory()->create([
            'invitee_id' => $user->id,
            'role' => OrganizationUserRole::ADMIN,
            'email' => null,
            'expires_at' => now()->addDays(7),
        ]);

        $this->actingAs($user);
        $this->post(route('invitations.accept', $invitation->plainToken));

        $membership = OrganizationUser::where('organization_id', $invitation->organization_id)
            ->where('user_id', $user->id)
            ->first();

        expect($membership->role)->toBe(OrganizationUserRole::ADMIN->value);
    });

    test('invitation is marked as accepted', function () {
        $user = User::factory()->create(['email' => 'invitee@example.com']);
        $invitation = Invitation::factory()->create([
            'invitee_id' => $user->id,
            'email' => null,
            'expires_at' => now()->addDays(7),
        ]);

        $this->actingAs($user);
        $this->post(route('invitations.accept', $invitation->plainToken));

        $invitation->refresh();
        expect($invitation->accepted_at)->not->toBeNull();
    });

    test('user can access organization after acceptance', function () {
        $user = User::factory()->create(['email' => 'invitee@example.com']);
        $invitation = Invitation::factory()->create([
            'invitee_id' => $user->id,
            'email' => null,
            'expires_at' => now()->addDays(7),
        ]);

        $this->actingAs($user);
        $this->post(route('invitations.accept', $invitation->plainToken));

        expect($user->organizations()->where('organizations.id', $invitation->organization_id)->exists())->toBeTrue();
    });
});

describe('Email-Based Invitation Acceptance', function () {
    test('user with matching email can accept invitation by email', function () {
        $user = User::factory()->create(['email' => 'invited@example.com']);
        $organization = Organization::factory()->create();
        $invitation = Invitation::factory()->create([
            'organization_id' => $organization->id,
            'invitee_id' => null,
            'email' => 'invited@example.com',
            'expires_at' => now()->addDays(7),
        ]);

        $this->actingAs($user);
        $this->post(route('invitations.accept', $invitation->plainToken));

        expect(OrganizationUser::where('organization_id', $organization->id)
            ->where('user_id', $user->id)
            ->exists())->toBeTrue();
    });
});

describe('Security', function () {
    test('wrong email cannot accept invitation', function () {
        $invitedUser = User::factory()->create(['email' => 'invited@example.com']);
        $wrongUser = User::factory()->create(['email' => 'wrong@example.com']);
        $invitation = Invitation::factory()->create([
            'invitee_id' => $invitedUser->id,
            'email' => null,
            'expires_at' => now()->addDays(7),
        ]);

        $this->actingAs($wrongUser);
        $response = $this->post(route('invitations.accept', $invitation->plainToken));

        $response->assertRedirect(route('invitations.show', $invitation->plainToken));

        expect(OrganizationUser::where('organization_id', $invitation->organization_id)
            ->where('user_id', $wrongUser->id)
            ->exists())->toBeFalse();
    });

    test('expired invitation cannot be accepted', function () {
        $user = User::factory()->create(['email' => 'invitee@example.com']);
        $invitation = Invitation::factory()->create([
            'invitee_id' => $user->id,
            'email' => null,
            'expires_at' => now()->subDay(),
        ]);

        $this->actingAs($user);
        $response = $this->post(route('invitations.accept', $invitation->plainToken));

        $response->assertRedirect(route('invitations.show', $invitation->plainToken));

        expect(OrganizationUser::where('organization_id', $invitation->organization_id)
            ->where('user_id', $user->id)
            ->exists())->toBeFalse();
    });

    test('already accepted invitation cannot be accepted again', function () {
        $user = User::factory()->create(['email' => 'invitee@example.com']);
        $invitation = Invitation::factory()->create([
            'invitee_id' => $user->id,
            'email' => null,
            'accepted_at' => now(),
            'expires_at' => now()->addDays(7),
        ]);

        $this->actingAs($user);
        $response = $this->post(route('invitations.accept', $invitation->plainToken));

        $response->assertRedirect(route('invitations.show', $invitation->plainToken));
    });

    test('invalid token returns 404', function () {
        $response = $this->get(route('invitations.show', 'invalid-token-12345'));

        $response->assertStatus(404);
    });

    test('opening invitation does not create membership', function () {
        $user = User::factory()->create(['email' => 'invitee@example.com']);
        $invitation = Invitation::factory()->create([
            'invitee_id' => $user->id,
            'email' => null,
            'expires_at' => now()->addDays(7),
        ]);

        $this->actingAs($user);
        $this->get(route('invitations.show', $invitation->plainToken));

        expect(OrganizationUser::where('organization_id', $invitation->organization_id)
            ->where('user_id', $user->id)
            ->exists())->toBeFalse();
    });

    test('login alone does not create membership', function () {
        $user = User::factory()->create(['email' => 'invitee@example.com']);
        $invitation = Invitation::factory()->create([
            'invitee_id' => $user->id,
            'email' => null,
            'expires_at' => now()->addDays(7),
        ]);

        $this->actingAs($user);
        $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        expect(OrganizationUser::where('organization_id', $invitation->organization_id)
            ->where('user_id', $user->id)
            ->exists())->toBeFalse();
    });

    test('duplicate acceptance does not create duplicate membership', function () {
        $user = User::factory()->create(['email' => 'invitee@example.com']);
        $invitation = Invitation::factory()->create([
            'invitee_id' => $user->id,
            'email' => null,
            'expires_at' => now()->addDays(7),
        ]);

        $this->actingAs($user);
        $this->post(route('invitations.accept', $invitation->plainToken));
        $this->post(route('invitations.accept', $invitation->plainToken));

        $membershipCount = OrganizationUser::where('organization_id', $invitation->organization_id)
            ->where('user_id', $user->id)
            ->count();

        expect($membershipCount)->toBe(1);
    });
});

describe('Existing Member', function () {
    test('existing organization member does not get duplicate membership', function () {
        $organization = Organization::factory()->create();
        $user = User::factory()->create(['email' => 'invitee@example.com']);
        $organization->users()->attach($user->id, ['role' => OrganizationUserRole::USER->value]);

        $invitation = Invitation::factory()->create([
            'organization_id' => $organization->id,
            'invitee_id' => $user->id,
            'email' => null,
            'expires_at' => now()->addDays(7),
        ]);

        $this->actingAs($user);
        $this->post(route('invitations.accept', $invitation->plainToken));

        $membershipCount = OrganizationUser::where('organization_id', $organization->id)
            ->where('user_id', $user->id)
            ->count();

        expect($membershipCount)->toBe(1);
    });
});

describe('Invitation Page States', function () {
    test('expired invitation shows expired status', function () {
        $invitation = Invitation::factory()->create([
            'expires_at' => now()->subDay(),
        ]);

        $response = $this->get(route('invitations.show', $invitation->plainToken));

        $response->assertSee('Invitation Expired');
    });

    test('accepted invitation shows already accepted status', function () {
        $user = User::factory()->create();
        $invitation = Invitation::factory()->create([
            'invitee_id' => $user->id,
            'accepted_at' => now(),
            'expires_at' => now()->addDays(7),
        ]);

        $response = $this->get(route('invitations.show', $invitation->plainToken));

        $response->assertSee('Already Accepted');
    });

    test('invitation shows email mismatch for wrong user', function () {
        $invitedUser = User::factory()->create(['email' => 'invited@example.com']);
        $wrongUser = User::factory()->create(['email' => 'wrong@example.com']);
        $invitation = Invitation::factory()->create([
            'invitee_id' => $invitedUser->id,
            'email' => null,
            'expires_at' => now()->addDays(7),
        ]);

        $this->actingAs($wrongUser);
        $response = $this->get(route('invitations.show', $invitation->plainToken));

        $response->assertSee('Wrong Account');
        $response->assertSee('invited@example.com');
    });

    test('invitation shows already member status', function () {
        $organization = Organization::factory()->create();
        $user = User::factory()->create(['email' => 'invitee@example.com']);
        $organization->users()->attach($user->id, ['role' => OrganizationUserRole::USER->value]);

        $invitation = Invitation::factory()->create([
            'organization_id' => $organization->id,
            'invitee_id' => $user->id,
            'email' => null,
            'expires_at' => now()->addDays(7),
        ]);

        $this->actingAs($user);
        $response = $this->get(route('invitations.show', $invitation->plainToken));

        $response->assertSee('Already a Member');
    });
});

describe('AcceptInvitation Action', function () {
    test('action creates organization user and marks invitation accepted', function () {
        $user = User::factory()->create(['email' => 'invitee@example.com']);
        $invitation = Invitation::factory()->create([
            'invitee_id' => $user->id,
            'role' => OrganizationUserRole::ADMIN,
            'email' => null,
            'expires_at' => now()->addDays(7),
        ]);

        app(AcceptInvitation::class)->accept($invitation, $user);

        $invitation->refresh();

        expect($invitation->accepted_at)->not->toBeNull();
        expect(OrganizationUser::where('organization_id', $invitation->organization_id)
            ->where('user_id', $user->id)
            ->exists())->toBeTrue();
    });

    test('action handles already existing membership gracefully', function () {
        $organization = Organization::factory()->create();
        $user = User::factory()->create(['email' => 'invitee@example.com']);
        $organization->users()->attach($user->id, ['role' => OrganizationUserRole::USER->value]);

        $invitation = Invitation::factory()->create([
            'organization_id' => $organization->id,
            'invitee_id' => $user->id,
            'email' => null,
            'expires_at' => now()->addDays(7),
        ]);

        app(AcceptInvitation::class)->accept($invitation, $user);

        $membershipCount = OrganizationUser::where('organization_id', $organization->id)
            ->where('user_id', $user->id)
            ->count();

        expect($membershipCount)->toBe(1);
    });
});
