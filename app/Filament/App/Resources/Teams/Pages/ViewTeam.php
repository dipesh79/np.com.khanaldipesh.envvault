<?php

namespace App\Filament\App\Resources\Teams\Pages;

use App\Filament\App\Resources\Teams\TeamResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewTeam extends ViewRecord
{
    protected static string $resource = TeamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make()
                ->visible(canAccessOrganization()),
            DeleteAction::make()
                ->visible(canAccessOrganization()),
        ];
    }
}
