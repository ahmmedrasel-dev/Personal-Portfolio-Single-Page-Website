<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.banner.index', [
            'banners' => Banner::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $request->validate([
        //     'title' => ['required', 'unique:banners'],
        //     'sub_title' => ['required'],
        //     'short_description' => ['required'],
        // ]);

        $bannerCount = Banner::count();
        if($bannerCount > 0 ){

        Banner::where('banner_status', 1)->update([
            'banner_status' => 2,
        ]);

        $banner = new Banner;
        $banner->title = $request->title;
        $banner->sub_title = $request->sub_title;
        $banner->short_description = $request->short_description;
        $banner->save();


        //  Banner Photo Upload
        if($request->hasFile('banner_photo')){
            $bannerImage = $request->file('banner_photo');
            $extn = Str::slug($request->title).'-'.Str::random(3).'.'.$bannerImage->getClientOriginalExtension();
            $bannerImageNew = Banner::findOrFail($banner->id);
            $path = public_path('images/'.$banner->created_at->format('Y/m/').$banner->id.'/');
            File::makeDirectory($path, $mode= 0777, true, true );
            Image::make($bannerImage)->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
              })->save($path . $extn, 60);
            $bannerImageNew ->banner_photo = $extn;
            $bannerImageNew->save();
        }

        if($request->hasFile('background_photo')){
            $bannerBG = $request->file('background_photo');
            $extn2 = Str::slug($request->title).'-'.Str::random(3).'.'.$bannerBG->getClientOriginalExtension();
            $bannerBGNew = Banner::findOrFail($banner->id);
            $path = public_path('images/'.$banner->created_at->format('Y/m/').$banner->id.'/');
            File::makeDirectory($path, $mode= 0777, true, true );
            Image::make($bannerBG)->save($path . $extn2, 60);
            $bannerBGNew->background_photo = $extn2;
            $bannerBGNew->save();
        }

        $notification = array(
            'message' => 'Banner Add Successfully.',
            'alert-type' => 'success'
        );

        // Toastr Alert
        return back()->with($notification);
    }else{


        $banner = new Banner;

        $banner->title = $request->title;
        $banner->sub_title = $request->sub_title;
        $banner->short_description = $request->short_description;
        $banner->save();

        //  Banner Photo Upload
        if($request->hasFile('banner_photo')){
            $bannerImage = $request->file('banner_photo');
            $extn = Str::slug($request->title).'-'.Str::random(3).'.'.$bannerImage->getClientOriginalExtension();
            $bannerImageNew = Banner::findOrFail($banner->id);
            $path = public_path('images/'.$banner->created_at->format('Y/m/').$banner->id.'/');
            File::makeDirectory($path, $mode= 0777, true, true );
            Image::make($bannerImage)->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
              })->save($path . $extn, 60);
            $bannerImageNew ->banner_photo = $extn;
            $bannerImageNew->save();
        }

        if($request->hasFile('background_photo')){
            $bannerBG = $request->file('background_photo');
            $extn2 = Str::slug($request->title).'-'.Str::random(3).'.'.$bannerBG->getClientOriginalExtension();
            $bannerBGNew = Banner::findOrFail($banner->id);
            $path = public_path('images/'.$banner->created_at->format('Y/m/').$banner->id.'/');
            File::makeDirectory($path, $mode= 0777, true, true );
            Image::make($bannerBG)->save($path . $extn2, 60);
            $bannerBGNew->background_photo = $extn2;
            $bannerBGNew->save();
        }

        $notification = array(
            'message' => 'Banner Add Successfully.',
            'alert-type' => 'success'
        );

        // Toastr Alert
        return back()->with($notification);
        };

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('backend.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $banner->title = $request->title;
        $banner->sub_title = $request->sub_title;
        $banner->short_description = $request->short_description;
        $banner->save();

        //  Banner Photo Upload
        if($request->hasFile('banner_photo')){
            $bannerImage = $request->file('banner_photo');
            $extn = Str::slug($request->title).'-'.Str::random(3).'.'.$bannerImage->getClientOriginalExtension();
            $oldPath = public_path('images/'.$banner->created_at->format('Y/m/').$banner->id.'/'.$banner->banner_photo);
            if(file_exists($oldPath)){
                unlink($oldPath);
            };
            $path = public_path('images/'.$banner->created_at->format('Y/m/').$banner->id.'/');
            File::makeDirectory($path, $mode= 0777, true, true );
            Image::make($bannerImage)->save($path . $extn, 60);
            $banner->banner_photo = $extn;
            $banner->save();
        }

        if($request->hasFile('background_photo')){
            $bannerBG = $request->file('background_photo');
            $extn2 = Str::slug($request->title).'-'.Str::random(3).'.'.$bannerBG->getClientOriginalExtension();
            $oldPath = public_path('images/'.$banner->created_at->format('Y/m/').$banner->id.'/'.$banner->background_photo);
            if(file_exists($oldPath)){
                unlink($oldPath);
            };
            $path = public_path('images/'.$banner->created_at->format('Y/m/').$banner->id.'/');
            File::makeDirectory($path, $mode= 0777, true, true );
            Image::make($bannerBG)->save($path . $extn2, 60);
            $banner->background_photo = $extn2;
            $banner->save();
        }

        $notification = array(
            'message' => 'Banner Updated Successfully.',
            'alert-type' => 'success'
        );

        // Toastr Alert
        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        if($banner->banner_photo){
            $oldPath = public_path('images/'.$banner->created_at->format('Y/m/').$banner->id.'/'.$banner->banner_photo);
            if(file_exists($oldPath)){
                unlink($oldPath);
            };
        }
        if($banner->background_photo){
            $oldPath = public_path('images/'.$banner->created_at->format('Y/m/').$banner->id.'/'.$banner->background_photo);
            if(file_exists($oldPath)){
                unlink($oldPath);
            };
        }

        $banner->delete();

        $notification = array(
            'message' => 'Banner Deleted Successfully.',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    public function bannerActive($id){
        Banner::where('banner_status', 2)->update([
            'banner_status' => 1,
        ]);
        Banner::where('id', $id)->update(['banner_status' => 2]);
        $notification = array(
            'message' => 'Banner Deactive Successfully.',
            'alert-type' => 'success'
        );

        // Toastr Alert
        return back()->with($notification);
    }

    public function bannerDeactive($id){
        Banner::where('banner_status', 1)->update([
            'banner_status' => 2,
        ]);
        Banner::where('id', $id)->update([
            'banner_status' => 1
        ]);

        $notification = array(
            'message' => 'Banner Active Successfully.',
            'alert-type' => 'success'
        );

        // Toastr Alert
        return back()->with($notification);
    }
}
