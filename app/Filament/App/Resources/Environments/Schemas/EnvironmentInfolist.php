<?php

namespace App\Filament\App\Resources\Environments\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\RepeatableEntry\TableColumn;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class EnvironmentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                Section::make('Environment Details')
                    ->description('Basic information about the environment')
                    ->icon('heroicon-o-server')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('tag')
                            ->label('Environment Tag')
                            ->badge()
                            ->weight('bold')
                            ->size('lg')
                            ->columnSpan(1),

                        TextEntry::make('project.name')
                            ->label('Project')
                            ->icon('heroicon-o-briefcase')
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

                Section::make('Environment Values')
                    ->description('Key-value pairs defined for this environment')
                    ->icon('heroicon-o-key')
                    ->columnSpanFull()
                    ->schema([
                        RepeatableEntry::make('environmentValues')
                            ->table([
                                TableColumn::make('Key'),
                                TableColumn::make('Value'),
                                TableColumn::make('Gap'),
                            ])
                            ->schema([
                                TextEntry::make('key')
                                    ->label('Key')
                                    ->weight('bold')
                                    ->fontFamily('mono'),

                                TextEntry::make('value')
                                    ->label('Value')
                                    ->fontFamily('mono')
                                    ->limit(50),

                                IconEntry::make('gap_after')
                                    ->label('Gap After')
                                    ->boolean(),
                            ])
                            ->contained(false),
                    ]),
            ]);
    }
}
