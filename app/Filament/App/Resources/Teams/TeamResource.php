<?php

namespace App\Filament\App\Resources\Teams;

use App\Filament\App\Resources\Teams\Pages\CreateTeam;
use App\Filament\App\Resources\Teams\Pages\EditTeam;
use App\Filament\App\Resources\Teams\Pages\ListTeams;
use App\Filament\App\Resources\Teams\Pages\ViewTeam;
use App\Filament\App\Resources\Teams\Schemas\TeamForm;
use App\Filament\App\Resources\Teams\Schemas\TeamInfolist;
use App\Filament\App\Resources\Teams\Tables\TeamsTable;
use App\Models\Team;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class TeamResource extends Resource
{
    protected static ?string $model = Team::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::UserGroup;

    protected static string|UnitEnum|null $navigationGroup = 'Organization Management';

    protected static ?int $navigationSort = 3;

    protected static ?string $recordTitleAttribute = 'name';

    public static function getNavigationBadge(): ?string
    {
        return (string) self::getEloquentQuery()->count();
    }

    public static function form(Schema $schema): Schema
    {
        return TeamForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return TeamInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TeamsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTeams::route('/'),
            'create' => CreateTeam::route('/create'),
            'view' => ViewTeam::route('/{record}'),
            'edit' => EditTeam::route('/{record}/edit'),
        ];
    }
}
