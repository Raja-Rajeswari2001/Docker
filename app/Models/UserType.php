<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserType extends Model
{
    use HasFactory;

    protected $table = 'user_type'; // if your table name is 'user_type' (not the default 'user_types')

    protected $fillable = [
        'name',
    ];
}