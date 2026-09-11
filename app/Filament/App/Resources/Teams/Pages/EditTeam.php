<?php

namespace App\Filament\App\Resources\Teams\Pages;

use App\Filament\App\Resources\Teams\TeamResource;
use App\Filament\Concerns\RedirectToIndex;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditTeam extends EditRecord
{
    use RedirectToIndex;

    protected static string $resource = TeamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
