<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->is_admin == true) {
            $reviews = Review::all();
            return view('dashboard', compact('reviews'));
        } else {
            return redirect()->route('home');
        }
    }
}
