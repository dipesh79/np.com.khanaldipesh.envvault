<?php

namespace App\Filament\App\Resources\Projects\Schemas;

use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProjectInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                Section::make('Project Details')
                    ->description('Basic information about the project')
                    ->icon('heroicon-o-briefcase')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('name')
                            ->label('Project Name')
                            ->weight('bold')
                            ->size('lg'),

                        TextEntry::make('owner.name')
                            ->label('Owner')
                            ->icon('heroicon-o-user')
                            ->color('primary')
                            ->placeholder('-')
                            ->columnSpan(1),
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

                Section::make('Teams')
                    ->description('Teams assigned to this project')
                    ->icon('heroicon-o-user-group')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        RepeatableEntry::make('teams')
                            ->label('Teams')
                            ->schema([
                                TextEntry::make('name')
                                    ->label('Name')
                                    ->weight('bold'),

                                TextEntry::make('pivot.role')
                                    ->label('Role')
                                    ->badge()
                                    ->formatStateUsing(fn ($state): string => ucfirst(is_string($state) ? $state : $state->value))
                                    ->color(fn ($state): string => match (is_string($state) ? $state : $state->value) {
                                        'admin' => 'success',
                                        'editor' => 'warning',
                                        'viewer' => 'info',
                                        default => 'gray',
                                    }),
                            ])
                            ->columns()
                            ->columnSpan(2),
                    ]),
            ]);
    }
}
