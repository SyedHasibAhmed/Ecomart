<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // authentic user can access
    }

    // All category showing method
    public function index(){
        $data = DB::table('categories')->get(); //using query builder
       // $data = Category::all(); // using models
        return view('admin.category.category.index', compact('data'));
    }

    // Store method
    public function store(Request $request){
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:55',
        ]);

        // Query Builder
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_slug'] = Str::slug($request->category_name, '-'); //The Str::slug method generates a       URL friendly "slug"
        //dd($data);
        DB::table('categories')->insert($data); // Data (category) insert

        $notification=array('messege' => 'Category Inserted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    // Edit method
    public function edit($id){
        $data= DB::table('categories')->where('id', $id)->first();
        return response()->json($data);
    }

    // Update method
    public function update(Request $request){
         // Query Builder
         $data = array();
         $data['category_name'] = $request->category_name;
         $data['category_slug'] = Str::slug($request->category_name, '-');
         DB::table('categories')->where('id', $request->id)->update($data); // Data (category) update

         $notification=array('messege' => 'Category Updated!', 'alert-type' => 'success');
         return redirect()->back()->with($notification);
    }


    // Delete category methos
    public function delete($id){
        DB::table('categories')->where('id', $id)->delete();

        $notification=array('messege' => 'Category Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //get child category
    public function GetChildCategory($id)  //subcategory_id
    {
        $data=DB::table('childcategories')->where('subcategory_id',$id)->get();
        return response()->json($data);
    }
}
