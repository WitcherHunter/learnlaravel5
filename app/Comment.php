<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {
    //fillable属性是指可以直接使用update方法来更新的字段，否则必须使用save方法来更新数据
    protected $fillable = ['nickname', 'email', 'website', 'content', 'article_id'];

    public function post() {
        return $this->belongsTo('App\Article', 'article_id', 'id');
    }
}
