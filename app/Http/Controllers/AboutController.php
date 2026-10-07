<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $company = 'Gamey';
        return view('about', compact('company'));
    }
}
