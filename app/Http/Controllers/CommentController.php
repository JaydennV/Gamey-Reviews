<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {

    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'comment_content' => ['required', 'string', 'max:300', 'min:3']
        ]);
        Comment::create([
            'user_id' => auth()->id(),
            'review_id' => $request->review_id,
            'content' => $validated['comment_content']
        ]);

        return redirect(route('reviews.show', $request->review_id));
    }

    public function destroy(string $id)
    {
        $comment = Comment::findOrFail($id);

        abort_unless((int)$comment->user_id === (int)auth()->id() || auth()->user()->is_admin === true, 403);

        $reviewId = $comment->review_id;
        $comment->delete();

        return redirect()->route('reviews.show', $reviewId);
    }
}

