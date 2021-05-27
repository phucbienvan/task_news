<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "news";
    public function category(){
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }
    public function comment(){
        return $this->hasMany('App\Models\Comment', 'news_id', 'id');
    }
}
