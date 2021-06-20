<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.project.project-index', [
            'projects' =>Project::orderBy('id', 'desc')->get(),
            'categories' => Category::orderBy('category_name', 'asc')->get(),
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
        $project = new Project;
        $project->category_id = $request->category_id;
        $project->live_link = $request->live_link;
        $project->github_link = $request->github_link;
        $project->save();

        if($request->hasFile('project_image')){
            $projectImage = $request->file('project_image');
            $exten = Str::random('3').'.'.$projectImage->getClientOriginalExtension();
            $projectNew = Project::findOrFail($project->id);
            $location = public_path('images/projects/'.$project->created_at->format('Y/m/').$project->id.'/');
            File::makeDirectory($location, $mode= 0777, true, true);
            Image::make($projectImage)->save($location.$exten, 60);
            $projectNew->project_image = $exten;
            $projectNew->save();
        }

        $notification = array(
            'message' => 'Project Create Successfully.',
            'alert-type' => 'success'
        );

        // Toastr Alert
        return back()->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('backend.project.project-edit', [
            'projects' => $project,
            'categories' => Category::orderBy('id', 'asc')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $project->category_id = $request->category_id;
        $project->live_link = $request->live_link;
        $project->github_link = $request->github_link;
        $project->save();

        if($request->hasFile('project_image')){
            $projectImage = $request->file('project_image');
            $exten = Str::random('3').'.'.$projectImage->getClientOriginalExtension();
            $location = public_path('images/projects/'.$project->created_at->format('Y/m/').$project->id.'/'.$project->project_image);

            if(file_exists($location)){
                unlink($location);
            };
            $newLocation = public_path('images/projects/'.$project->created_at->format('Y/m/').$project->id.'/');
            File::makeDirectory($newLocation, $mode= 0777, true, true);
            Image::make($projectImage)->save($newLocation.$exten, 60);
            $project->project_image = $exten;
            $project->save();
        }

        $notification = array(
            'message' => 'Project Update Successfully.',
            'alert-type' => 'success'
        );

        // Toastr Alert
        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        $notification = array(
            'message' => 'Project Delete Successfully.',
            'alert-type' => 'success'
        );

        // Toastr Alert
        return back()->with($notification);
    }
}
