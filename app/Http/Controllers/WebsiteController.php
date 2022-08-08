<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\FaqCategory;
use App\Models\Setting;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    //
    public function home(){
        return view('home');
    }
    public function privacy(){
        $privacy=Setting::where('slug','privacy-policy')->first();
        if (!$privacy){$privacy=new Setting();}
        return view('privacy',compact('privacy'));
    }
    public function about(){
        $about=Setting::where('slug','about-us')->first();
        if (!$about){$about=new Setting();}
        return view('about',compact('about'));
    }
    public function contact(){
        $contact=Setting::where('slug','contact-us')->first();
        if (!$contact){$contact=new Setting();}
        return view('contact',compact('contact'));
    }

    public function press(){
        $press=Setting::where('slug','press')->first();
        if (!$press){$press=new Setting();}
        return view('press',compact('press'));
    }
    public function careers(){
        $career=Setting::where('slug','career')->first();
        if (!$career){$career=new Setting();}
        return view('career',compact('career'));
    }



    public function safety(){
        $safety=Setting::where('slug','safety')->first();
        if (!$safety){$safety=new Setting();}
        return view('safety',compact('safety'));
    }

    public function terms(){
        $terms=Setting::where('slug','terms-and-conditions')->first();
        if (!$terms){$terms=new Setting();}
        return view('terms',compact('terms'));
    }

    public function testimonial(){
        $testimonials=Testimonial::all();
        return view('testimonial',compact('testimonials'));
    }

    public function faq(){
        $categories=FaqCategory::all();
        return view('faq',compact('categories'));
    }

}
