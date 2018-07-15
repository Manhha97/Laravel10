<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Http\Requests\CreatePostRequest;
use Illuminate\Support\Facades\Storage;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function getList(){
        $users = Post::join('users','users.id','=','posts.user_id')
        ->select('posts.id','posts.title','posts.thumbnail','posts.user_id','users.name')
        ->orderBy('id','desc');
        return datatables()->eloquent($users)
        ->addColumn('action',function($user){
            return '<button userId="'.$user->id.'" class="btn btn-success btn-show"><i class="far fa-eye"></i></button>

            
            <a  href="'.'editpost/'.$user->id.'">
                <button  class="btn btn-warning"><i class="fas fa-edit"></i></button>
            </a>

            <button userId="'.$user->id.'" class="btn btn-danger btn-del"><i class="fas fa-trash-alt"></i></button>';
        })
        ->addColumn('photo',function($user){
            return '<img class="img-fluid" src="'.$user->thumbnail.'">';
        })
        ->rawColumns(['action','photo'])
        ->toJson();
    }
    public function destroy($id){
        Post::find($id)->delete();
        return response()->json([
            'success'=>'xoa thanh cong'
        ]);
    }
    public function create(){
        $tags=Tag::all();
        return view('posts.adm_addpost')->with('tags',$tags);
    }
    public function show($id){
        $post=Post::find($id);
        return $post ;
    }
    public function edit($id){
        $tags=Tag::all();
        $post=Post::find($id);
        return view('posts.adm_editpost',compact('post'))->with('tags',$tags);
    }
    public function update(CreatePostRequest $request,$id){
            $post = Post::find($id);
            $data = $request->all();
            $post->update($data);
            return redirect('admin/dashboard')->with('noti','Câp nhật thành công !');
       }
    public function store(CreatePostRequest $request){
          
        

        $data= $request->all();
        $post = new Post;
        $post->title=$data['title']; 
        
      
        $path = $request->thumbnail->store('fileanh');
        $post->thumbnail=$path;
        /* $post->thumbnail=$data['thumbnail'];*/

        $post->description=$data['description'];
        $post->content=$data['content'];
        $post->user_id=$data['user_id'];
        $post->category_id=$data['category_id'];
        $post->slug=str_slug($data['title']);
        $post->save();
        $post->tags()->sync($request->tags,false);
        return redirect('admin/dashboard')->with('noti','Thêm mới thành công');
     }
   


}
