<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('updated_at', 'DESC')->get();
        return response() -> json(['status' => 200, 'posts' => $posts]);
    }

 
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $newPost = Post::create([
            'title' => $request->title,
            'type' => $request->type,
            'description' => $request->description
        ]);
        if($newPost){
            return response()->json(["status" => 200]);
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $posts = Post::find($id);
        return response()->json(['status' => 200, 'posts' => $posts]);
    }


    public function update(Request $request, $id)
    {
        $posts = Post::find($id);
        $posts->title = $request->title;
        $posts->type = $request->type;
        $posts->description = $request->description;
        if($posts -> save()){
            return response()->json(["status" => 200]);
        }
    }

    public function destroy($id)
    {
        $posts = Post::find($id);
        if($posts -> delete()){
            return response()->json(["status" => 200]);
        }
    }
}
