<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\FaqCategory;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Models\Thumbnail;

use Illuminate\Support\Facades\Mail;


class WebsiteController extends Controller
{
    //
    public function sendmail(){
        Mail::raw('Sending emails with Mailgun and Laravel is easy!', function($message)
        {
            $message->to('emazeem07@gmail.com');
        });
        dd('sent');
    }
    public function place(){
        return view('user.place');
    }

    public function home(){

        $sliders = Slider::all();
        $testimonials=Testimonial::all();
        $thumbnails=Thumbnail::all();
        $section1=Setting::where('slug','homepage-section-1')->first();
        $section2=Setting::where('slug','homepage-section-2')->first();
        $section3=Setting::where('slug','homepage-section-3')->first();
        $testi_bg=Setting::where('slug','testimonials-background')->first();
        $perks_bg=Setting::where('slug','perks-background')->first();
        $section1=$section1?$section1:new Setting();
        $section2=$section2?$section2:new Setting();
        $section3=$section3?$section3:new Setting();
        return view('home',compact('sliders','testimonials','thumbnails','section1','section2','section3','testi_bg','perks_bg'));
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
    public function blog($t=null){
        $blogs=Blog::all();
        $tags=[];
        $filter=[];
        foreach ($blogs as $blog){
            $tag=explode(',',$blog->tags);
            if ($t){
                if (in_array($t,$tag)){
                    $filter[]=$blog->id;
                }
            }
            foreach ($tag as $i){
                $tags[]=$i;
            }
        }
        $blogs=$t?Blog::whereIn('id',$filter)->get():$blogs;

        $blogs_bg=Setting::where('slug','blog-background')->first();

        return view('blog',compact('blogs','tags','blogs_bg'));
    }

    public function faq(){
        $categories=FaqCategory::all();
        return view('faq',compact('categories'));
    }

}
