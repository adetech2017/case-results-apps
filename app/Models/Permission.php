<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Laratrust\Models\LaratrustPermission;

class Permission extends LaratrustPermission
{
    use Loggable;
    public $guarded = [];
}
