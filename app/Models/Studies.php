<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Studies extends Model
{
    use SoftDeletes;
    protected $table = 'studies';
    protected $guarded = [];
}
