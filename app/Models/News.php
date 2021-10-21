<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use SoftDeletes;
    protected $table = 'news';
    protected $guarded = [];
    public function image()
    {
        return $this->hasOne('App\Models\NewsImage');
    }
}
