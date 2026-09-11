<?php

namespace App\Filament\Resources\Organizations\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class OrganizationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Organization Details')
                    ->description('Basic information about the organization')
                    ->icon('heroicon-o-building-office-2')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('name')
                            ->label('Organization Name')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Acme Corporation')
                            ->columnSpan(1),

                        TextInput::make('slug')
                            ->label('Slug')
                            ->unique(ignoreRecord: true)
                            ->hiddenOn(['create'])
                            ->required()
                            ->placeholder('acme-corporation')
                            ->helperText('Auto-generated from the organization name')
                            ->columnSpan(1),

                        Select::make('owner_id')
                            ->label('Owner')
                            ->relationship('owner', 'name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->placeholder('Select an owner')
                            ->columnSpan(1),
                    ]),
            ]);
    }
}
