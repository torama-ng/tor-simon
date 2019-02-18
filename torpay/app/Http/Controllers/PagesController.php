<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function index(){
        return view('pages.home');
    }
    public function login(){
        return view('pages.login');
    }
    public function about(){
        return view('pages.about');
    }
    public function services(){
        return view('pages.services');
    }
    
    public function register(){
        return view('pages.register');
    }
}

?>