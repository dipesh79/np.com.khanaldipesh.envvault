<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                Section::make('Personal Information')
                    ->description('Basic user details and contact information')
                    ->icon('heroicon-o-user')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('name')
                            ->label('Full Name')
                            ->weight('bold')
                            ->size('lg')
                            ->columnSpan(1),

                        TextEntry::make('email')
                            ->label('Email Address')
                            ->icon('heroicon-o-envelope')
                            ->copyable()
                            ->copyMessage('Email address copied')
                            ->color('primary')
                            ->columnSpan(1),
                    ]),

                Section::make('Account Security')
                    ->description('Password and authentication settings')
                    ->icon('heroicon-o-lock-closed')
                    ->columns(2)
                    ->schema([
                        IconEntry::make('is_admin')
                            ->label('Admin')
                            ->boolean(),
                        TextEntry::make('email_verified_at')
                            ->label('Email Verified')
                            ->dateTime()
                            ->badge()
                            ->color(fn ($state) => $state ? 'success' : 'danger')
                            ->formatStateUsing(fn ($state) => $state ? $state->format('M d, Y H:i') : 'Not Verified')
                            ->icon(fn ($state) => $state ? 'heroicon-o-check-circle' : 'heroicon-o-x-circle')
                            ->columnSpan(1),

                    ]),

                Section::make('System Information')
                    ->description('Metadata and timestamps')
                    ->icon('heroicon-o-information-circle')
                    ->collapsible()
                    ->columns(2)
                    ->schema([
                        TextEntry::make('created_at')
                            ->label('Created At')
                            ->dateTime()
                            ->icon('heroicon-o-calendar')
                            ->color('gray')
                            ->columnSpan(1),

                        TextEntry::make('updated_at')
                            ->label('Last Updated')
                            ->dateTime()
                            ->icon('heroicon-o-arrow-path')
                            ->color('gray')
                            ->columnSpan(1),

                        TextEntry::make('id')
                            ->label('User ID')
                            ->copyable()
                            ->icon('heroicon-o-hashtag')
                            ->color('gray')
                            ->columnSpan(1),
                    ]),
            ]);
    }
}
