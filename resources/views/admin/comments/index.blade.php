@extends('layouts.admin')

@section('page-title', 'Comments')
@section('page-subtitle', 'Moderate and manage user comments')

@section('content')
    <!-- Filter Tabs -->
    <div class="mb-6 flex gap-2 border-b border-slate-200 pb-4">
        <a href="{{ route('admin.comments.index', ['filter' => 'all']) }}"
            class="px-4 py-2 rounded-lg font-medium transition-colors {{ $filter === 'all' ? 'bg-slate-900 text-white' : 'bg-white text-slate-700 hover:bg-slate-100' }}">
            All ({{ $pendingCount + $approvedCount }})
        </a>
        <a href="{{ route('admin.comments.index', ['filter' => 'pending']) }}"
            class="px-4 py-2 rounded-lg font-medium transition-colors {{ $filter === 'pending' ? 'bg-slate-900 text-white' : 'bg-white text-slate-700 hover:bg-slate-100' }}">
            Pending ({{ $pendingCount }})
        </a>
        <a href="{{ route('admin.comments.index', ['filter' => 'approved']) }}"
            class="px-4 py-2 rounded-lg font-medium transition-colors {{ $filter === 'approved' ? 'bg-slate-900 text-white' : 'bg-white text-slate-700 hover:bg-slate-100' }}">
            Approved ({{ $approvedCount }})
        </a>
    </div>

    <!-- Success Message -->
    @if (session('success'))
        <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg text-green-800">
            {{ session('success') }}
        </div>
    @endif

    <!-- Comments Table -->
    @if ($comments->count() > 0)
        <div class="bg-white rounded-lg border border-slate-200 overflow-hidden">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">Post</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">Comment</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 text-right text-xs font-bold text-slate-700 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-slate-200">
                    @foreach ($comments as $comment)
                        <tr class="hover:bg-slate-50">
                            <td class="px-6 py-4">
                                <a href="{{ route($comment->post->type === 'blog' ? 'blogs.show' : 'insights.show', $comment->post->slug) }}"
                                    target="_blank" class="text-sm font-medium text-blue-600 hover:text-blue-800 underline">
                                    {{ Str::limit($comment->post->title, 40) }}
                                </a>
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-900">{{ $comment->name }}</td>
                            <td class="px-6 py-4 text-sm text-slate-700">{{ Str::limit($comment->comment, 60) }}</td>
                            <td class="px-6 py-4">
                                @if ($comment->approved)
                                    <span class="px-2 py-1 text-xs font-bold bg-green-100 text-green-800 rounded-full">Approved</span>
                                @else
                                    <span class="px-2 py-1 text-xs font-bold bg-yellow-100 text-yellow-800 rounded-full">Pending</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-500">{{ $comment->created_at->format('M d, Y') }}</td>
                            <td class="px-6 py-4 text-right text-sm font-medium">
                                <div class="flex items-center justify-end gap-2">
                                    <form action="{{ route('admin.comments.approve', $comment) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                            class="px-3 py-1 {{ $comment->approved ? 'bg-yellow-600 hover:bg-yellow-700' : 'bg-green-600 hover:bg-green-700' }} text-white text-xs font-bold rounded transition-colors">
                                            {{ $comment->approved ? 'Unapprove' : 'Approve' }}
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.comments.destroy', $comment) }}" method="POST" class="inline"
                                        onsubmit="return confirm('Are you sure you want to delete this comment?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white text-xs font-bold rounded transition-colors">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $comments->links() }}
        </div>
    @else
        <div class="text-center py-12 bg-white rounded-lg border border-slate-200">
            <svg class="mx-auto h-12 w-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
            </svg>
            <h3 class="mt-4 text-lg font-medium text-slate-900">No comments found</h3>
            <p class="mt-2 text-sm text-slate-500">Comments will appear here once visitors start engaging with your posts.</p>
        </div>
    @endif
@endsection