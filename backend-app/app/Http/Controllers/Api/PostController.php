<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return response()->json([
            'posts' => $posts,
            'status' => 200,
            'message' => 'Success'
        ]);
    }

    public function show($id){
        $post = Post::where('id', $id)->first();
        return response()->json([
            'post' => $post,
            'status' => 200,
            'message' => 'Success',
        ]);
    }
}
