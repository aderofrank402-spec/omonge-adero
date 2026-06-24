<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    /**
     * Get the comments for the blog post.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get only approved comments for the blog post.
     */
    public function approvedComments()
    {
        return $this->hasMany(Comment::class)->where('approved', true)->orderBy('created_at', 'desc');
    }
    /**
     * Get the smart image URL for the post.
     * Handles "storage/", "public/", and full URLs automatically.
     */
    public function getImageUrlAttribute()
    {
        $path = $this->image_path;

        if (!$path) {
            return asset('assets/images/brian.jpeg');
        }

        if (str_starts_with($path, 'http')) {
            return $path;
        }

        // Clean up "public/" prefix if it exists
        if (str_starts_with($path, 'public/')) {
            $path = substr($path, 7);
        }

        // If it already starts with storage/, just asset() it
        if (str_starts_with($path, 'storage/')) {
            return asset($path);
        }

        // Otherwise prepend storage/
        return asset('storage/' . $path);
    }
}

