<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use App\Product;
use Auth;
use DB;

class CartController extends Controller
{
    public function AddToCartQV(Request $request)
    {

        if(Auth::check()){
            $product=Product::find($request->id);
            Cart::add([
                'id'=>$product->id,
                'name'=>$product->name,
                'qty'=>$request->qty,
                'price'=>$request->price,
                'weight'=>'1',
                'options'=>['size'=>$request->size , 'color'=> $request->color ,'thumbnail'=>$product->thumbnail]

            ]);
            return response()->json("Product Added on Cart!");
        }

        $notification=array('messege' => 'Login Your Account!', 'alert-type' => 'error');
        return redirect()->back()->with($notification);
    }

    //all cart
    public function AllCart()
    {
        $data=array();
        $data['cart_qty']=Cart::count();
        $data['cart_total']=Cart::priceTotal();
        return response()->json($data);
    }

     //wishlist
     public function AddWishlist($id)
     {

         if(Auth::check()){
             $check=DB::table('wishlists')->where('product_id',$id)->where('user_id',Auth::id())->first();
                if ($check) {
                      $notification=array('messege' => 'Already have it on your wishlist !', 'alert-type' => 'error');
                      return redirect()->back()->with($notification);
                }else{
                     $data=array();
                     $data['product_id']=$id;
                     $data['user_id']=Auth::id();
                     $data['date']=date('d , F Y');
                     DB::table('wishlists')->insert($data);
                     $notification=array('messege' => 'Product added on wishlist!', 'alert-type' => 'success');
                     return redirect()->back()->with($notification);
                }
         }

         $notification=array('messege' => 'Login Your Account!', 'alert-type' => 'error');
         return redirect()->back()->with($notification);
     }

    public function MyCart()
    {
        $content=Cart::content();
        return view('frontend.cart.cart',compact('content'));
    }

    public function RemoveProduct($rowId)
    {
        Cart::remove($rowId);
        return response()->json('Success!');
    }

    public function UpdateQty($rowId,$qty)
    {
        Cart::update($rowId, ['qty' => $qty]);
        return response()->json('Successfully Updated!');
    }

    public function EmptyCart()
    {
        Cart::destroy();
        $notification=array('messege' => 'Cart item clear', 'alert-type' => 'success');
        return redirect()->to('/')->with($notification);
    }

    public function wishlist()
    {
        if (Auth::check()) {
               $wishlist=DB::table('wishlists')->leftJoin('products','wishlists.product_id','products.id')->select('products.name','products.thumbnail','products.slug','wishlists.*')->where('wishlists.user_id',Auth::id())->get();

               return view('frontend.cart.wishlist',compact('wishlist'));
        }
        $notification=array('messege' => 'At first login your account', 'alert-type' => 'error');
        return redirect()->back()->with($notification);
    }

    public function WishlistProductdelete($id)
    {
        DB::table('wishlists')->where('id',$id)->delete();
        $notification=array('messege' => 'Successfully Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

}
