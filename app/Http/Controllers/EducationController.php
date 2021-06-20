<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $education = Education::orderBy('id', 'desc')->get();
        return view('backend.eduction-section.education-index', [
            'educations' => $education,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.eduction-section.education-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $education = new Education;
        $education->title = $request->title;
        $education->sub_title = $request->sub_title;
        $education->year = $request->year;
        $education->icon = $request->icon;
        $education->save();

        $notification = array(
            'message' => 'Education Create Successfully.',
            'alert-type' => 'success'
        );

        // Toastr Alert
        return back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function show(Education $education)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function edit(Education $education)
    {
        return view('backend.eduction-section.educationn-edit', [
            'educations' => $education,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Education $education)
    {
        $education->title = $request->title;
        $education->sub_title = $request->sub_title;
        $education->year = $request->year;
        $education->icon = $request->icon;
        $education->save();

        $notification = array(
            'message' => 'About Update Successfully.',
            'alert-type' => 'success'
        );

        // Toastr Alert
        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function destroy(Education $education)
    {
        $education->delete();

        $notification = array(
            'message' => 'Education Move To Trash Successfully.',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    public function trashList()
    {
        return view('backend.eduction-section.education-trashlist',[
            'education' => Education::onlyTrashed()->get(),
        ]);
    }

    public function restore($id)
    {
        Education::onlyTrashed()->findOrFail($id)->restore();
        $notification = array(
            'message' => 'Education Restore Successfully.',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    public function permanentDelete($id)
    {
        Education::onlyTrashed()->findOrFail($id)->forceDelete();
        $notification = array(
            'message' => 'Education Delete Successfully.',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
}
