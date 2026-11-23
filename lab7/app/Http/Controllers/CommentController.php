<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function store(Request $request, Article $article)
    {
        Gate::authorize('add-comment');

        $data = $request->validate([
            'body' => ['required', 'string', 'min:2', 'max:1000'],
        ]);

        $article->comments()->create($data + ['user_id' => $request->user()->id]);

        return back()->with('status', 'Comment added');
    }

    public function destroy(Comment $comment)
    {
        Gate::authorize('delete-comment', $comment);

        $comment->delete();

        return back()->with('status', 'Comment deleted');
    }
}