<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function about()
    {
        return view('pages.about.about');
    }

    public function course(){
        return view('pages.course.course');
    }
    public function admission(){
        return view('pages.admission.admission');
    }
}
