<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Review;
use Illuminate\Http\Request;
use function Laravel\Prompts\title;

class ReviewController extends Controller
{


    public function index()
    {
        $clickCounter = 0;
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
        return view('reviews', [
            'reviews' => $reviews,
            'isAdmin' => $isAdmin,
            'errorMessage' => session('errorMessage'),
        ]);
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
        $action = Action::where('user_id', auth()->id())->first();

        if ($action && $action->review_clicked_by_user >= 3) {
            return view('reviews.create');
        }

        return redirect()->route('reviews')
            ->with('errorMessage', 'You have not clicked enough reviews to perform this action.');
    }

    public function showAllReviews()
    {
        $action = Action::firstOrCreate(
            ['user_id' => auth()->id()],
            ['review_clicked_by_user' => 0],
        );

        $action->increment('review_clicked_by_user');

        $clickedReview = Review::findOrFail(request()->route('id'));

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
        if (auth()->user()->reviews()->find($id)) {
            Review::where('id', $id)->update([
                'title' => request('title'),
                'text' => request('text'),
                'price' => request('price'),
                'game_name' => request('game_name'),
                'genre' => request('genre'),
            ]);
            return redirect()->route('reviews.user');
        }
    }

    public function adminDelete(string $id)
    {
        $review = Review::find($id);
        $review->delete();
        return redirect()->route('admin');
    }

    public function search(Request $request)
    {

        if (auth()->check() && auth()->user()->is_admin === true) {
            $isAdmin = true;
        } else {
            $isAdmin = false;
        }

        $search = $request->input('search');
        $reviews = Review::where('game_name', 'like', "%$search%")->where('is_active', true)->get();

        if ($reviews->isEmpty()) {
            $isEmpty = 'Er zijn geen games gevonden';
            return view('reviews', compact('reviews', 'isAdmin', 'isEmpty'));
        } else {
            return view('reviews', compact('reviews', 'isAdmin'));
        }

    }


}
