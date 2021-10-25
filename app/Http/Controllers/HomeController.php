<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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
