<?php

namespace App\Filament\App\Resources\Environments\Pages;

use App\Filament\App\Resources\Environments\EnvironmentResource;
use App\Filament\Concerns\RedirectToIndex;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditEnvironment extends EditRecord
{
    use RedirectToIndex;

    protected static string $resource = EnvironmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make()
                ->visible(fn($record) => canAccessEnvironment($record)),
        ];
    }
}
