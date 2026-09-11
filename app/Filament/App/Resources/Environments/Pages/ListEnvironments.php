<?php

namespace App\Filament\App\Resources\Environments\Pages;

use App\Filament\App\Resources\Environments\EnvironmentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEnvironments extends ListRecords
{
    protected static string $resource = EnvironmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
