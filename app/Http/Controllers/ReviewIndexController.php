<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewIndexController extends Controller
{
    public function index()
    {
        $clickedReview = Review::find(request()->route('id'));
        return view('reviews.show', compact('clickedReview'));
    }
}
