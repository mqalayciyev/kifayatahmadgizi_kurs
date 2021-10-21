<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teachers extends Model
{
    use SoftDeletes;
    protected $table = 'teachers';
    protected $guarded = [];
    public function courses()
    {
        return $this->belongsTo('App\Models\Courses');
    }
    public function image()
    {
        return $this->hasOne('App\Models\TeacherImage');
    }
}
