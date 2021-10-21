<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestScores extends Model
{
    use SoftDeletes;
    protected $table = 'test_scores';
    protected $guarded = [];
    public function test()
    {
        return $this->hasOne('App\Models\Tests');
    }
}
