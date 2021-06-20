<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.footer.footer-index', [
            'footers' => Footer::get(),
            'totalfooter' => Footer::count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.footer.footer-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $footer = new Footer;
        $footer->footer_text = $request->footer_text;
        $footer->upwork = $request->upwork;
        $footer->fiverr = $request->fiverr;
        $footer->freelancer = $request->freelancer;
        $footer->peopleperhour = $request->peopleperhour;
        $footer->save();

        $notification = array(
            'message' => 'Footer Add Successfully.',
            'alert-type' => 'success'
        );

        // Toastr Alert
        return back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Footer  $footer
     * @return \Illuminate\Http\Response
     */
    public function show(Footer $footer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Footer  $footer
     * @return \Illuminate\Http\Response
     */
    public function edit(Footer $footer)
    {
        return view('backend.footer.footer-edit', [
            'footer' => $footer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Footer  $footer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Footer $footer)
    {
        $footer->footer_text = $request->footer_text;
        $footer->upwork = $request->upwork;
        $footer->fiverr = $request->fiverr;
        $footer->freelancer = $request->freelancer;
        $footer->peopleperhour = $request->peopleperhour;
        $footer->save();

        $notification = array(
            'message' => 'Footer Update Successfully.',
            'alert-type' => 'success'
        );

        // Toastr Alert
        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Footer  $footer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Footer $footer)
    {
        //
    }
}
