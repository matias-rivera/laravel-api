<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['title','content','author_id'];

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function author()
    {
        return $this->belongsTo('App\User','author_id');
    }

    public function isAuthorLoaded(){
        return $this->relationLoaded('author');
    }

    public function isCommentsLoaded(){
        return $this->relationLoaded('comments');
    }

    
}
