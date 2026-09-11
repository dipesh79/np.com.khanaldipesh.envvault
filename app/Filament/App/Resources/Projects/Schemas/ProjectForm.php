<?php

namespace App\Filament\App\Resources\Projects\Schemas;

use App\Enums\ProjectTeamRole;
use App\Models\Team;
use Filament\Facades\Filament;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Project Details')
                    ->description('Basic information about the project')
                    ->icon('heroicon-o-briefcase')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('name')
                            ->label('Project Name')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('My Awesome Project')
                            ->columnSpan(1),

                        Hidden::make('organization_id')
                            ->default(Filament::getTenant()->id),

                        Hidden::make('owner_id')
                            ->default(auth()->id())
                            ->hiddenOn(['edit']),
                    ]),

                Section::make('Teams')
                    ->description('Assign teams to this project with their roles')
                    ->icon('heroicon-o-user-group')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        Repeater::make('projectTeams')
                            ->relationship()
                            ->schema([
                                Select::make('team_id')
                                    ->label('Team')
                                    ->relationship(
                                        name: 'team',
                                        titleAttribute: 'name',
                                        modifyQueryUsing: function ($query) {
                                            $organizationId = Filament::getTenant()->id;

                                            $query->whereIn(
                                                'teams.id',
                                                Team::where('organization_id', $organizationId)
                                                    ->select('id')
                                            );
                                        }
                                    )
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->distinct()
                                    ->columnSpan(1),

                                Select::make('role')
                                    ->label('Role')
                                    ->options(ProjectTeamRole::class)
                                    ->required()
                                    ->default(ProjectTeamRole::VIEWER)
                                    ->columnSpan(1),
                            ])
                            ->columnSpan(2)
                            ->defaultItems(0)
                            ->addActionLabel('Add Team'),
                    ]),
            ]);
    }
}
