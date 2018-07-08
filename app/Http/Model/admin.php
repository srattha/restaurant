<?php

namespace App\Http\Model;

use App\Http\Model\base;

class Admin extends base
{
    protected $table = "admins";
    protected $hidden = [
        'password', 'remember_token',
    ];
}

