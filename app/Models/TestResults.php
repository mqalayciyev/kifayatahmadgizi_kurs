<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestResults extends Model
{
    use SoftDeletes;
    protected $table = 'test_results';
    protected $guarded = [];
}
