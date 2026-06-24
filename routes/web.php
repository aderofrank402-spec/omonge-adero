<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\ContactSubmissionController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\SiteContentController;
use App\Http\Controllers\Admin\SubscriberController as AdminSubscriberController;
use App\Http\Controllers\Public\ContactController;
use App\Http\Controllers\Public\SubscriberController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use App\Models\Post;
use App\Models\Subscriber;

// Public Routes
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/about', [PublicController::class, 'about'])->name('about');
Route::get('/blogs', [PublicController::class, 'blogs'])->name('blogs.index');
Route::get('/blogs/{slug}', [PublicController::class, 'showBlog'])->name('blogs.show');
Route::get('/insights', [PublicController::class, 'insights'])->name('insights.index');
Route::get('/insights/{slug}', [PublicController::class, 'showInsight'])->name('insights.show');
Route::get('/contact', [PublicController::class, 'contact'])->name('contact');
Route::get('/faq', [PublicController::class, 'faq'])->name('faq');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit')->middleware('throttle:3,1');
Route::get('/search', [App\Http\Controllers\Public\SearchController::class, 'index'])->name('search');
Route::post('/subscribe', [SubscriberController::class, 'subscribe'])->name('subscribe')->middleware('throttle:3,1');
Route::get('subscribe/verify/{token}', [SubscriberController::class, 'verify'])->name('subscribe.verify');
Route::get('/privacy-policy', [PublicController::class, 'privacy'])->name('privacy');
Route::get('/terms-of-service', [PublicController::class, 'terms'])->name('terms');
Route::get('/sitemap.xml', [App\Http\Controllers\Public\SitemapController::class, 'index'])->name('sitemap');

// Location Pages (SEO)
Route::get('/lawyer-in-westlands', [App\Http\Controllers\Public\LocationController::class, 'westlands'])->name('locations.westlands');
Route::get('/lawyer-in-upper-hill', [App\Http\Controllers\Public\LocationController::class, 'upperHill'])->name('locations.upper-hill');
Route::get('/lawyer-in-kilimani', [App\Http\Controllers\Public\LocationController::class, 'kilimani'])->name('locations.kilimani');


// Comment Routes
Route::post('/posts/{post:slug}/comments', [CommentController::class, 'store'])->name('comments.store')->middleware('throttle:3,1');
Route::get('/posts/{post:slug}/comments/load-more', [CommentController::class, 'loadMore'])->name('comments.loadMore');

// Admin Routes (Protected)
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        $totalPosts = Post::count();
        $publishedPosts = Post::whereNotNull('published_at')->count();
        $draftPosts = Post::whereNull('published_at')->count();
        $blogsCount = Post::where('type', 'blog')->count();
        $insightsCount = Post::where('type', 'insight')->count();
        $subscribersCount = Subscriber::count();
        $contactSubmissionsCount = ContactSubmission::count();
        $unreadContactsCount = ContactSubmission::where('is_read', false)->count();
        $totalComments = App\Models\Comment::count();
        $pendingComments = App\Models\Comment::where('approved', false)->count();

        return view('admin.dashboard', compact(
            'totalPosts',
            'publishedPosts',
            'draftPosts',
            'blogsCount',
            'insightsCount',
            'subscribersCount',
            'contactSubmissionsCount',
            'unreadContactsCount',
            'totalComments',
            'pendingComments'
        ));
    })->name('dashboard');

    Route::resource('posts', AdminPostController::class);

    // Content Management (Singleton-style)
    Route::get('/content', [SiteContentController::class, 'index'])->name('content.index');
    Route::put('/content', [SiteContentController::class, 'update'])->name('content.update');

    // Subscribers
    Route::get('subscribers/export', [AdminSubscriberController::class, 'export'])->name('subscribers.export');
    Route::get('subscribers/email', [AdminSubscriberController::class, 'createEmail'])->name('subscribers.email');
    Route::post('subscribers/send', [AdminSubscriberController::class, 'sendEmail'])->name('subscribers.send');
    Route::resource('subscribers', AdminSubscriberController::class)->only(['index', 'destroy']);

    // Contact Submissions
    Route::get('contact-submissions', [ContactSubmissionController::class, 'index'])->name('contact-submissions.index');
    Route::get('contact-submissions/{submission}', [ContactSubmissionController::class, 'show'])->name('contact-submissions.show');
    Route::delete('contact-submissions/{submission}', [ContactSubmissionController::class, 'destroy'])->name('contact-submissions.destroy');
    Route::get('contact-submissions/{submission}/reply', [ContactSubmissionController::class, 'reply'])->name('contact-submissions.reply');
    Route::post('contact-submissions/{submission}/reply', [ContactSubmissionController::class, 'sendReply'])->name('contact-submissions.send-reply');

    // Comments (Admin Moderation)
    Route::get('comments', [AdminCommentController::class, 'index'])->name('comments.index');
    Route::patch('comments/{comment}/approve', [AdminCommentController::class, 'approve'])->name('comments.approve');
    Route::delete('comments/{comment}', [AdminCommentController::class, 'destroy'])->name('comments.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
