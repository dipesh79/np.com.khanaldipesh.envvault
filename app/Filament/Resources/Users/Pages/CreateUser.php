<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Concerns\RedirectToIndex;
use App\Filament\Resources\Users\UserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    use RedirectToIndex;

    protected static string $resource = UserResource::class;
}
