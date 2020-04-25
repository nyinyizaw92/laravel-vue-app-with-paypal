<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =Category::get();
        
        return view('subcategory.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'subcategoryname' => 'required|max:255'
        ]);

       // dd($request->all());

        $category = new SubCategory();  
        $category->category_id = $request['category_id'];
        $category->subcategoryname = $request['subcategoryname'];
        $category->slug = str_slug($request['subcategoryname']);
        $latestSlug = Category::whereRaw("slug RLIKE '^{$category->slug}(-[0-9]*)?$'")
        ->latest('id')
        ->value('slug');
            if($latestSlug){
                $pieces = explode('-',$latestSlug);
                $number = intval(end($pieces));
                $category->slug .= '-'.($number+1);
                //YouTube Videos -> youtube-videos
                //YouTube Videos -> youtube-videos+1
                //YouTube Videos -> youtube-videos+2
            }

            $category->save();
            return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        //
    }
}
