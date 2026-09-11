<?php

namespace App\Filament\App\Resources\Environments\Schemas;

use Filament\Facades\Filament;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class EnvironmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Environment Details')
                    ->description('Configure the environment settings')
                    ->icon('heroicon-o-server')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        Select::make('project_id')
                            ->label('Project')
                            ->relationship('project', 'name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->placeholder('Select a project')
                            ->columnSpan(1),

                        TextInput::make('tag')
                            ->label('Environment Tag')
                            ->helperText('This will be the environment tag that will be used in the API.')
                            ->unique(
                                ignoreRecord: true,
                                modifyRuleUsing: fn ($rule, callable $get) => $rule->where('project_id', $get('project_id')),
                            )
                            ->datalist([
                                'production',
                                'staging',
                                'development',
                            ])
                            ->placeholder('e.g., production, staging, development')
                            ->required()
                            ->columnSpan(1),
                    ]),

                Section::make('Environment Values')
                    ->description('Define key-value pairs for this environment')
                    ->icon('heroicon-o-key')
                    ->columnSpanFull()
                    ->schema([
                        Repeater::make('environmentValues')
                            ->relationship()
                            ->schema([
                                TextInput::make('key')
                                    ->label('Key')
                                    ->required()
                                    ->placeholder('e.g., APP_KEY')
                                    ->columnSpan(1),

                                Textarea::make('value')
                                    ->label('Value')
                                    ->required()
                                    ->rows(2)
                                    ->maxLength(65535)
                                    ->placeholder('Enter the value')
                                    ->columnSpan(1),

                                Toggle::make('gap_after')
                                    ->label('Gap after')
                                    ->helperText('Add blank line after this variable in .env export')
                                    ->default(false)
                                    ->columnSpan(1),
                            ])
                            ->columns(3)
                            ->defaultItems(0)
                            ->addActionLabel('Add Value')
                            ->reorderable()
                            ->reorderableWithButtons(),
                    ]),

                Hidden::make('organization_id')
                    ->default(Filament::getTenant()->id),
            ]);
    }
}
