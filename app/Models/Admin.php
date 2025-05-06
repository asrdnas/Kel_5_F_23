<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Authenticatable
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

    public function news()
    {
        return $this->hasMany(News::class);
    }
}
