@extends('layouts.site')

@section('title', 'Server Error | Brian Adero')

@section('content')
    <div class="min-h-[70vh] flex items-center justify-center bg-slate-50 dark:bg-slate-900 transition-colors pt-20">
        <div class="text-center px-6 fade-up">
            <h1 class="text-9xl font-serif text-slate-200 dark:text-slate-800 font-bold mb-4 select-none">500</h1>
            <h2 class="text-3xl md:text-4xl font-serif text-slate-900 dark:text-white mb-6">Server Error</h2>
            <p class="text-slate-600 dark:text-slate-400 mb-8 max-w-md mx-auto leading-relaxed">
                Something went wrong on our servers. We are aware of the issue and are working to fix it.
            </p>
            <a href="{{ route('home') }}"
                class="inline-block px-8 py-4 bg-slate-900 dark:bg-white text-white dark:text-slate-900 font-bold uppercase tracking-widest text-sm rounded-full hover:bg-slate-800 dark:hover:bg-slate-200 transition-all shadow-lg hover:shadow-xl hover:-translate-y-1">
                Back to Home
            </a>
        </div>
    </div>
@endsection