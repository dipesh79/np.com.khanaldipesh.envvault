<?php

namespace App\Filament\App\Resources\Projects\Pages;

use App\Filament\App\Resources\Projects\ProjectResource;
use App\Filament\Concerns\RedirectToIndex;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditProject extends EditRecord
{
    use RedirectToIndex;

    protected static string $resource = ProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make()
                ->visible(canAccessOrganization()),
        ];
    }
}
