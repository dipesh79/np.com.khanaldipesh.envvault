<?php

namespace App\Observers;

use App\Mail\Invitation\InvitationEmail;
use App\Models\Invitation;
use Illuminate\Support\Facades\Mail;

class InvitationObserver
{
    public function created(Invitation $invitation): void
    {
        $email = $invitation->invitee?->email ?? $invitation->email;

        if ($email) {
            Mail::to($email)->send(new InvitationEmail($invitation));
        }
    }
}
