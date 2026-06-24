<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteContent extends Model
{
    protected $guarded = [];

    /**
     * Get a specific content value as a decoded array if it's JSON, or the raw value.
     */
    public static function getValue($key, $default = null)
    {
        $content = self::where('key', $key)->first();
        if (!$content)
            return $default;

        $decoded = json_decode($content->value, true);
        return (json_last_error() === JSON_ERROR_NONE) ? $decoded : $content->value;
    }
    /**
     * Get a content value as a fully resolved image URL.
     */
    public static function getImageUrl($key, $default = 'assets/images/brian.jpeg')
    {
        $path = self::getValue($key, $default);

        if (!$path) {
            return asset($default);
        }

        if (str_starts_with($path, 'http')) {
            return $path;
        }

        if (str_starts_with($path, 'assets/')) {
            return asset($path);
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

