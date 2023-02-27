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
        if ($request->logo) {  //jodi new logo die thake


            $logo=$request->logo;
            $logo_name=uniqid().'.'.$logo->getClientOriginalExtension();

            $path = public_path('files/setting/' . $logo_name);
            Image::make($logo->getRealPath())->resize(320,120)->save($path);
            $data['logo']='files/setting/'.$logo_name;
        }else{   //jodi new logo na dey
            $data['logo']=$request->old_logo;
        }

        if ($request->favicon) {  //jodi new logo die thake
              $favicon=$request->favicon;
              $favicon_name=uniqid().'.'.$favicon->getClientOriginalExtension();
              $path = public_path('files/setting/' . $favicon_name);
              Image::make($favicon->getRealPath())->resize(32,32)->save($path);
              $data['favicon']='files/setting/'.$favicon_name;
        }else{   //jodi new logo na dey
            $data['favicon']=$request->old_favicon;
        }

        DB::table('settings')->where('id',$id)->update($data);
        $notification=array('messege' => 'Setting Updated!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
