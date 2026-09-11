<?php

namespace App\Observers;

use App\Mail\Invitation\InvitationEmail;
use App\Models\Invitation;
use Illuminate\Support\Facades\Mail;

class InvitationObserver
{
    /**
     * Handle the Invitation "created" event.
     */
    public function created(Invitation $invitation): void
    {
        $existingUser = $invitation->invitee()->first();
        if ($existingUser) {
            $email = $existingUser->email;
        } else {
            $email = $invitation->email;
        }
        Mail::to($email)->send(new InvitationEmail($invitation));
    }
}
