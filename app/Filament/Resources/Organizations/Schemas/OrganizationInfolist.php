<?php

namespace App\Filament\Resources\Organizations\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class OrganizationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                Section::make('Organization Details')
                    ->description('Basic information about the organization')
                    ->icon('heroicon-o-building-office-2')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('name')
                            ->label('Organization Name')
                            ->weight('bold')
                            ->size('lg')
                            ->columnSpan(1),

                        TextEntry::make('slug')
                            ->label('Slug')
                            ->icon('heroicon-o-link')
                            ->color('gray')
                            ->columnSpan(1),

                        TextEntry::make('owner.name')
                            ->label('Owner')
                            ->icon('heroicon-o-user')
                            ->color('primary')
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
            ]);
    }
}
