<?php

namespace App\Filament\App\Resources\Teams\Schemas;

use App\Models\OrganizationUser;
use Filament\Facades\Filament;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TeamForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Team Details')
                    ->description('Basic information about the team')
                    ->icon('heroicon-o-rectangle-stack')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('name')
                            ->label('Team Name')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Engineering Team')
                            ->columnSpan(1),

                        Hidden::make('organization_id')
                            ->default(Filament::getTenant()->id),
                        Select::make('users')
                            ->relationship(
                                name: 'users',
                                titleAttribute: 'name',
                                modifyQueryUsing: function ($query) {
                                    $organizationId = Filament::getTenant()->id;

                                    $query->whereIn(
                                        'users.id',
                                        OrganizationUser::where('organization_id', $organizationId)
                                            ->select('user_id')
                                    );
                                }
                            )
                            ->label('Users')
                            ->multiple()
                            ->searchable()
                            ->preload(),
                    ]),
            ]);
    }
}
