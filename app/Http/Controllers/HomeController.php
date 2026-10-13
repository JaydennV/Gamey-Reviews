<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $reviews = Review::where('id', '<=', 3)->get();
        return view('home', compact('reviews'));
    }
}
