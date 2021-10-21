<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TeacherImage extends Model
{
    use SoftDeletes;
    protected $table = 'teacher_images';
    protected $guarded = [];
    public function image()
    {
        return $this->belongsTo('App\Models\Teachers');
    }
}
