<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        if (auth()->check() && auth()->user()->is_admin === true) {
            $isAdmin = true;
        } else {
            $isAdmin = false;
        }

        return view('about', compact('isAdmin'));
    }
}
