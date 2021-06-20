<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.setting.setting-index',[
            'settings' => Setting::get(),
            'total' => Setting::count(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.setting.setting-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $setting = new Setting;
        $setting->site_title = $request->site_title;
        $setting->meta_desc = $request->meta_desc;
        $setting->copyright_text = $request->copyright_text;
        $setting->save();

        //  Logo Upload
        if($request->hasFile('logo')){
            $logo = $request->file('logo');
            $extn = Str::slug($request->site_title).'-'.Str::random(3).'.'.$logo->getClientOriginalExtension();
            $logoInsert = Setting::findOrFail($setting->id);
            $path = public_path('images/logo/'.$setting->created_at->format('Y/m/').$setting->id.'/');
            File::makeDirectory($path, $mode= 0777, true, true );
            Image::make($logo)->save($path . $extn, 60);
            $logoInsert ->logo = $extn;
            $logoInsert->save();
        }
        // Favicon Uplaod
        if($request->hasFile('favicon')){
            $favicon = $request->file('favicon');
            $extn = Str::slug($request->site_title).'-'.Str::random(3).'.'.$favicon->getClientOriginalExtension();
            $faviconInsert = Setting::findOrFail($setting->id);
            $path = public_path('images/logo/'.$setting->created_at->format('Y/m/').$setting->id.'/');
            File::makeDirectory($path, $mode= 0777, true, true );
            Image::make($favicon)->save($path . $extn, 60);
            $faviconInsert ->favicon = $extn;
            $faviconInsert->save();
        }

        $notification = array(
            'message' => 'Setting Add Successfully.',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        return view('backend.setting.setting-edit', [
            'setting' => $setting,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        $setting->site_title = $request->site_title;
        $setting->meta_desc = $request->meta_desc;
        $setting->copyright_text = $request->copyright_text;
        $setting->save();

        //  Logo Upload
        if($request->hasFile('logo')){
            $logo = $request->file('logo');
            $extn = Str::slug($request->site_title).'-'.Str::random(3).'.'.$logo->getClientOriginalExtension();
            $oldpath = public_path('images/logo/'.$setting->created_at->format('Y/m/').$setting->id.'/'.$setting->logo);
            if(file_exists($oldpath)){
                unlink($oldpath);
            }
            $newpath = public_path('images/logo/'.$setting->created_at->format('Y/m/').$setting->id.'/');
            File::makeDirectory($newpath, $mode= 0777, true, true );
            Image::make($logo)->save($newpath . $extn, 60);
            $setting ->logo = $extn;
            $setting->save();
        }
        // Favicon Uplaod
        if($request->hasFile('favicon')){
            $favicon = $request->file('favicon');
            $extn = Str::slug($request->site_title).'-'.Str::random(3).'.'.$favicon->getClientOriginalExtension();
            $oldpath = public_path('images/logo/'.$setting->created_at->format('Y/m/').$setting->id.'/'.$setting->favicon);
            if(file_exists($oldpath)){
                unlink($oldpath);
            }
            $newpath = public_path('images/logo/'.$setting->created_at->format('Y/m/').$setting->id.'/');
            File::makeDirectory($newpath, $mode= 0777, true, true );
            Image::make($favicon)->save($newpath . $extn, 60);
            $setting ->favicon = $extn;
            $setting->save();
        }

        $notification = array(
            'message' => 'Setting Update Successfully.',
            'alert-type' => 'success'
        );
        return back()->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
