<?php

namespace App\Filament\App\Resources\Environments\Pages;

use App\Filament\App\Resources\Environments\EnvironmentResource;
use App\Filament\Concerns\RedirectToIndex;
use Filament\Resources\Pages\CreateRecord;

class CreateEnvironment extends CreateRecord
{
    use RedirectToIndex;

    protected static string $resource = EnvironmentResource::class;
}
