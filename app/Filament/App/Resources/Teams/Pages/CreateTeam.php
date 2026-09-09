<?php

namespace App\Filament\App\Resources\Teams\Pages;

use App\Filament\App\Resources\Teams\TeamResource;
use App\Filament\Concerns\RedirectToIndex;
use Filament\Resources\Pages\CreateRecord;

class CreateTeam extends CreateRecord
{
    use RedirectToIndex;

    protected static string $resource = TeamResource::class;
}
