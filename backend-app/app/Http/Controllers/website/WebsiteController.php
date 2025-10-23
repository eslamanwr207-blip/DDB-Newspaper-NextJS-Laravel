<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index(){

        return view('website.home.home');
    }
    public function posts($id)
    {
        $posts = Post::where('category_id', $id)->get();
        return view('website.posts', compact('posts'));

    }

    public function post_details($id)
    {
        $post_details = Post::where('id', $id)->first();
        return view('website.PostDetails', compact('post_details'));
    }
}
