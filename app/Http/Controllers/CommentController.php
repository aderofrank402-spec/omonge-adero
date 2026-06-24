<?php

namespace App\Http\Controllers;

use App\Mail\NewCommentNotification;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;

class CommentController extends Controller
{
    /**
     * Store a new comment.
     */
    public function store(Request $request, Post $post)
    {
        // Rate limiting: max 3 comments per IP per hour
        $key = 'comment.' . $request->ip();

        if (RateLimiter::tooManyAttempts($key, 3)) {
            $seconds = RateLimiter::availableIn($key);
            return back()->with('comment_error', 'Too many comments. Please try again in ' . ceil($seconds / 60) . ' minutes.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|string|max:1000',
        ]);

        $comment = $post->comments()->create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'comment' => $validated['comment'],
            'approved' => false, // Require moderation
            'ip_address' => $request->ip(),
        ]);

        RateLimiter::hit($key, 3600); // 1 hour decay

        // Send notification email to admin
        try {
            Mail::to('insights@omongeadero.com')->send(new NewCommentNotification($comment, $post));
        } catch (\Exception $e) {
            // Log error but don't fail the comment submission
            \Log::error('Failed to send comment notification email: ' . $e->getMessage());
        }

        return back()->with('success', 'Thank you for your comment! It will appear after moderation.');
    }

    /**
     * Load more comments for a post (AJAX endpoint).
     */
    public function loadMore(Request $request, Post $post)
    {
        $offset = $request->get('offset', 0);
        $limit = 15;

        $comments = $post->approvedComments()
            ->orderBy('created_at', 'desc')
            ->skip($offset)
            ->take($limit)
            ->get();

        return response()->json([
            'comments' => $comments,
            'hasMore' => $post->approvedComments()->count() > ($offset + $limit)
        ]);
    }
}
