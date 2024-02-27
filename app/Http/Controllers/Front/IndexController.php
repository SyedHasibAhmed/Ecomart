<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Review;
use DB;

class IndexController extends Controller
{
    //Root page
    public function index(){
        $category=DB::table('categories')->get();
        $brand=DB::table('brands')->where('front_page',1)->limit(24)->get();
        $bannerproduct=Product::where('status',1)->where('product_slider',1)->latest()->first();
        $featured=Product::where('status',1)->where('featured',1)->orderBy('id','DESC')->limit(16)->get();
        $today_deal=Product::where('status',1)->where('today_deal',1)->orderBy('id','DESC')->limit(16)->get();
        $popular_product=Product::where('status',1)->orderBy('product_views','DESC')->limit(16)->get();
        return view('frontend.index',compact('category', 'bannerproduct', 'featured', 'popular_product', 'today_deal'));
    }

    //singleproduct page calling method
    public function ProductDetails($slug)
    {
        $product=Product::where('slug',$slug)->first();
                Product::where('slug',$slug)->increment('product_views');
       //$related_product=DB::table('products')->where('subcategory_id',$product->subcategory_id)->orderBy('id','DESC')->take(10)->get();
        $review=Review::where('product_id',$product->id)->orderBy('id','DESC')->take(6)->get();


        return view('frontend.product.product_details',compact('product','review'));
    }

     //product quick view
     public function ProductQuickView($id)
     {
         $product=Product::where('id',$id)->first();
         return view('frontend.product.quick_view',compact('product'));
     }


    // Shop Page
    public function ShopProduct(){
        $category=DB::table('categories')->get();
        $subcategory=DB::table('subcategories')->get();
        $brand=DB::table('brands')->get();
        $products=DB::table('products')->paginate(16);
        $childcategories=DB::table('childcategories')->get();
        return view('frontend.shop',compact('subcategory','brand','products','category','childcategories'));
    }

     //categorywise product page
     public function categoryWiseProduct($id)
     {
         $category=DB::table('categories')->where('id',$id)->first();
         $subcategory=DB::table('subcategories')->where('category_id',$id)->get();
         $childcategories=DB::table('childcategories')->where('category_id',$id)->get();
         $brand=DB::table('brands')->get();
         $products=DB::table('products')->where('category_id',$id)->paginate(60);
         $random_product=Product::where('status',1)->inRandomOrder()->limit(16)->get();
         return view('frontend.product.category_products',compact('subcategory','brand','products','random_product','category','childcategories'));

     }

     //subcategorywise product
    public function SubcategoryWiseProduct($id)
    {
        $subcategory=DB::table('subcategories')->where('id',$id)->first();
        $childcategories=DB::table('childcategories')->where('subcategory_id',$id)->get();
        $brand=DB::table('brands')->get();
        $products=DB::table('products')->where('subcategory_id',$id)->paginate(60);
        $random_product=Product::where('status',1)->inRandomOrder()->limit(16)->get();
        return view('frontend.product.subcategory_product',compact('childcategories','brand','products','random_product','subcategory'));
    }

    //childcategory product
    public function ChildcategoryWiseProduct($id)
    {
        $childcategories=DB::table('childcategories')->get();
        $categories=DB::table('categories')->get();
        $brand=DB::table('brands')->get();
        $products=DB::table('products')->where('childcategory_id',$id)->paginate(60);
        $random_product=Product::where('status',1)->inRandomOrder()->limit(16)->get();
        return view('frontend.product.childcategory_product',compact('categories','brand','products','random_product','childcategories'));
    }

    //brandwise product
    public function BrandWiseProduct($id)
    {
        $brand=DB::table('brands')->where('id',$id)->first();
        $categories=DB::table('categories')->get();
        $brands=DB::table('brands')->get();
        $products=DB::table('products')->where('brand_id',$id)->paginate(60);
        $random_product=Product::where('status',1)->inRandomOrder()->limit(16)->get();
        return view('frontend.product.brandwise_product',compact('categories','brands','products','random_product','brand'));
    }

    //store newsletter
    public function storeNewsletter(Request $request)
    {
        $email=$request->email;
        $check=DB::table('newsletters')->where('email',$email)->first();
        if ($check) {
            return response()->json('Email Already Exist!');
        }else{
              $data=array();
              $data['email']=$request->email;
              DB::table('newsletters')->insert($data);
              return response()->json('Thanks for subscribe us!');
        }
    }


    //__order tracking page
    public function OrderTracking()
    {
        return view('frontend.order_tracking');
    }


    //__check orer
    public function CheckOrder(Request $request)
    {
        $check=DB::table('orders')->where('order_id',$request->order_id)->first();
        if ($check) {
            $order=DB::table('orders')->where('order_id',$request->order_id)->first();
            $order_details=DB::table('order_details')->where('order_id',$order->id)->get();
            return view('frontend.order_details',compact('order','order_details'));
        }else{
            $notification=array('messege' => 'Invalid OrderID! Try again.', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
    }

    // Contact Page
    public function ContactPage(){
        return view('frontend.contact');
    }

    // FAQ Page
    public function FaqPage(){
        return view('frontend.faq');
    }

    //search__function
    public function SearchProduct(Request $request)
    {
        $products=Product::orderBy('id', 'desc')->where('name', 'LIKE', '%'.$request->search.'%');
        if($request->category != "ALL") $products->where('category_id', $request->category);
        $products = $products->get();
        $category=DB::table('categories')->get();
        $subcategory=DB::table('subcategories')->get();
        $brand=DB::table('brands')->get();
        $childcategories=DB::table('childcategories')->get();
        return view('frontend.product.category_products',compact('subcategory','brand','products','category','childcategories'));
    }

    // Blog Page
    public function BlogPage(){
        return view('frontend.blog');
    }

}
