<?php

namespace App\Filament\App\Pages;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Page;
use Filament\Pages\Tenancy\EditTenantProfile;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class EditOrganizationProfile extends EditTenantProfile
{
    public static function getLabel(): string
    {
        return 'Organization';
    }

    public function form(Schema $schema): Schema
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
                            ->required()
                            ->placeholder('acme-corporation')
                            ->helperText('Auto-generated from the organization name')
                            ->columnSpan(1),
                    ]),
            ]);
    }
}
