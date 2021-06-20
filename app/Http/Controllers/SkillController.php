<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.skills.skill-index', [
            'skills' => Skill::orderBy('id', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $skill = new Skill;
        $skill->skill_name = $request->skill_name;
        $skill->skill_percentage = $request->skill_percentage;
        $skill->save();

        $notification = array(
            'message' => 'Skill Create Successfully.',
            'alert-type' => 'success'
        );

        // Toastr Alert
        return back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit(Skill $skill)
    {
        return view('backend.skills.skill-edit', [
            'skills' => $skill,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skill $skill)
    {
        $skill->update($request->all());

        $notification = array(
            'message' => 'Skill Update Successfully.',
            'alert-type' => 'success'
        );

        // Toastr Alert
        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();

        $notification = array(
            'message' => 'Skill Move To Trash Successfully.',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    public function skillTrashList(){
        return view('backend.skills.skill-trash',[
            'trashed' => Skill::onlyTrashed()->get(),
        ]);
    }

     // Skills Resote From Trash list.
     public function restore($id)
     {
         Skill::onlyTrashed()->findOrFail($id)->restore();
         $notification = array(
             'message' => 'Skill Restore Successfully.',
             'alert-type' => 'success'
         );
         return back()->with($notification);
     }

     // Skills Permanent Delete From Trash list.
     public function permanentDelete($id)
     {
        Skill::onlyTrashed()->findOrFail($id)->forceDelete();
         $notification = array(
             'message' => 'Skill Delete Successfully.',
             'alert-type' => 'success'
         );
         return back()->with($notification);
     }

     public function skillActive($id){
        Skill::where('id', $id)->update(['status' => 1]);

        $notification = array(
            'message' => 'Skill Activeted Successfully.',
            'alert-type' => 'success'
        );
        return back()->with($notification);
     }

     public function skillDeactive($id){
        Skill::where('id', $id)->update(['status' => 2]);

        $notification = array(
            'message' => 'Skill Deactiveted Successfully.',
            'alert-type' => 'success'
        );
        return back()->with($notification);
     }
}
