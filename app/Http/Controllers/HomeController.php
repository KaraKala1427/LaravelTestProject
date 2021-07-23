<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }

    public function getAbout(){
        return view('about');
    }
    public function getDeclare(){
        return view('declare');
    }
}
