<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Courses extends Model
{
    use SoftDeletes;
    protected $table = 'courses';
    protected $guarded = [];
    public function teacher()
    {
        return $this->hasOne('App\Models\Teachers', 'id');
    }
}
