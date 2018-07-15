<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\PostRequest;
class PostsController extends Controller
{
    public function index2(){
        $tag=Tag::all();
        return view('posts.tags')->with('tag',$tag);
    }

     public function create(){
        return view('posts.create_tag');
     }
     public function storetag(PostRequest $request){
        $data= $request->all();
        $tag = new Tag;
        $tag->name=$data['name'];
        $tag->slug=$data['slug'];
        $tag->save();
        return redirect('admin/tags')->with('flag','Thêm Mới Thành Công !');
     }

    public function edit($id){
        $tag = Tag::find($id);
        return view('posts.edit_tag')->with('tag',$tag);
    }
    public function destroy($id){
        Tag::find($id)->delete();
        return redirect('admin/tags')->with('flag','Xóa thành công !');
    }
    public function update(PostRequest $request,$id){
        $tag = Tag::find($id);
        $tag->name=$request->name;
        $tag->slug=$request->slug;
        $tag->save();
        return redirect('admin/tags')->with('flag','Câp nhật thành công !');
    }

    public function index(){
    	$posts= Post::paginate(5);
    	return view('index')->with('posts',$posts);
    }
    public function show($slug){
    	//$post= Post::find($slug);
        $post= Post::where('slug',$slug)->first();
    	$posts_related = \App\Post::select()
		->where('category_id', $post->category_id)
		->where('id', '!=',$post->id)
		->limit(3)->offset(3)->get();
		return view('posts.detail',compact('post','posts_related'));
    }
}
