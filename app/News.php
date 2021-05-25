<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "news";
    public function category(){
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }
    public function comment(){
        return $this->hasMany('App\Comment', 'news_id', 'id');
    }
}
