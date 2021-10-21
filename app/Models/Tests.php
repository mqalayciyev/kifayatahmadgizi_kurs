<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tests extends Model
{
    use SoftDeletes;
    protected $table = 'tests';
    protected $guarded = [];
    public function score()
    {
        return $this->belongsTo('App\Models\TestScores');
    }
    public function questions()
    {
        return $this->belongsTo('App\Models\Questions');
    }
}
