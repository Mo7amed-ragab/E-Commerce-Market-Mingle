<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{

    // Home Page 
    public function home()
    {
        return view('website.pages.home');
    }
    // about Page
    public function about()
    {
        return view('website.pages.about');
    }

    // Contact us
    public function contactUs()
    {
        return view('website.pages.contactUs');
    }
}
