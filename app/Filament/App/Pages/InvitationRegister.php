<?php

namespace App\Filament\App\Pages;

use Filament\Auth\Pages\Register;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;

class InvitationRegister extends Register
{
    protected function getEmailFormComponent(): Component
    {
        $invitedEmail = session('invitation_email');

        $component = TextInput::make('email')
            ->label(__('filament-panels::auth/pages/register.form.email.label'))
            ->email()
            ->required()
            ->maxLength(255);

        if ($invitedEmail) {
            $component->default($invitedEmail)
                ->readonly()
                ->dehydrated();
        } else {
            $component->unique($this->getUserModel());
        }

        return $component;
    }
}
