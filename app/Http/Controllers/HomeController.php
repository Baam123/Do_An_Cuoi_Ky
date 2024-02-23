<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {

        return view('Home.index');
    }
    public function shop()
    {
        return view('Home.shop');
    }
    public function why()
    {
        return view('Home.why');
    }
    public function testimonial()
    {
        return view('Home.testimonial');
    }
    public function contact()
    {
        return view('contact');
    }
}
