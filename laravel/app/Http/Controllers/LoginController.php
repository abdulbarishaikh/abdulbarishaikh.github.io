<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('dashboard');
    }
    public function contact(){
        return view('contact-list');
    }
}
