<?php

namespace App\Filament\App\Resources\Projects\Pages;

use App\Filament\App\Resources\Projects\ProjectResource;
use App\Filament\Concerns\RedirectToIndex;
use Filament\Resources\Pages\CreateRecord;

class CreateProject extends CreateRecord
{
    use RedirectToIndex;

    protected static string $resource = ProjectResource::class;
}
