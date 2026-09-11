<?php

namespace App\Http\Controllers;

use App\Actions\AcceptInvitation;
use App\Models\Invitation;
use App\Models\OrganizationUser;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InvitationController extends Controller
{
    public function show(string $token): View|RedirectResponse
    {
        $invitation = Invitation::findByToken($token);

        if (! $invitation) {
            abort(404, 'Invalid invitation link.');
        }

        if ($invitation->isAccepted()) {
            return view('invitations.show', [
                'invitation' => $invitation,
                'status' => 'already_accepted',
            ]);
        }

        if ($invitation->isExpired()) {
            return view('invitations.show', [
                'invitation' => $invitation,
                'status' => 'expired',
            ]);
        }

        $user = auth()->user();

        if ($user) {
            $invitedEmail = $invitation->invitee?->email ?? $invitation->email;

            if (strtolower($user->email) !== strtolower($invitedEmail)) {
                return view('invitations.show', [
                    'invitation' => $invitation,
                    'status' => 'email_mismatch',
                ]);
            }

            $alreadyMember = OrganizationUser::where('organization_id', $invitation->organization_id)
                ->where('user_id', $user->id)
                ->exists();

            if ($alreadyMember) {
                return view('invitations.show', [
                    'invitation' => $invitation,
                    'status' => 'already_member',
                ]);
            }

            return view('invitations.show', [
                'invitation' => $invitation,
                'status' => 'ready',
            ]);
        }

        session()->put('url.intended', route('invitations.show', $token));
        session()->put('invitation_email', $invitation->invitee?->email ?? $invitation->email);

        return view('invitations.show', [
            'invitation' => $invitation,
            'status' => 'guest',
        ]);
    }

    public function accept(Request $request, string $token): RedirectResponse
    {
        $invitation = Invitation::findByToken($token);

        if (! $invitation) {
            abort(404, 'Invalid invitation link.');
        }

        if ($invitation->isExpired()) {
            return redirect()->route('invitations.show', $token)
                ->with('error', 'This invitation has expired.');
        }

        if ($invitation->isAccepted()) {
            return redirect()->route('invitations.show', $token)
                ->with('error', 'This invitation has already been accepted.');
        }

        $user = $request->user();

        if (! $user) {
            return redirect()->route('invitations.show', $token);
        }

        $invitedEmail = $invitation->invitee?->email ?? $invitation->email;

        if (strtolower($user->email) !== strtolower($invitedEmail)) {
            return redirect()->route('invitations.show', $token)
                ->with('error', 'This invitation was sent to a different email address.');
        }

        app(AcceptInvitation::class)->accept($invitation, $user);

        return redirect('/app')
            ->with('success', 'You have successfully joined '.$invitation->organization->name.'!');
    }
}
