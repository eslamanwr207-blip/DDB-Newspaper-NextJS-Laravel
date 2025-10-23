<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return response()->json([
            'categories' => $categories,
            'message' => 'Success',
            'status' => 200,

        ]);


    }

    public function show($id){
        $category = Category::find($id);
        if ($category != null){
            $categoryIds = $category->children()->pluck('id')->toArray();
            $categoryIds[] = $category->id;
        }else{
            $categoryIds = ['mas'=>'this category doesnt exist'];
        }



        $posts = Post::whereIn('category_id', $categoryIds)->get();

        return response()->json([
            'posts' => $posts,
            'message' => 'Success',
            'status' => 200,
        ]);
    }
}
