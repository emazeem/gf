<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\FaqCategory;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    //
    public function home(){
        return view('home');
    }
    public function testimonial(){
        $tesitmonials=Testimonial::all();
        return view('testimonial',compact('tesitmonials'));
    }

    public function faq(){
        $categories=FaqCategory::all();
        return view('faq',compact('categories'));
    }

}
