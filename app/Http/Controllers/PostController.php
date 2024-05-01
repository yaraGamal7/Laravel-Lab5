<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StorePostRequest;
class PostController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }
    function index()
    {
        $posts = Post::paginate(5);
        // $posts=Post::all();
    return view('posts', ['posts'=>$posts]); 
   }
   function create(){
    return view('createPost');
   }
   function store(StorePostRequest $request){
    $validData = $request->validated();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time() . '.' . $request->image->extension();
            $image->move(public_path('images'), $imageName);
            $validData['image'] = $imageName;
            $validData['user_id'] = auth()->user()->id;
        }
        Post::create($validData);
        return redirect('/posts');
   }
   function show($id){
    $post=Post::find($id);
    return view("detail", ["post"=>$post]);
   }
   function edit($id){
    $post=Post::find($id);
    

    return view("edit", ["post"=>$post]);
   }
   function update($id,StorePostRequest $request){
    $post=Post::find($id);
        $validData = $request->validated();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time() . '.' . $request->image->extension();
            $image->move(public_path('images'), $imageName);
            $validData['image'] = $imageName;
            $validData['user_id'] = auth()->user()->id;
        }
        $post->update($validData);
    return redirect('/posts');
   }
   function destroy($id){
    Post::destroy($id);
    return redirect('/posts');
   }
}
