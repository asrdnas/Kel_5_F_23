<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuperAdmin extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'username',
        'email', 
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
