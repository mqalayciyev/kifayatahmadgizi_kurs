<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Questions extends Model
{
    use SoftDeletes;
    protected $table = 'questions';
    protected $guarded = [];
    public function test()
    {
        return $this->hasOne('App\Models\Tests');
    }
}
