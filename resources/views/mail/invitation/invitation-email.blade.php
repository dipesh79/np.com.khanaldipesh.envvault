<x-mail::message>
# You've been invited!

{{ $invitation->inviter->name }} has invited you to join **{{ $invitation->organization->name }}** as a **{{ ucfirst($invitation->role->value) }}**.

<x-mail::panel>
**Organization:** {{ $invitation->organization->name }}<br>
**Role:** {{ ucfirst($invitation->role->value) }}<br>
**Expires:** {{ $invitation->expires_at->format('M d, Y') }}
</x-mail::panel>

<x-mail::button :url="route('invitations.accept', $invitation->token)">
Accept Invitation
</x-mail::button>

If you don't want to join this organization, you can safely ignore this email.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
