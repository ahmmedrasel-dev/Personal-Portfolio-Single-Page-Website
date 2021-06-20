<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experience = Experience::orderBy('id', 'desc')->get();
        return view('backend.exparience.experience-index',[
            'experieces' => $experience,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.exparience.experience-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $experience = new Experience;
        $experience->institute_name = $request->institute_name;
        $experience->job_title = $request->job_title;
        $experience->year = $request->year;
        $experience->save();

        $notification = array(
            'message' => 'Experiece Create Successfully.',
            'alert-type' => 'success'
        );

        // Toastr Alert
        return back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function show(Experience $experience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function edit(Experience $experience)
    {
        return view('backend.exparience.experience-edit', [
            'experience' => $experience,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Experience $experience)
    {
        $experience->institute_name = $request->institute_name;
        $experience->job_title = $request->job_title;
        $experience->year = $request->year;
        $experience->save();

        $notification = array(
            'message' => 'Experiece Update Successfully.',
            'alert-type' => 'success'
        );

        // Toastr Alert
        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function destroy(Experience $experience)
    {
        $experience->delete();

        $notification = array(
            'message' => 'Experience Move To Trash Successfully.',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    // Activeted Experience
    public function experienceActive($id){
        Experience::where('id', $id)->update(['status' => 1]);

        // Experience::where('id', $id)->update(['status' => 2]);
        $notification = array(
            'message' => 'Experience Activeted Successfully.',
            'alert-type' => 'success'
        );

        // Toastr Alert
        return back()->with($notification);
    }

    // Deactiveted Experience
    public function experienceDeactive($id){
        Experience::where('id', $id)->update([
            'status' => 2,
        ]);
        // Experience::where('id', $id)->update(['status' => 1 ]);
        $notification = array(
            'message' => 'Experience Deactiveted Successfully.',
            'alert-type' => 'success'
        );

        // Toastr Alert
        return back()->with($notification);
    }

    // Trashed List View
    public function ExTrashList(){
        return view('backend.exparience.experience-trash',[
            'trashed' => Experience::onlyTrashed()->get(),
        ]);
    }

    // Experience Resote From Trash list.
    public function restore($id)
    {
        Experience::onlyTrashed()->findOrFail($id)->restore();
        $notification = array(
            'message' => 'Experience Restore Successfully.',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    // Experience Permanent Delete From Trash list.
    public function permanentDelete($id)
    {
        Experience::onlyTrashed()->findOrFail($id)->forceDelete();
        $notification = array(
            'message' => 'Experience Delete Successfully.',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
}
