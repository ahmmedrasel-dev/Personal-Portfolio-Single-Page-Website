<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = Service::orderBy('id', 'desc')->get();
        return view('backend.services.service-index', [
            'services' => $service
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
        $service = new Service;
        $service->title = $request->title;
        $service->icon = $request->icon;
        $service->summary = $request->summary;
        $service->save();

        $notification = array(
            'message' => 'Service Create Successfully.',
            'alert-type' => 'success'
        );
        return back()->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('backend.services.service-edit', [
            'services' => $service
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $service->title = $request->title;
        $service->icon = $request->icon;
        $service->summary = $request->summary;
        $service->save();

        $notification = array(
            'message' => 'Service Update Successfully.',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();

        $notification = array(
            'message' => 'Service Move To Trash Successfully.',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    // View Serivce Trashlist.
    public function serviceTrashList(){
        return view('backend.services.service-trash',[
            'trashed' => Service::onlyTrashed()->get(),
        ]);
    }

     // Serivce Resote From Trash list.
     public function restore($id)
     {
        Service::onlyTrashed()->findOrFail($id)->restore();
         $notification = array(
             'message' => 'Service Restore Successfully.',
             'alert-type' => 'success'
         );
         return back()->with($notification);
     }

     // Serivce Permanent Delete From Trash list.
     public function permanentDelete($id)
     {
        Service::onlyTrashed()->findOrFail($id)->forceDelete();
         $notification = array(
             'message' => 'Service Delete Successfully.',
             'alert-type' => 'success'
         );
         return back()->with($notification);
     }

}
