<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Subcategory;
use App\Category;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // authentic user can access
    }

    //index method for read data
    public function index()
    {
    	    //Query Builder with one to one join
    	$data=DB::table('subcategories')->leftJoin('categories','subcategories.category_id','categories.id')
    	    ->select('subcategories.*','categories.category_name')->get();
        $category = DB::table('categories')->get();
        return view('admin.category.subcategory.index',compact('data','category'));
    }

    // Store method
    public function store(Request $request){
        $validated = $request->validate([
            'subcategory_name' => 'required|max:55',
        ]);

        // Query Builder
        $data = array();
        $data['category_id'] = $request->category_id;
        $data['subcategory_name'] = $request->subcategory_name;
        $data['subcat_slug'] = Str::slug($request->subcategory_name, '-'); //The Str::slug method generates a URL friendly "slug"
        //dd($data);
        DB::table('subcategories')->insert($data); // Data (Subcategory) insert

        $notification=array('messege' => 'Subcategory Inserted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    // Edit method
    public function edit($id)
    {
    	    // Eloquent ORM
    	// $data=Subcategory::find($id);
    	// $category=Category::all();
    	    //Query Builder
    	$data=Subcategory::find($id);
    	$category=DB::table('categories')->get();

    	return view('admin.category.subcategory.edit',compact('data','category'));
    }

     //update method
     public function update(Request $request)
     {
        //QueryBuilder

          $data=array();
          $data['category_id']=$request->category_id;
          $data['subcategory_name']=$request->subcategory_name;
          $data['subcat_slug']=Str::slug($request->subcategory_name, '-');
          DB::table('subcategories')->where('id',$request->id)->update($data);

        $notification=array('messege' => 'Subategory Updated!', 'alert-type' => 'success');
         return redirect()->back()->with($notification);
     }

    // Delete Subcategory method
    public function delete($id){
        DB::table('subcategories')->where('id', $id)->delete();

        $notification=array('messege' => 'Subcategory Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
