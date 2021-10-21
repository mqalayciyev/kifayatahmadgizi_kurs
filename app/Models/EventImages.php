<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventImages extends Model
{
    // use SoftDeletes;
    protected $table = 'event_images';
    protected $guarded = [];
    public function events()
    {
        return $this->belongsTo('App\Models\Events');
    }
}
