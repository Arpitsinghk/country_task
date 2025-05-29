<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Request $request)
    {
           $userId = Auth::id();

    if (!$userId) {
        return response()->json(['error' => 'Unauthorized'], 401);
    }
        $posts = Post::paginate(10);
        return response()->json([
            'success' => true,
            'data' => $posts
        ]);
    }

    public function store(Request $request)
{
    $userId = Auth::id();

    if (!$userId) {
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    $post = Post::create([
        'user_id' => $userId,
        'title' => $request->title,
        'body' => $request->body,
    ]);

    return response()->json([
        'success' => true,
        'data' => $post
    ], 201);
}


   public function update(Request $request, $id)
{

    $userId = Auth::id();

    if (!$userId) {
        return response()->json(['error' => 'Unauthorized'], 401);
    }
        $validated = $request->validate([
        'title' => 'required|string|max:255',
        'body' => 'required|string',
    ]);

    $post = Post::findOrFail($id);
    if ($post->user_id !== Auth::id()) {
        return response()->json([
            'success' => false,
            'message' => 'Unauthorized',
        ], 403);
    }

    $post->update($validated);

    return response()->json([
        'success' => true,
        'data' => $post,
    ]);
}

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        
        if ($post->user_id !== Auth::id()) {
            return response()->json([
                'success' => false,
                'error' => 'Unauthorized'
            ], 403);
        }

        $post->delete();

        return response()->json([
            'success' => true,
            'message' => 'Post deleted successfully'
        ], 200);
    }

    private function validateRequest(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);
    }
}
