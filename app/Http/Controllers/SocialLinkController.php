<?php

namespace App\Http\Controllers;

use App\Models\Sociallinks;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.social-link.social-index',[
            'sociallinks' => Sociallinks::get(),
            'totallinks' => Sociallinks::count(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.social-link.social-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sociallinks = new Sociallinks;
        $sociallinks->facebook = $request->facebook;
        $sociallinks->twitter = $request->twitter;
        $sociallinks->linkdin = $request->linkdin;
        $sociallinks->instagram = $request->instagram;
        $sociallinks->github = $request->github;
        $sociallinks->behance = $request->behance;
        $sociallinks->save();

        $notification = array(
            'message' => 'Socail Links Add Successfully.',
            'alert-type' => 'success'
        );

        // Toastr Alert
        return back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sociallinks  $socailLink
     * @return \Illuminate\Http\Response
     */
    public function show(Sociallinks $sociallink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sociallinks  $socailLink
     * @return \Illuminate\Http\Response
     */
    public function edit(Sociallinks $sociallink)
    {
        return view('backend.social-link.social-edit', [
            'sociallinks' => $sociallink,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sociallinks  $socailLink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sociallinks $sociallink)
    {
        $sociallink->facebook = $request->facebook;
        $sociallink->twitter = $request->twitter;
        $sociallink->linkdin = $request->linkdin;
        $sociallink->instagram = $request->instagram;
        $sociallink->github = $request->github;
        $sociallink->behance = $request->behance;
        $sociallink->save();

        $notification = array(
            'message' => 'Socail Links Update Successfully.',
            'alert-type' => 'success'
        );

        // Toastr Alert
        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sociallinks  $socailLink
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sociallinks $sociallink)
    {
        //
    }
}
