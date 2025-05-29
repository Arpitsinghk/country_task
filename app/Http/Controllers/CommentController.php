<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Http\Resources\CommentResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index($postId)
    {
          $userId = Auth::id();

            if (!$userId) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }

        $comments = Comment::where('post_id', $postId)->paginate(10);
        
        //  return response()->json([
        //     'success' => true,
        //     'data' => $comments
        // ]);
        return CommentResource::collection($comments);
    }

    public function store(Request $request, $postId)
    {
          $userId = Auth::id();

            if (!$userId) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }

        $validated = $request->validate([
            'body' => 'required',
        ]);


        $comment = Comment::create([
            'post_id' => $postId,
            'user_id' => auth()->id(),
            'body' => $validated['body'],
        ]);

        return new CommentResource($comment);
    }

    public function show($postId, $id)
    {
        $comment = Comment::where('post_id', $postId)->findOrFail($id);
        return new CommentResource($comment);
    }

    // public function update(Request $request, $postId, $id)
    // {
    //      $userId = Auth::id();

    //         if (!$userId) {
    //             return response()->json(['error' => 'Unauthorized'], 401);
    //         }
    //     $validated = $request->validate([
    //         'body' => 'required',
    //     ]);

    //     $comment = Comment::where('post_id', $postId)->findOrFail($id);
    //     $comment->update($validated);

    //     return new CommentResource($comment);
    // }

    public function update(Request $request, $id)
{
    $validated = $request->validate([
        'body' => 'required|string',
    ]);

    $comment = Comment::findOrFail($id);
    $comment->update($validated);

    return new CommentResource($comment);
}


   public function destroy($postId, $id)
{
    $userId = Auth::id();
    if (!$userId) {
        return response()->json([
            'success' => false,
            'message' => 'Unauthorized'
        ], 401);
    }

    $comment = Comment::where('post_id', $postId)->find($id);
    if (!$comment) {
        return response()->json([
            'success' => false,
            'message' => 'Comment not found'
        ], 404);
    }

    if ($comment->user_id !== $userId) {
        return response()->json([
            'success' => false,
            'message' => 'Forbidden: You do not own this comment'
        ], 403);
    }

    $comment->delete();

    return response()->json([
        'success' => true,
        'message' => 'Comment deleted successfully'
    ], 200);
}
}
