<?php

namespace App\Http\Controllers;

use App\Category;
use App\Domain;
use App\SubCategory;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DomainController extends Controller
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
        $categories = Category::get();
        $subcategories = SubCategory::get();
        return view('domain.create',compact(['categories','subcategories']));
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
            'email'=>'required|email',
            'title'=>'required|max:60',
            'url'=>'required|max:255',
            'shortdest'=>'required|max:150'
        ]);

        $domain = new Domain();
        $domain->title = $request['title'];
        $domain->email = $request['email'];
        $domain->url = $request['url'];
        $domain->shortdescription = $request['shortdest'];
        $domain->description = $request['desc'];
        $domain->category_id = $request['category_id'];
        $domain->subcategory_id = $request['subcategory_id'];
        if($request['img']){
            $target_path = public_path('/uploads/');
            $files =  date('YmdHis') . "." . $request['img']->getClientOriginalExtension();
            if ($request['img']->move($target_path, $files)) {
                $domain->img = $files;
            }
            // $image = $request['img'];
            // $extension = $image->getClientOriginalExtension();
            // $name = time().'_'.$image->getClientOriginalName();

            // Storage::disk('public')->put($name,File::get($image));

            // $domain->img = $name;
        }else{
            $domain->img = 'default.jpg';
        }

        $domain->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function show(Domain $domain)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function edit(Domain $domain)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Domain $domain)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function destroy(Domain $domain)
    {
        //
    }
}
