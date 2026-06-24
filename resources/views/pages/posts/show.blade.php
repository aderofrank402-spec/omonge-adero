@extends('layouts.site')

@section('title', $post->title . ' | Omonge Adero')
@section('description', $post->excerpt)

@section('meta')
    <meta property="og:title" content="{{ $post->title }}">
    <meta property="og:description" content="{{ $post->excerpt }}">
    <meta property="og:image" content="{{ $post->image_path ? $post->image_url : asset('assets/images/brian.jpeg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="article">
    <meta name="twitter:card" content="summary_large_image">
@endsection

@section('content')
    <!-- Header / Hero Section -->
    <header class="relative pt-32 pb-20 bg-slate-900 overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            @if($post->image_path)
                <img src="{{ $post->image_url }}" class="w-full h-full object-cover">
            @endif
        </div>
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/80 to-transparent"></div>

        <div class="relative max-w-7xl mx-auto px-6 fade-up">
            <a href="{{ $post->type === 'blog' ? route('blogs.index') : route('insights.index') }}"
                class="inline-flex items-center gap-2 text-xs font-bold tracking-widest uppercase text-slate-400 hover:text-white transition-colors mb-8">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Back to {{ $post->type === 'blog' ? 'Blogs' : 'Insights' }}
            </a>

            <div class="max-w-4xl">
                <div class="flex items-center gap-4 text-sm text-slate-400 mb-6">
                    <span
                        class="px-3 py-1 border border-slate-600 rounded-full bg-slate-800/50 uppercase tracking-widest text-xs font-bold">
                        {{ $post->type }}
                    </span>
                    <span>&bull;</span>
                    <span>{{ $post->published_at->format('F d, Y') }}</span>
                    <span>&bull;</span>
                    <span>By Omonge Adero</span>
                </div>

                <h1 class="font-serif text-4xl md:text-5xl lg:text-6xl text-white mb-6 leading-tight">
                    {{ $post->title }}
                </h1>
            </div>
        </div>
    </header>

    <!-- Main Content Grid -->
    <div class="bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-6 py-16">
            <div class="grid lg:grid-cols-12 gap-12 text-slate-600">

                <!-- Left Column: Article -->
                <article class="lg:col-span-8">
                    @if($post->image_path)
                        <div class="aspect-video bg-slate-100 rounded-xl overflow-hidden mb-10 shadow-lg">
                            <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                        </div>
                    @endif

                    <div
                        class="prose prose-lg prose-slate dark:prose-invert max-w-none prose-headings:font-serif prose-headings:text-slate-900 dark:prose-headings:text-white prose-a:text-blue-900 dark:prose-a:text-blue-400 prose-img:rounded-xl transition-colors">
                        {!! $post->content !!}
                    </div>

                    <!-- Share / Tags Footer -->
                    <div class="mt-12 pt-8 border-t border-slate-200 dark:border-slate-800 transition-colors">
                        <h4
                            class="text-sm font-bold text-slate-900 dark:text-white uppercase tracking-widest mb-4 transition-colors">
                            Share this post</h4>
                        <div class="flex gap-4">
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($post->title) }}"
                                target="_blank" rel="noopener noreferrer"
                                class="p-2 bg-slate-100 dark:bg-slate-800 rounded-full hover:bg-slate-200 dark:hover:bg-slate-700 transition-colors text-slate-600 dark:text-slate-400">
                                <span class="sr-only">Twitter</span>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                                </svg>
                            </a>
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}"
                                target="_blank" rel="noopener noreferrer"
                                class="p-2 bg-slate-100 dark:bg-slate-800 rounded-full hover:bg-slate-200 dark:hover:bg-slate-700 transition-colors text-slate-600 dark:text-slate-400">
                                <span class="sr-only">LinkedIn</span>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                                </svg>
                            </a>
                        </div>
                    </div>


                    <!-- Download Attachment -->
                    @if($post->attachment_path)
                        <div class="mt-8 pt-8 border-t border-slate-200 dark:border-slate-800 transition-colors">
                            <h4
                                class="text-sm font-bold text-slate-900 dark:text-white uppercase tracking-widest mb-4 transition-colors">
                                Attached Documents</h4>
                            <a href="{{ asset('storage/' . $post->attachment_path) }}" target="_blank"
                                class="inline-flex items-center gap-3 p-4 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg hover:border-slate-300 dark:hover:border-slate-600 transition-colors group">
                                <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                </svg>
                                <div>
                                    <div
                                        class="font-bold text-slate-900 dark:text-white text-sm group-hover:text-blue-700 dark:group-hover:text-blue-400 transition-colors">
                                        Download PDF
                                        Attachment
                                    </div>
                                </div>
                                <svg class="w-4 h-4 ml-2 text-slate-400 group-hover:text-slate-600" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                            </a>
                        </div>
                    @endif
                </article>

                <!-- Right Column: Sidebar -->
                <aside class="lg:col-span-4">
                    <div class="space-y-8 sticky top-24">

                        <!-- Author Widget -->
                        <div
                            class="bg-slate-50 dark:bg-slate-800 p-6 rounded-xl border border-slate-100 dark:border-slate-700 transition-colors">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-16 h-16 rounded-full overflow-hidden bg-slate-200 dark:bg-slate-700">
                                    <img src="{{ asset('assets/images/brian.jpeg') }}" alt="Brian Adero"
                                        class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <h3
                                        class="font-serif text-lg text-slate-900 dark:text-white font-bold transition-colors">
                                        Brian Adero</h3>
                                    <p
                                        class="text-xs text-slate-500 dark:text-slate-400 uppercase tracking-wider transition-colors">
                                        Advocate</p>
                                </div>
                            </div>
                            <p class="text-sm text-slate-600 dark:text-slate-300 mb-4 leading-relaxed transition-colors">
                                An Advocate of the High Court of Kenya specializing in corporate law, commercial litigation,
                                and
                                family practice.
                            </p>
                            <a href="{{ route('about') }}"
                                class="text-sm font-bold text-slate-900 dark:text-white hover:text-blue-700 dark:hover:text-blue-400 underline decoration-slate-300 dark:decoration-slate-600 underline-offset-4 transition-colors">More
                                About Me &rarr;</a>
                        </div>

                        <!-- Recent Posts Widget -->
                        @if($recentPosts->count() > 0)
                            <div
                                class="bg-white dark:bg-slate-800 p-6 rounded-xl border border-slate-100 dark:border-slate-700 shadow-sm transition-colors">
                                <h3
                                    class="font-serif text-lg text-slate-900 dark:text-white font-bold mb-6 pb-2 border-b border-slate-100 dark:border-slate-700 transition-colors">
                                    Recent
                                    {{ $post->type === 'blog' ? 'Blogs' : 'Insights' }}
                                </h3>
                                <div class="space-y-6">
                                    @foreach($recentPosts as $recent)
                                        <a href="{{ $recent->type === 'blog' ? route('blogs.show', $recent->slug) : route('insights.show', $recent->slug) }}"
                                            class="group flex gap-4 items-start">
                                            @if($recent->image_path)
                                                <div
                                                    class="w-20 h-20 flex-shrink-0 rounded-lg overflow-hidden bg-slate-100 dark:bg-slate-700 transition-colors">
                                                    <img src="{{ $recent->image_url }}"
                                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                                </div>
                                            @endif
                                            <div>
                                                <h4
                                                    class="text-sm font-bold text-slate-900 dark:text-white group-hover:text-blue-700 dark:group-hover:text-blue-400 transition-colors line-clamp-2 leading-snug mb-1">
                                                    {{ $recent->title }}
                                                </h4>
                                                <span
                                                    class="text-xs text-slate-400 dark:text-slate-500">{{ $recent->published_at->format('M d, Y') }}</span>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Newsletter / CTA Widget -->
                        <div class="bg-slate-900 p-8 rounded-xl text-center text-white relative overflow-hidden">
                            <div class="absolute inset-0 bg-blue-900/20"></div>
                            <div class="relative z-10">
                                <h3 class="font-serif text-xl font-bold mb-2">Need Legal Advice?</h3>
                                <p class="text-slate-300 text-sm mb-6">Schedule a consultation today to discuss your case.
                                </p>
                                <a href="{{ route('contact') }}"
                                    class="inline-block w-full py-3 bg-white text-slate-900 font-bold text-sm rounded-lg hover:bg-slate-100 transition-colors">
                                    Contact Me
                                </a>
                            </div>
                        </div>

                    </div>
                </aside>
            </div>
        </div>
    </div>

    {{-- Comments Section (Full Width) --}}
    <div class="bg-white dark:bg-slate-900 py-16 border-t border-slate-200 dark:border-slate-800">
        <div class="max-w-7xl mx-auto px-6">
            <h3 class="font-serif text-3xl font-bold text-slate-900 dark:text-white mb-8">
                Comments <span
                    class="text-slate-500 dark:text-slate-400 text-xl">({{ $post->approvedComments->count() }})</span>
            </h3>

            {{-- Success/Error Messages --}}
            @if (session('success'))
                <div
                    class="mb-6 p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg text-green-800 dark:text-green-200">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('comment_error'))
                <div
                    class="mb-6 p-4 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg text-red-800 dark:text-red-200">
                    {{ session('comment_error') }}
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                {{-- Left Column: Comment Form --}}
                <div class="lg:col-span-4">
                    <div
                        class="p-6 bg-slate-50 dark:bg-slate-800/50 rounded-lg border border-slate-200 dark:border-slate-700 sticky top-24">
                        <h4 class="font-bold text-slate-900 dark:text-white mb-4">Leave a Comment</h4>
                        <form action="{{ route('comments.store', $post->slug) }}" method="POST" class="space-y-4">
                            @csrf
                            <div class="space-y-4">
                                <div>
                                    <label for="name"
                                        class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-1">Name
                                        *</label>
                                    <input type="text" id="name" name="name" required value="{{ old('name') }}"
                                        class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-slate-900 dark:focus:ring-slate-400 focus:border-transparent bg-white dark:bg-slate-900 text-slate-900 dark:text-white @error('name') border-red-500 @enderror">
                                    @error('name')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="email"
                                        class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-1">Email
                                        *</label>
                                    <input type="email" id="email" name="email" required value="{{ old('email') }}"
                                        class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-slate-900 dark:focus:ring-slate-400 focus:border-transparent bg-white dark:bg-slate-900 text-slate-900 dark:text-white @error('email') border-red-500 @enderror">
                                    @error('email')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="comment"
                                        class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-1">Comment
                                        *</label>
                                    <textarea id="comment" name="comment" rows="6" required
                                        class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-slate-900 dark:focus:ring-slate-400 focus:border-transparent bg-white dark:bg-slate-900 text-slate-900 dark:text-white @error('comment') border-red-500 @enderror">{{ old('comment') }}</textarea>
                                    @error('comment')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                    <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">Your email will not be
                                        published. Max 1000 characters.</p>
                                </div>
                                <button type="submit"
                                    class="w-full px-6 py-3 bg-slate-900 dark:bg-white text-white dark:text-slate-900 font-bold rounded-lg hover:bg-slate-800 dark:hover:bg-slate-100 transition-colors">
                                    Post Comment
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Right Column: Display Comments --}}
                <div class="lg:col-span-8">
                    @if ($post->approvedComments->count() > 0)
                        <div id="comments-list" class="space-y-6">
                            @foreach ($post->approvedComments->take(15) as $comment)
                                <div
                                    class="p-6 bg-white dark:bg-slate-800/30 border border-slate-200 dark:border-slate-700 rounded-lg">
                                    <div class="flex items-start gap-4">
                                        <div
                                            class="flex-shrink-0 w-12 h-12 bg-slate-900 dark:bg-slate-700 text-white rounded-full flex items-center justify-center font-bold text-lg">
                                            {{ strtoupper(substr($comment->name, 0, 1)) }}
                                        </div>
                                        <div class="flex-1">
                                            <div class="flex items-center gap-3 mb-2">
                                                <span class="font-bold text-slate-900 dark:text-white">{{ $comment->name }}</span>
                                                <span
                                                    class="text-sm text-slate-500 dark:text-slate-400">{{ $comment->created_at->diffForHumans() }}</span>
                                            </div>
                                            <p class="text-slate-700 dark:text-slate-300 leading-relaxed">{{ $comment->comment }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        @if ($post->approvedComments->count() > 15)
                            <div class="mt-8 text-center">
                                <button id="load-more-comments" data-offset="15" data-post-slug="{{ $post->slug }}"
                                    class="px-6 py-3 bg-slate-100 dark:bg-slate-800 text-slate-900 dark:text-white font-bold rounded-lg hover:bg-slate-200 dark:hover:bg-slate-700 transition-colors">
                                    Load More Comments
                                </button>
                            </div>
                        @endif

                        <script>
                            document.getElementById('load-more-comments')?.addEventListener('click', async function () {
                                const button = this;
                                const offset = parseInt(button.dataset.offset);
                                const postSlug = button.dataset.postSlug;

                                button.disabled = true;
                                button.textContent = 'Loading...';

                                try {
                                    const response = await fetch(`/posts/${postSlug}/comments/load-more?offset=${offset}`);
                                    const data = await response.json();

                                    const commentsList = document.getElementById('comments-list');

                                    data.comments.forEach(comment => {
                                        const commentDiv = document.createElement('div');
                                        commentDiv.className = 'p-6 bg-white dark:bg-slate-800/30 border border-slate-200 dark:border-slate-700 rounded-lg';

                                        const createdAt = new Date(comment.created_at);
                                        const timeAgo = getTimeAgo(createdAt);

                                        commentDiv.innerHTML = `
                                                                                    <div class="flex items-start gap-4">
                                                                                        <div class="flex-shrink-0 w-12 h-12 bg-slate-900 dark:bg-slate-700 text-white rounded-full flex items-center justify-center font-bold text-lg">
                                                                                            ${comment.name.charAt(0).toUpperCase()}
                                                                                        </div>
                                                                                        <div class="flex-1">
                                                                                            <div class="flex items-center gap-3 mb-2">
                                                                                                <span class="font-bold text-slate-900 dark:text-white">${comment.name}</span>
                                                                                                <span class="text-sm text-slate-500 dark:text-slate-400">${timeAgo}</span>
                                                                                            </div>
                                                                                            <p class="text-slate-700 dark:text-slate-300 leading-relaxed">${comment.comment}</p>
                                                                                        </div>
                                                                                    </div>
                                                                                `;

                                        commentsList.appendChild(commentDiv);
                                    });

                                    button.dataset.offset = offset + 15;

                                    if (!data.hasMore) {
                                        button.remove();
                                    } else {
                                        button.disabled = false;
                                        button.textContent = 'Load More Comments';
                                    }
                                } catch (error) {
                                    console.error('Error loading comments:', error);
                                    button.disabled = false;
                                    button.textContent = 'Load More Comments';
                                }
                            });

                            function getTimeAgo(date) {
                                const seconds = Math.floor((new Date() - date) / 1000);
                                const intervals = {
                                    year: 31536000,
                                    month: 2592000,
                                    week: 604800,
                                    day: 86400,
                                    hour: 3600,
                                    minute: 60
                                };

                                for (const [unit, secondsInUnit] of Object.entries(intervals)) {
                                    const interval = Math.floor(seconds / secondsInUnit);
                                    if (interval >= 1) {
                                        return interval === 1 ? `1 ${unit} ago` : `${interval} ${unit}s ago`;
                                    }
                                }
                                return 'just now';
                            }
                        </script>
                    @else
                        <div
                            class="h-full flex items-center justify-center p-12 bg-slate-50 dark:bg-slate-800/30 rounded-lg border border-slate-200 dark:border-slate-700 border-dashed">
                            <div class="text-center">
                                <svg class="w-12 h-12 text-slate-400 mx-auto mb-4" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                                <p class="text-slate-500 dark:text-slate-400">No comments yet. Be the first to share your
                                    thoughts!</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection