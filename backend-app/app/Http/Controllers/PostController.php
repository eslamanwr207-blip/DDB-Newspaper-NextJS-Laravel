<?php

namespace App\Http\Controllers;

use App\Http\Traits\UploadeImage;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use UploadeImage;
    public function index()
    {
        $posts = Post::all();
        return view('posts.posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $post = Post::create($request->except('image','_token'));
        $post->update(['user_id'=> auth()->user()->id]);


        if ($request->hasFile('image')) {
            $post->update(['image'=> $this->uploadImage($request->file('image'), 'posts')]);
        }

        return redirect()->route('post.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $post = Post::where('id', $id)->firstOrFail();
        return view('posts.edit', compact('post', 'categories'));



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::where('id', $id)->first();
        $post->update($request->except('image','_token'));
        $post->update(['user_id'=> auth()->user()->id]);
        if ($request->hasFile('image')) {
            $post->update(['image'=> $this->uploadImage($request->file('image'), 'posts')]);
        }
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

    public function delete(Request $request)
    {
        if (is_numeric($request->id)) {
            Post::where('id', $request->id)->delete();
        }

        return redirect()->back();
    }
}
