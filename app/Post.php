<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'slug', 'category_id', 'image'];

    public function __construct($title=null, $slug=null, $category_id=null, $body=null)
    {
        $this->title = $title;
        $this->slug = $slug;
        $this->category_id = $category_id;
        $this->body = $body;
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
