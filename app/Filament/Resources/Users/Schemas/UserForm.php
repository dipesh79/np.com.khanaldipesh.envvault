<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\CreateRecord;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Personal Information')
                    ->description('Basic user details and contact information')
                    ->icon('heroicon-o-user')
                    ->columns(1)
                    ->schema([
                        TextInput::make('name')
                            ->label('Full Name')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('John Doe')
                            ->columnSpan(1),

                        TextInput::make('email')
                            ->label('Email Address')
                            ->email()
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->placeholder('john.doe@example.com')
                            ->columnSpan(1),

                        Checkbox::make('is_admin')
                            ->label('Admin')
                            ->default(false)
                            ->columnSpan(1),

                    ]),

                Section::make('Account Security')
                    ->description('Password and authentication settings')
                    ->icon('heroicon-o-lock-closed')
                    ->collapsible()
                    ->columns(2)
                    ->schema([
                        TextInput::make('password')
                            ->label('Password')
                            ->password()
                            ->required(fn($livewire) => $livewire instanceof CreateRecord)
                            ->minLength(8)
                            ->same('passwordConfirmation')
                            ->dehydrated(fn($state) => filled($state))
                            ->placeholder('Enter new password')
                            ->helperText('Minimum 8 characters')
                            ->columnSpan(1),

                        TextInput::make('passwordConfirmation')
                            ->label('Confirm Password')
                            ->password()
                            ->required(fn($get) => filled($get('password')))
                            ->placeholder('Confirm your password')
                            ->dehydrated(false)
                            ->columnSpan(1),
                    ])
            ]);
    }
}
