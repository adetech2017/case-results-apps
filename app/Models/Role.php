<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    use Loggable;
    public $guarded = [];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
