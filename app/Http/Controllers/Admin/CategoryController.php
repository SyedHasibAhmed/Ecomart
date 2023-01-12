<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // All category showing metho
    public function index(){
        // $data = DB::table('categories')->get(); //using query builder
        $data = Category::all(); // using models
        return view('admin.category.category.index', compact('data'));
    }
}
