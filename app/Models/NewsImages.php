<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsImages extends Model
{
    // use SoftDeletes;
    protected $table = 'news_images';
    protected $guarded = [];
    public function news()
    {
        return $this->belongsTo('App\Models\News');
    }
}
