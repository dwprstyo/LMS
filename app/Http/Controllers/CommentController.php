<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        return Comment::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'comment' => 'required|string',
            'created_by' => 'required|exists:users,id',
        ]);

        return Comment::create($validated);
    }

    public function show(Comment $comment)
    {
        return $comment;
    }

    public function update(Request $request, Comment $comment)
    {
        $validated = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'comment' => 'required|string',
            'created_by' => 'required|exists:users,id',
        ]);

        $comment->update($validated);

        return $comment;
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return response()->json(['message' => 'Comment deleted successfully.']);
    }
}
