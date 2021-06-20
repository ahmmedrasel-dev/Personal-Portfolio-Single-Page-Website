<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.about-section.about-index', [
            'about' => About::orderBy('id', 'asc')->first(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.about-section.about-created');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $about = new About;
        $about->about_title = $request->about_title;
        $about->about_summary = $request->about_summary;
        $about->button_link = $request->button_link;
        $about->save();

        if($request->hasFile('about_photo')){
            $aboutPhoto = $request->file('about_photo');
            $extansion = Str::slug($request->about_title).'-'.Str::random(3).'.'.$aboutPhoto->getClientOriginalExtension();
            $aboutPhotoNew = About::findOrFail($about->id);
            $path = public_path('images/'.$about->created_at->format('Y/m/').$about->id.'/');
            File::makeDirectory($path, $mode = 0777, true, true );
            Image::make($aboutPhoto)->resize(600, 600)->save($path.$extansion, 60);
            $aboutPhotoNew->about_photo = $extansion;
            $aboutPhotoNew->save();
        }

        $notification = array(
            'message' => 'About Create Successfully.',
            'alert-type' => 'success'
        );

        // Toastr Alert
        return back()->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        return view('backend.about-section.about-edit', [
            'about' => $about,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        $about->about_title = $request->about_title;
        $about->about_summary = $request->about_summary;
        $about->button_link = $request->button_link;
        $about->save();

        if($request->hasFile('about_photo')){
            $aboutPhoto = $request->file('about_photo');
            $extansion = Str::slug($request->about_title).'-'.Str::random(3).'.'.$aboutPhoto->getClientOriginalExtension();
            $oldPath = public_path('images/'.$about->created_at->format('Y/m/').$about->id.'/'.$about->about_photo);
            if(file_exists($oldPath)){
                unlink($oldPath);
            };
            $newPath = public_path('images/'. $about->created_at->format('Y/m/').$about->id .'/');
            File::makeDirectory($newPath, $mode = 0777, true, true );
            Image::make($aboutPhoto)->resize(500, 500)->save($newPath.$extansion, 60);
            $about->about_photo = $extansion;
            $about->save();
        }

        $notification = array(
            'message' => 'About Updated Successfully.',
            'alert-type' => 'success'
        );

        // Toastr Alert
        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        //
    }
}
