<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of comments.
     */
    public function index(Request $request)
    {
        $filter = $request->get('filter', 'all');

        $query = Comment::with('post')->orderByRaw('approved ASC, created_at DESC');

        if ($filter === 'pending') {
            $query->pending();
        } elseif ($filter === 'approved') {
            $query->approved();
        }

        $comments = $query->paginate(20);
        $pendingCount = Comment::pending()->count();
        $approvedCount = Comment::approved()->count();

        return view('admin.comments.index', compact('comments', 'pendingCount', 'approvedCount', 'filter'));
    }

    /**
     * Toggle approval status of a comment.
     */
    public function approve(Comment $comment)
    {
        $comment->update(['approved' => !$comment->approved]);

        $status = $comment->approved ? 'approved' : 'unapproved';
        return back()->with('success', "Comment {$status} successfully.");
    }

    /**
     * Remove the specified comment.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return back()->with('success', 'Comment deleted successfully.');
    }
}
