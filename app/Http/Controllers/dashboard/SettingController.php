<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\SettingRequest;

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
    public function store(SettingRequest $request )
    {

        $setting = Setting::first();
        $setting->update($request->except(['logo','favicon']));
       
        // update logo
        if($request->hasFile('logo')){

       $file_extension=$request->file('logo')->getClientOriginalExtension();
       $logo=time().".".$file_extension;
       $path=$request->file('logo')->move(public_path('img/setting'),$logo);
       $setting->update(['logo'=>$path]);

        }


        if($request->has('favicon')){
            $file_extension=$request->file('favicon')->getClientOriginalExtension();
            $favicon=time().".".$file_extension;
           $path= $request->file('favicon')->move(public_path('img/setting'),$favicon);
            $setting->update(['favicon'=>$path]);
        }
        return to_route('admin.setting.index')->with(['sucess'=>__('message.save_sucessfully')]);
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
