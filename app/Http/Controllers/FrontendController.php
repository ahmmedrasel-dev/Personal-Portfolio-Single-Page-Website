<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Banner;
use App\Models\Button;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Footer;
use App\Models\Project;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Skill;
use App\Models\Sociallinks;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function frontend(){
        return view('frontend.frontend-main',[
            'banner' => Banner::where('banner_status', 1)->first(),
            'button' => Button::orderBy('id', 'asc')->get(),
            'experiences' => Experience::where('status', 1)->get(),
            'about' => About::first(),
            'education' => Education::orderBy('id', 'desc')->get(),
            'skills' => Skill::where('status', 1)->get(),
            'services' => Service::orderBy('id', 'desc')->get(),
            'testimonials' => Testimonial::orderBy('id', 'desc')->get(),
            'categorys' => Category::latest()->limit(8)->get(),
            'contact' => Contact::first(),
            'footer' => Footer::first(),
            'socaillink' => Sociallinks::first(),
            'settings' => Setting::first(),
        ]);
    }

}
