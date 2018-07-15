<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['parent_id', 'thumbnail', 'slug', 'description'];

    // Relationship tới model Post
    // quan hệ một nhiều
    public function posts(){
    	return $this->hasMany('App\Post');
    }
}
