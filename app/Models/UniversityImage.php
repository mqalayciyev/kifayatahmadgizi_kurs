<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UniversityImage extends Model
{
    protected $table = 'university_image';
    protected $guarded = [];

    public function university()
    {
        return $this->belongsTo('App\Models\University');
    }
}
