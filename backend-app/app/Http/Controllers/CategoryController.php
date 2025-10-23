<?php

namespace App\Http\Controllers;

use App\Http\Traits\UploadeImage;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    use UploadeImage;
    public function index()
    {
        $maincategories = Category::with('children')->where('parent',0)->orWhere('parent',null)->get();
        $categories = Category::all();
        return view('categories.categories', compact('maincategories', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $maincategories = Category::with('children')->where('parent',0)->orWhere('parent',null)->get();
        return view('categories.add', compact('maincategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = Category::create($request->except('image','_token'));

        if ($request->hasFile('image')) {
            $category->update(['image'=> $this->uploadImage($request->file('image'), 'categories')]);
        }

        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $maincategories = Category::with('children')->where('parent',0)->orWhere('parent',null)->get();
        $category = Category::where('id', $id)->with('children')->first();
        return view('categories.edit', compact('category', 'maincategories'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::where('id', $id)->first();

        $category->update($request->except('image','_token'));
        if ($request->hasFile('image')) {
            $category->update(['image'=> $this->uploadImage($request->file('image'), 'categories')]);
        }

        return redirect()->route('category.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }

    public function delete(Request $request){

        if (is_numeric($request->id)){
            Category::where('parent', $request->id)->delete();
            Category::where('id', $request->id)->delete();
        }



        return redirect()->route('category.index');
    }
}
