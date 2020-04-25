<?php

namespace App\Http\Controllers;

use App\Category;
use App\Domain;
use App\SubCategory;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        $domains = Domain::get();
        $categories = Category::get();
        $subcategories = SubCategory::get();

        return view('welcome',compact(['domains','categories','subcategories']));
    }
}
