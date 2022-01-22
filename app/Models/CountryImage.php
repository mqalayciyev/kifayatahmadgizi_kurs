<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountryImage extends Model
{
    protected $table = 'country_images';
    protected $guarded = [];

    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }
}
