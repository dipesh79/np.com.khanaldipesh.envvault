<?php

namespace App\Filament\Resources\Organizations\Pages;

use App\Filament\Concerns\RedirectToIndex;
use App\Filament\Resources\Organizations\OrganizationResource;
use Filament\Resources\Pages\CreateRecord;

class CreateOrganization extends CreateRecord
{
    use RedirectToIndex;

    protected static string $resource = OrganizationResource::class;
}
