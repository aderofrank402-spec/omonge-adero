@extends('layouts.site')

@section('title', 'Under Maintenance | Brian Adero')

@section('content')
    <div class="min-h-[70vh] flex items-center justify-center bg-slate-50 dark:bg-slate-900 transition-colors pt-20">
        <div class="text-center px-6 fade-up">
            <h1 class="text-9xl font-serif text-slate-200 dark:text-slate-800 font-bold mb-4 select-none">503</h1>
            <h2 class="text-3xl md:text-4xl font-serif text-slate-900 dark:text-white mb-6">Under Maintenance</h2>
            <p class="text-slate-600 dark:text-slate-400 mb-8 max-w-md mx-auto leading-relaxed">
                We are currently performing scheduled maintenance to improve our services. Please check back shortly.
            </p>
            <div class="hidden">
                <!-- Hidden home link for bots/admins if needed, but usually 503 prevents nav -->
            </div>
        </div>
    </div>
@endsection