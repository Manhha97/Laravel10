<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
class CategoriesController extends Controller
{
    public function index($slug){
    	$category = Category::where('slug',$slug)->first();
    	$posts = \App\Post::select()
    	->where('category_id',$category->id)
    	->paginate(5);
    	return view('index',compact('posts'));
    }
}
