<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use function Laravel\Prompts\title;

class ReviewController extends Controller
{
    public function index()
    {

        if (request()->has('genre')) {
            $reviews = Review::where('genre', request('genre'))->get();
        } else {
            $reviews = Review::all();
        }
        return view('reviews', compact('reviews'));
    }

    public function destroy(string $id)
    {
        $review = auth()->user()->reviews()->find($id);
        $review->delete();

        return redirect()->route('reviews.user');
    }

    public function showUserReviews()
    {
        $reviews = auth()->user()->reviews;
        return view('myreviews', compact('reviews'));
    }

    public function create()
    {
        return view('reviews.create');
    }

    public function showAllReviews()
    {
        $clickedReview = Review::find(request()->route('id'));
        return view('reviews.show', compact('clickedReview'));
    }

    public function store(Request $request)
    {
        Review::create([
            'title' => request('title'),
            'text' => request('text'),
            'price' => request('price'),
            'game_name' => request('game_name'),
            'genre' => request('genre'),
            'user_id' => auth()->id(),
            'username' => auth()->user()->name,
        ]);

        return redirect()->route('reviews.user');
    }


}
