<?php

namespace App\Enums;

enum OrganizationUserRole: string
{
    case OWNER = 'owner';
    case ADMIN = 'admin';
    case USER = 'user';
}
