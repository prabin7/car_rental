<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    //Home page
    public function index(){
        return view('sites.index');
    }

    public function result(){
        return view('sites.result');
    }

    public function booking(){
        return view('sites.book');
    }
    
}
