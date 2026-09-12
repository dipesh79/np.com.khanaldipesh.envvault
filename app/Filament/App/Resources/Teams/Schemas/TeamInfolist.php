<?php

namespace App\Filament\App\Resources\Teams\Schemas;

use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TeamInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                Section::make('Team Details')
                    ->description('Basic information about the team')
                    ->icon('heroicon-o-rectangle-stack')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('name')
                            ->label('Team Name')
                            ->weight('bold')
                            ->size('lg')
                            ->columnSpan(2),
                    ]),

                Section::make('Timestamps')
                    ->description('Creation and update timestamps')
                    ->icon('heroicon-o-clock')
                    ->collapsible()
                    ->columns(2)
                    ->schema([
                        TextEntry::make('created_at')
                            ->label('Created At')
                            ->dateTime()
                            ->icon('heroicon-o-calendar')
                            ->color('gray')
                            ->placeholder('-')
                            ->columnSpan(1),

                        TextEntry::make('updated_at')
                            ->label('Last Updated')
                            ->dateTime()
                            ->icon('heroicon-o-arrow-path')
                            ->color('gray')
                            ->placeholder('-')
                            ->columnSpan(1),
                    ]),

                Section::make('Members')
                    ->description('Users assigned to this team')
                    ->icon('heroicon-o-users')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        RepeatableEntry::make('users')
                            ->label('Users')
                            ->schema([
                                TextEntry::make('name')
                                    ->label('Name')
                                    ->weight('bold'),
                                TextEntry::make('email')
                                    ->label('Email')
                                    ->color('gray'),
                            ])
                            ->columns(2)
                            ->columnSpan(2),
                    ]),
            ]);
    }
}
