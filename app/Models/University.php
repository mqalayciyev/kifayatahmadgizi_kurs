<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class University extends Model
{
    use SoftDeletes;
    protected $table = 'university';
    protected $guarded = [];

    public function countries()
    {
        return $this->belongsToMany('App\Models\Country', 'country_university');
    }

    public function image()
    {
        return $this->hasOne('App\Models\UniversityImage')->withDefault();
    }
}
