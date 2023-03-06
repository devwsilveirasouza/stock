<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // PÁGINA DEFAULT DO SISTEMA
    public function __invoke(){
        return view('home');
    }
}
