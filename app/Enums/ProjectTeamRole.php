<?php

namespace App\Enums;

enum ProjectTeamRole: string
{
    case ADMIN = 'admin';
    case EDITOR = 'editor';
    case VIEWER = 'viewer';
}
