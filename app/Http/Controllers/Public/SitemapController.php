<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index()
    {
        $baseUrl = 'https://omongeadero.com';

        // Static Pages
        $urls = [
            [
                'loc' => $baseUrl,
                'lastmod' => date('Y-m-d'),
                'priority' => '1.0',
                'changefreq' => 'daily'
            ],
            [
                'loc' => "{$baseUrl}/about",
                'lastmod' => date('Y-m-d'),
                'priority' => '0.8',
                'changefreq' => 'monthly'
            ],
            [
                'loc' => "{$baseUrl}/contact",
                'lastmod' => date('Y-m-d'),
                'priority' => '0.5',
                'changefreq' => 'monthly'
            ],
            [
                'loc' => "{$baseUrl}/faq",
                'lastmod' => date('Y-m-d'),
                'priority' => '0.8',
                'changefreq' => 'monthly'
            ],
            [
                'loc' => "{$baseUrl}/blogs",
                'lastmod' => date('Y-m-d'),
                'priority' => '0.9',
                'changefreq' => 'daily'
            ],
            [
                'loc' => "{$baseUrl}/insights",
                'lastmod' => date('Y-m-d'),
                'priority' => '0.9',
                'changefreq' => 'daily'
            ],
            [
                'loc' => "{$baseUrl}/privacy-policy",
                'lastmod' => '2024-01-01', // Static date or dynamic if needed
                'priority' => '0.1',
                'changefreq' => 'yearly'
            ],
            [
                'loc' => "{$baseUrl}/terms-of-service",
                'lastmod' => '2024-01-01',
                'priority' => '0.1',
                'changefreq' => 'yearly'
            ],
            // Location Pages (SEO)
            [
                'loc' => "{$baseUrl}/lawyer-in-westlands",
                'lastmod' => date('Y-m-d'),
                'priority' => '0.9',
                'changefreq' => 'monthly'
            ],
            [
                'loc' => "{$baseUrl}/lawyer-in-upper-hill",
                'lastmod' => date('Y-m-d'),
                'priority' => '0.9',
                'changefreq' => 'monthly'
            ],
            [
                'loc' => "{$baseUrl}/lawyer-in-kilimani",
                'lastmod' => date('Y-m-d'),
                'priority' => '0.9',
                'changefreq' => 'monthly'
            ],
        ];

        // Dynamic Posts (Blogs & Insights)
        $posts = Post::whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->get();

        foreach ($posts as $post) {
            $prefix = $post->type === 'insight' ? 'insights' : 'blogs';
            $urls[] = [
                'loc' => "{$baseUrl}/{$prefix}/{$post->slug}",
                'lastmod' => $post->updated_at->format('Y-m-d'),
                'priority' => '0.7',
                'changefreq' => 'weekly'
            ];
        }

        // Generate XML
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        foreach ($urls as $url) {
            $xml .= '<url>';
            $xml .= "<loc>{$url['loc']}</loc>";
            $xml .= "<lastmod>{$url['lastmod']}</lastmod>";
            $xml .= "<changefreq>{$url['changefreq']}</changefreq>";
            $xml .= "<priority>{$url['priority']}</priority>";
            $xml .= '</url>';
        }

        $xml .= '</urlset>';

        return response($xml, 200)
            ->header('Content-Type', 'application/xml');
    }
}
