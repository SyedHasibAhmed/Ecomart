<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
use File;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // authentic user can access
    }

    //website setting
    public function website()
    {
        $setting=DB::table('settings')->first();
        return view('admin.setting.website_setting',compact('setting'));
    }

    //website setting update
    public function WebsiteUpdate(Request $request,$id)
    {
        $data=array();
        $data['currency']=$request->currency;
        $data['phone_one']=$request->phone_one;
        $data['phone_two']=$request->phone_two;
        $data['main_email']=$request->main_email;
        $data['support_email']=$request->support_email;
        $data['address']=$request->address;
        $data['facebook']=$request->facebook;
        $data['twitter']=$request->twitter;
        $data['instagram']=$request->instagram;
        $data['linkedin']=$request->linkedin;
        $data['youtube']=$request->youtube;
        if ($request->logo) {  //if there new logo given


            $logo=$request->logo;
            $logo_name=uniqid().'.'.$logo->getClientOriginalExtension();

            $path = public_path('files/setting/' . $logo_name);
            Image::make($logo->getRealPath())->resize(320,120)->save($path);
            $data['logo']='files/setting/'.$logo_name;
        }else{   //if not given new logo
            $data['logo']=$request->old_logo;
        }

        if ($request->favicon) {  //if new logo given
              $favicon=$request->favicon;
              $favicon_name=uniqid().'.'.$favicon->getClientOriginalExtension();
              $path = public_path('files/setting/' . $favicon_name);
              Image::make($favicon->getRealPath())->resize(32,32)->save($path);
              $data['favicon']='files/setting/'.$favicon_name;
        }else{   //if not given new logo
            $data['favicon']=$request->old_favicon;
        }

        DB::table('settings')->where('id',$id)->update($data);
        $notification=array('messege' => 'Setting Updated!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //__payment gateway
    public function PaymentGateway()
    {
        $aamarpay=DB::table('payment_gateway')->first();
        $surjopay=DB::table('payment_gateway')->skip(1)->first();
        $ssl=DB::table('payment_gateway')->skip(2)->first();
        return view('admin.bdpayment_gateway.edit',compact('aamarpay','surjopay','ssl'));
    }

    //__aamarpay update
    public function AamarpayUpdate(Request $request)
    {
        $data=array();
        $data['store_id']=$request->store_id;
        $data['signature_key']=$request->signature_key;
        $data['status']=$request->status;
        DB::table('payment_gateway')->where('id',$request->id)->update($data);
        $notification=array('messege' => 'Payment Gateway Update Updated!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //__update surjopay
    public function SurjopayUpdate(Request $request)
    {
        $data=array();
        $data['store_id']=$request->store_id;
        $data['signature_key']=$request->signature_key;
        $data['status']=$request->status;
        DB::table('payment_gateway')->where('id',$request->id)->update($data);
        $notification=array('messege' => 'Payment Gateway Update Updated!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
