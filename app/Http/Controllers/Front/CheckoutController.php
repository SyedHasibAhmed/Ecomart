<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Cart;
use App\Product;
use DB;
use Session;
use Mail;
use App\Mail\InvoiceMail;



class CheckoutController extends Controller
{
    //__checkout page
    public function Checkout()
    {
        if (!Auth::check()) {
             $notification=array('messege' => 'Login Your Account!', 'alert-type' => 'error');
             return redirect()->back()->with($notification);
        }
        $content=Cart::content();
        return view('frontend.cart.checkout',compact('content'));

    }

    //_apply coupn_
    public function ApplyCoupon(Request $request)
    {

        $check=DB::table('coupons')->where('coupon_code',$request->coupon)->first();

        if ($check) {
            //__coupon exist

            $subtotal = Cart::subtotal();
            $numberWithoutComma = (float) str_replace(',', '', $subtotal);

            if (date('Y-m-d', strtotime(date('Y-m-d'))) <= date('Y-m-d', strtotime($check->valid_date))) {
                 session::put('coupon',[

                    'name'=>$check->coupon_code,
                    'discount'=>$check->coupon_amount,
                    'after_discount'=>$numberWithoutComma-$check->coupon_amount
                 ]);
                 $notification=array('messege' => 'Coupon Applied!', 'alert-type' => 'success');
                 return redirect()->back()->with($notification);
            }else{
               $notification=array('messege' => 'Expired Coupon Code!', 'alert-type' => 'error');
               return redirect()->back()->with($notification);
            }
        }else{
             $notification=array('messege' => 'Invalid Coupon Code! Try again.', 'alert-type' => 'error');
             return redirect()->back()->with($notification);
        }

    }

    //_remove coupon_
    public function RemoveCoupon()
    {
         Session::forget('coupon');
         $notification=array('messege' => 'Coupon removed!', 'alert-type' => 'success');
         return redirect()->back()->with($notification);
    }

    //_orderplace_

    public function BkashPayment(Request $request){
        $order=array();
        $order['user_id']=Auth::id();

        $billingInfo = Session::get('billing_info');


        $order['c_name']=$billingInfo['c_name'];

        $order['c_phone']=$billingInfo['c_phone'];

        $order['c_country']=$billingInfo['c_country'];

        $order['c_address']=$billingInfo['c_address'];

        $order['c_email']=$billingInfo['c_email'];

        $order['c_zipcode']=$billingInfo['c_zipcode'];

        $order['c_note']=$billingInfo['c_note'];

        $order['c_city']=$billingInfo['c_city'];

        if(Session::has('coupon')){
            $order['subtotal']=Cart::subtotal();
            $order['coupon_code']=Session::get('coupon')['name'];
            $order['coupon_discount']=Session::get('coupon')['discount'];
            $order['after_dicount']=Session::get('coupon')['after_discount'];
        }else{
            $order['subtotal']=Cart::subtotal();
        }
        $order['total']=Cart::priceTotal();
        //$order['payment_type']=$request->payment_type;
        $order['payment_type']=$billingInfo['payment_type'];
        $order['tax']=0;
        $order['shipping_charge']=0;
        $order['order_id']=rand(10000,900000);
        $order['status']=0;
        $order['date']=date('d-m-Y');
        $order['month']=date('F');
        $order['year']=date('Y');


        $order_id=DB::table('orders')->insertGetId($order);



        //order details
        $content=Cart::content();

        $details=array();
        foreach($content as $row){
            $details['order_id']=$order_id;
            $details['product_id']=$row->id;
            $details['product_name']=$row->name;
            $details['color']=$row->options->color;
            $details['size']=$row->options->size;
            $details['quantity']=$row->qty;
            $details['single_price']=$row->price;
            $details['subtotal_price']=$row->price*$row->qty;

            DB::table('order_details')->insert($details);
        }

        Mail::to(Auth::user()->email)->send(new InvoiceMail($order,$details));

            Cart::destroy();
            if (Session::has('coupon')) {
                Session::forget('coupon');
            }
            $notification=array('messege' => 'Successfully Order Placed!', 'alert-type' => 'success');
            return redirect()->to('/')->with($notification);


    }

    public function OrderPlace(Request $request)
    {
        if ($request->payment_type=="Cash on delivery") {

            $order=array();
            $order['user_id']=Auth::id();
            $order['c_name']=$request->c_name;
            $order['c_phone']=$request->c_phone;
            $order['c_country']=$request->c_country;
            $order['c_address']=$request->c_address;
            $order['c_email']=$request->c_email;
            $order['c_zipcode']=$request->c_zipcode;
            $order['c_note']=$request->c_note;
            $order['c_city']=$request->c_city;
            if(Session::has('coupon')){
                $order['subtotal']=Cart::subtotal();
                $order['coupon_code']=Session::get('coupon')['name'];
                $order['coupon_discount']=Session::get('coupon')['discount'];
                $order['after_dicount']=Session::get('coupon')['after_discount'];
            }else{
                $order['subtotal']=Cart::subtotal();
            }
            $order['total']=Cart::priceTotal();
            $order['payment_type']=$request->payment_type;
            $order['tax']=0;
            $order['shipping_charge']=0;
            $order['order_id']=rand(10000,900000);
            $order['status']=0;
            $order['date']=date('d-m-Y');
            $order['month']=date('F');
            $order['year']=date('Y');


            $order_id=DB::table('orders')->insertGetId($order);



            //order details
            $content=Cart::content();

            $details=array();
            foreach($content as $row){
                $details['order_id']=$order_id;
                $details['product_id']=$row->id;
                $details['product_name']=$row->name;
                $details['color']=$row->options->color;
                $details['size']=$row->options->size;
                $details['quantity']=$row->qty;
                $details['single_price']=$row->price;
                $details['subtotal_price']=$row->price*$row->qty;

                DB::table('order_details')->insert($details);
            }

            Mail::to($request->c_email)->send(new InvoiceMail($order,$details));

            Cart::destroy();
            if (Session::has('coupon')) {
                  Session::forget('coupon');
            }
            $notification=array('messege' => 'Successfully Order Placed!', 'alert-type' => 'success');
            return redirect()->to('/')->with($notification);

            // bkash payment gateway
        }elseif($request->payment_type=="Bkash"){
            Session::put('billing_info',$request->all());
            return view('frontend.cart.bkash');

        }


    }




}
