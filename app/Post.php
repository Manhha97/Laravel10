<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts'; // bảng posts trong database
    protected $fillable = [
    		'title', 
    		'thumbnail', 
    		'description', 
    		'content',
    		'slug',
    		'user_id',
    		'category_id',
    		'view_count'
    	]; // một mảng tên các cột trong bảng posts ở database
    	// không cần thêm các cột như id, created_at, updated_at, deleted_at vào
    	// vì nó là những cột mặc định

    // Relationship tới model Category
    // quan hệ một nhiều
    public function category(){
      return $this->belongsTo('App\Category', 'category_id');
    }
    public function tags(){
        return $this->belongsToMany('App\Tag','post_tags','post_id','tag_id');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
