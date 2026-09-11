<?php

namespace App\Filament\App\Clusters\User;

use BackedEnum;
use Filament\Clusters\Cluster;
use Filament\Support\Icons\Heroicon;

class UserCluster extends Cluster
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::Users;
}
