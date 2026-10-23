<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use function Laravel\Prompts\title;

class ReviewController extends Controller
{
    public function index()
    {
        if (auth()->check() && auth()->user()->is_admin === true) {
            $isAdmin = true;
        } else {
            $isAdmin = false;
        }

        if (request()->has('genre')) {
            $reviews = Review::where('genre', request('genre'))->where('is_active', true)->get();
        } else {
            $reviews = Review::where('is_active', true)->get();
        }
        return view('reviews', compact('reviews', 'isAdmin'));
    }

    public function updateStatus(Request $request, string $id)
    {

        $review = Review::findOrFail($id);
        $review->is_active = $request->boolean('is_active');
        $review->save();

        return back();
    }

    public function destroy(string $id)
    {
        $review = auth()->user()->reviews()->find($id);
        $review->delete();

        return redirect()->route('reviews.user');
    }

    public function showEditPage(string $id)
    {
        $review = auth()->user()->reviews()->find($id);
        return view('reviews.edit', compact('review'));
    }

    public function showUserReviews()
    {
        $reviews = auth()->user()->reviews;
        if (auth()->check() && auth()->user()->is_admin === true) {
            $isAdmin = true;
        } else {
            $isAdmin = false;
        }
        return view('myreviews', compact('reviews', 'isAdmin'));
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

    public function updateReview(Request $request, string $id)
    {
        Review::where('id', $id)->update([
            'title' => request('title'),
            'text' => request('text'),
            'price' => request('price'),
            'game_name' => request('game_name'),
            'genre' => request('genre'),
        ]);
        return redirect()->route('reviews.user');
    }

    public function adminDelete(string $id)
    {
        $review = Review::find($id);
        $review->delete();
        return redirect()->route('admin');
    }


}
