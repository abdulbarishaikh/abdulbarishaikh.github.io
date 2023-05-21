<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalDetailController extends Controller
{
    public function index(){
        return view('personalDetail.index');
    }
    public function add(){
        return view('personalDetail.add');
    }
}
