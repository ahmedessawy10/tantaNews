<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Setting;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Setting::first();
        return view("adminDashboard.setting" ,compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validations=[
            "phone_number"=>'required|numeric',
            "email"=>'required|email',
        ];
    foreach(config('app.languages') as $key =>$value ){
        $validations[$key.'.title'] = 'required';
        $validations[$key.'.content'] = 'required';
        $validations[$key.'.address'] = 'required';
    }

    $request->validate($validations);
    Setting::first()->update($request->except(["logo","favicon"]));

   if($request->has('logo')){
    $file_extention=$request->file("logo")->getCLientOriginalExtension();
    $img1=time(). ".".$file_extention;
    $path= $request->logo->move(public_path('images/logo/'),$img1);
  
   Setting::first()->update(['logo'=>$path]);
   }

       if($request->has('favicon')){
        $file_extention=$request->file("favicon")->getCLientOriginalExtension();
        $img2=time(). ".".$file_extention;
        $path=$request->favicon->move(public_path('images/logo/'),$img2);
        Setting::first()->update(['favicon'=>$path]);
       }
       
    return to_route("dashboard.setting.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
