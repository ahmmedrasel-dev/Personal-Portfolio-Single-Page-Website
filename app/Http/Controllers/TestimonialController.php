<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.testimonial.testimonial-index', [
            'testimonials' => Testimonial::orderBy('id', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.testimonial.testimonial-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $testimonial = new Testimonial;
        $testimonial->client_name = $request->client_name;
        $testimonial->location = $request->location;
        $testimonial->rating_number = $request->rating_number;
        $testimonial->comment = $request->comment;
        $testimonial->save();

        if($request->hasFile('client_photo')){
            $clientPhoto = $request->file('client_photo');
            $extension = Str::slug($request->client_name).'-'.Str::random(3).'.'.$clientPhoto->getClientOriginalExtension();
            $clientPhotoNew = Testimonial::findOrFail($testimonial->id);
            $location = public_path('images/'.$testimonial->created_at->format('Y/m/').$testimonial->id.'/');
            File::makeDirectory($location, $mode= 0777, true, true);
            Image::make($clientPhoto)->save($location.$extension, 60);
            $clientPhotoNew->client_photo = $extension;
            $clientPhotoNew->save();
        }

        $notification = array(
            'message' => 'Testimonial Create Successfully.',
            'alert-type' => 'success'
        );

        // Toastr Alert
        return back()->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        return view('backend.testimonial.testimonial-edit', [
            'testimonial' => $testimonial,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $testimonial->client_name = $request->client_name;
        $testimonial->location = $request->location;
        $testimonial->rating_number = $request->rating_number;
        $testimonial->comment = $request->comment;
        $testimonial->save();

        if($request->hasFile('client_photo')){
            $clientPhoto = $request->file('client_photo');
            $extension = Str::slug($request->client_name).'-'.Str::random(3).'.'.$clientPhoto->getClientOriginalExtension();
            $oldLocation = public_path('images/'.$testimonial->created_at->format('Y/m/').$testimonial->id.'/'.$testimonial->client_photo);
            if(file_exists($oldLocation)){
                unlink($oldLocation);
            };
            $location = public_path('images/'.$testimonial->created_at->format('Y/m/').$testimonial->id.'/');
            File::makeDirectory($location, $mode= 0777, true, true);
            Image::make($clientPhoto)->save($location.$extension, 60);
            $testimonial->client_photo = $extension;
            $testimonial->save();
        }

        $notification = array(
            'message' => 'Testimonial Upadate Successfully.',
            'alert-type' => 'success'
        );

        // Toastr Alert
        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        $notification = array(
            'message' => 'Testimonial Delete Successfully.',
            'alert-type' => 'success'
        );

        // Toastr Alert
        return back()->with($notification);
    }

    public function testimonialTrashList(){
        return view('backend.testimonial.testimonial-trash',[
            'trashed' => Testimonial::onlyTrashed()->get(),
        ]);
    }

     // Testimonial Resote From Trash list.
     public function restore($id)
     {
         Testimonial::onlyTrashed()->findOrFail($id)->restore();
         $notification = array(
             'message' => 'Testimonial Restore Successfully.',
             'alert-type' => 'success'
         );
         return back()->with($notification);
     }

     // Testimonial Permanent Delete From Trash list.
     public function permanentDelete($id)
     {
        Testimonial::onlyTrashed()->findOrFail($id)->forceDelete();
         $notification = array(
             'message' => 'Testimonial Delete Successfully.',
             'alert-type' => 'success'
         );
         return back()->with($notification);
     }
}
