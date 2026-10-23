<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->check() && auth()->user()->is_admin === true) {
            $isAdmin = true;
        } else {
            $isAdmin = false;
        }
        $reviews = Review::where('id', '<=', 3)->get();
        return view('home', compact('reviews', 'isAdmin'));
    }
}
