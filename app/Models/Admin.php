<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use SoftDeletes;
    protected $table = 'admins';
    protected $fillable = ['first_name', 'last_name', 'email', 'mobile', 'password', 'is_active', 'is_manage'];
    protected $hidden = ['password'];
}
