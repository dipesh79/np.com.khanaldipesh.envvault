<?php

namespace App\Filament\App\Resources\Environments;

use App\Filament\App\Resources\Environments\Pages\CreateEnvironment;
use App\Filament\App\Resources\Environments\Pages\EditEnvironment;
use App\Filament\App\Resources\Environments\Pages\ListEnvironments;
use App\Filament\App\Resources\Environments\Pages\ViewEnvironment;
use App\Filament\App\Resources\Environments\Schemas\EnvironmentForm;
use App\Filament\App\Resources\Environments\Schemas\EnvironmentInfolist;
use App\Filament\App\Resources\Environments\Tables\EnvironmentsTable;
use App\Models\Environment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class EnvironmentResource extends Resource
{
    protected static ?string $model = Environment::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Server;

    protected static string|null|\UnitEnum $navigationGroup = 'Organization Management';

    protected static ?int $navigationSort = 5;

    protected static ?string $recordTitleAttribute = 'tag';

    public static function getNavigationBadge(): ?string
    {
        return (string)static::getEloquentQuery()->count();
    }

    public static function getEloquentQuery(): Builder
    {
        if (canAccessOrganization()) {
            return parent::getEloquentQuery();
        }

        return parent::getEloquentQuery()
            ->whereHas('project', function ($projectQuery) {
                $projectQuery->whereHas('teams', function ($teamQuery) {
                    $teamQuery->whereHas('users', function ($userQuery) {
                        $userQuery->where('user_id', auth()->id());
                    });
                });
            });

    }

    public static function form(Schema $schema): Schema
    {
        return EnvironmentForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return EnvironmentInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EnvironmentsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListEnvironments::route('/'),
            'create' => CreateEnvironment::route('/create'),
            'view' => ViewEnvironment::route('/{record}'),
            'edit' => EditEnvironment::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return canAccessOrganization();
    }

    public static function canEdit(Model $record): bool
    {
        return canAccessEnvironment($record);
    }
}
