<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use SoftDeletes;

    protected $table = 'country';
    //protected $fillable = ['category_name', 'slug'];
    protected $guarded = [];

    public function universities()
    {
        return $this->belongsToMany('App\Models\University', 'country_university');
    }

    public function image()
    {
        return $this->hasOne('App\Models\CountryImage')->withDefault();
    }

}
