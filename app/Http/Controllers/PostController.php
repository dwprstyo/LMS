<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return Post::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'class_id' => 'required|exists:class_subjects,id',
            'content' => 'required|string',
            'created_by' => 'required|exists:users,id',
        ]);

        return Post::create($validated);
    }

    public function show(Post $post)
    {
        return $post;
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'class_id' => 'required|exists:class_subjects,id',
            'content' => 'required|string',
            'created_by' => 'required|exists:users,id',
        ]);

        $post->update($validated);

        return $post;
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return response()->json(['message' => 'Post deleted successfully.']);
    }
}
