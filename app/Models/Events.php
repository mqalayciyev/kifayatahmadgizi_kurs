<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use SoftDeletes;
    protected $table = 'events';
    protected $guarded = [];
    public function image()
    {
        return $this->hasOne('App\Models\EventImage');
    }
}
