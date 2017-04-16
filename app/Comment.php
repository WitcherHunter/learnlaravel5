<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {
    protected $fillable = ['nickname', 'email', 'website', 'content', 'article_id'];

    public function post(){
        return $this->hasOne('App\Article','id','article_id');
    }
}
