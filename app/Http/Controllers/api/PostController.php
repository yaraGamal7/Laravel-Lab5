<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;



class PostController extends Controller
{

    function index(){
        $posts=Post::with('user')->paginate($request->input('per_page', 5));
        return PostResource::collection($posts);
    }
    function store(StorePostRequest $request){
        $validData = $request->validated();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time() . '.' . $request->image->extension();
            $image->move(public_path('images'), $imageName);
            $validData['image'] = $imageName;
        }
        $validData['user_id'] = $request->user_id;
        // $post=
        Post::create($validData);
        return "Post created successfully";
    }
    function show($id){
        try{
            $post = Post::findOrFail($id);
            return new PostResource($post);
        }catch(\Illuminate\Database\Eloquent\ModelNotFoundException $exception){
            return response()->json([
                'message' => "Post not found",
            ], 500);
        }

    }
     public function update(StoreRequest $request, string $id)
    {
        try{
            $post = Post::findOrFail($id);
            if (!$post) {
                return response()->json(['error' => 'Post not found'], 404);
            }

            $validData = $request->validated();
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                $validData['image'] = $imageName;
            }
            $validData['user_id'] = $request->user_id;
            $post->update($validData);
            return response()->json([
                'message' => 'Post updated successfully',
                'post' => $post
            ], 200);

        }catch(\Illuminate\Database\Eloquent\ModelNotFoundException $exception){
            return response()->json([
                'message' => "Post not found",
            ], 500);
        }

    }

    public function destroy(string $id)
    {
        try{
            $post = Post::findOrFail($id);
            $post->delete();
            return response()->json([
                'message' => 'Deleted',
                'post' => $post
            ], 200);

        }catch(\Illuminate\Database\Eloquent\ModelNotFoundException $exception){
            return response()->json([
                'message' => "Post not found",
            ], 500);
        }

    }
}
