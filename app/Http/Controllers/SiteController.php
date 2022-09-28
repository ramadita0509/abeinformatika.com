<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SiteController extends Controller
{
    public function index(){

        return view('welcome');
    }

    public function profil(){
        return view('site/profil');
    }
}