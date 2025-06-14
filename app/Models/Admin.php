<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    // ✅ This is the fix:
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}