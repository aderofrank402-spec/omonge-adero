@extends('layouts.site')

@section('title', $location['title'] . ' | Omonge Adero - Advocate of the High Court')
@section('description', $location['description'])

@section('content')
    <!-- Header Section -->
    <header
        class="relative pt-32 pb-20 bg-gradient-to-br from-[#E0E7FF] to-[#F5F7FA] dark:from-slate-900 dark:to-slate-800 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="text-center fade-up">
                <span
                    class="inline-block px-4 py-2 bg-slate-900 dark:bg-white text-white dark:text-slate-900 text-xs font-bold tracking-widest uppercase mb-6">
                    {{ $location['name'] }}, Nairobi
                </span>
                <h1
                    class="font-serif font-bold text-4xl sm:text-5xl md:text-6xl text-slate-900 dark:text-white mb-6 transition-colors">
                    {{ $location['title'] }}
                </h1>
                <p
                    class="font-serif text-lg sm:text-xl text-slate-600 dark:text-slate-300 max-w-3xl mx-auto leading-relaxed mb-8">
                    {{ $location['description'] }}
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="{{ route('contact') }}"
                        class="px-10 py-4 bg-slate-900 text-white hover:bg-slate-800 dark:bg-white dark:text-slate-900 dark:hover:bg-slate-200 transition-all shadow-lg hover:shadow-xl text-xs font-bold tracking-widest uppercase text-center">
                        Get Legal Help
                    </a>
                    <a href="tel:{{ str_replace(' ', '', '+254721485244') }}"
                        class="px-10 py-4 bg-white border border-slate-200 text-slate-900 hover:bg-slate-50 dark:bg-transparent dark:border-slate-600 dark:text-white dark:hover:bg-slate-800 transition-all text-xs font-bold tracking-widest uppercase text-center">
                        Call Now
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Services Section -->
    <section class="py-20 bg-white dark:bg-slate-900 transition-colors">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="text-center mb-16">
                <h2 class="font-serif font-bold text-3xl sm:text-4xl text-slate-900 dark:text-white mb-4">
                    Legal Services in {{ $location['name'] }}
                </h2>
                <p class="text-slate-600 dark:text-slate-400 text-lg max-w-2xl mx-auto">
                    Comprehensive legal representation for individuals and businesses in {{ $location['name'] }} and
                    surrounding areas.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($location['services'] as $service)
                    <div class="bg-slate-50 dark:bg-slate-800 p-8 rounded-lg hover:shadow-lg transition-all">
                        <div class="w-12 h-12 bg-slate-900 dark:bg-slate-700 rounded-lg flex items-center justify-center mb-6">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="font-serif font-bold text-xl text-slate-900 dark:text-white mb-3">{{ $service }}</h3>
                        <p class="text-slate-600 dark:text-slate-400">Expert legal counsel and representation for
                            {{ strtolower($service) }} matters in {{ $location['name'] }}.</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Areas Served -->
    <section class="py-20 bg-slate-50 dark:bg-slate-800 transition-colors">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="text-center mb-12">
                <h2 class="font-serif font-bold text-3xl sm:text-4xl text-slate-900 dark:text-white mb-4">
                    Areas We Serve
                </h2>
                <p class="text-slate-600 dark:text-slate-400 text-lg">
                    Providing legal services throughout {{ $location['name'] }} and nearby neighborhoods
                </p>
            </div>

            <div class="flex flex-wrap justify-center gap-4">
                @foreach($location['areas_served'] as $area)
                    <span
                        class="px-6 py-3 bg-white dark:bg-slate-900 text-slate-900 dark:text-white rounded-full border border-slate-200 dark:border-slate-700 font-medium">
                        {{ $area }}
                    </span>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Why Choose Section -->
    <section class="py-20 bg-white dark:bg-slate-900 transition-colors">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="font-serif font-bold text-3xl sm:text-4xl text-slate-900 dark:text-white mb-6">
                        Why Choose Omonge Adero in {{ $location['name'] }}?
                    </h2>
                    <div class="space-y-6">
                        <div class="flex gap-4">
                            <div
                                class="w-8 h-8 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg text-slate-900 dark:text-white mb-2">Local Expertise</h3>
                                <p class="text-slate-600 dark:text-slate-400">Deep understanding of legal matters affecting
                                    {{ $location['name'] }} residents and businesses.</p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div
                                class="w-8 h-8 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg text-slate-900 dark:text-white mb-2">Advocate of the High Court
                                </h3>
                                <p class="text-slate-600 dark:text-slate-400">Fully qualified and licensed to practice in
                                    all Kenyan courts.</p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div
                                class="w-8 h-8 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg text-slate-900 dark:text-white mb-2">Client-Focused Service
                                </h3>
                                <p class="text-slate-600 dark:text-slate-400">Personalized attention and clear communication
                                    throughout your legal matter.</p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div
                                class="w-8 h-8 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg text-slate-900 dark:text-white mb-2">Proven Track Record</h3>
                                <p class="text-slate-600 dark:text-slate-400">Successfully represented numerous clients in
                                    {{ $location['name'] }} and across Nairobi.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-slate-50 dark:bg-slate-800 p-8 rounded-2xl">
                    <h3 class="font-serif font-bold text-2xl text-slate-900 dark:text-white mb-6">Get Legal Help Today</h3>
                    <div class="space-y-4 mb-6">
                        <div class="flex items-center gap-4">
                            <svg class="w-6 h-6 text-slate-600 dark:text-slate-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                </path>
                            </svg>
                            <div>
                                <p class="text-sm text-slate-500 dark:text-slate-400">Call Us</p>
                                <a href="tel:+254721485244"
                                    class="text-lg font-bold text-slate-900 dark:text-white hover:text-blue-600">+254 721
                                    485 244</a>
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <svg class="w-6 h-6 text-slate-600 dark:text-slate-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                            <div>
                                <p class="text-sm text-slate-500 dark:text-slate-400">Email Us</p>
                                <a href="mailto:omongeadero@gmail.com"
                                    class="text-lg font-bold text-slate-900 dark:text-white hover:text-blue-600">omongeadero@gmail.com</a>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('contact') }}"
                        class="block w-full px-8 py-4 bg-slate-900 text-white hover:bg-slate-800 dark:bg-white dark:text-slate-900 dark:hover:bg-slate-200 transition-all text-center font-bold uppercase tracking-widest text-sm rounded-lg">
                        Schedule Consultation
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-slate-900 text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">
            <h2 class="font-serif font-bold text-3xl sm:text-4xl mb-6">
                Need a Lawyer in {{ $location['name'] }}?
            </h2>
            <p class="text-lg text-slate-300 mb-8 max-w-2xl mx-auto">
                Contact Omonge Adero today for expert legal advice and representation. Your first consultation is just a
                call away.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('contact') }}"
                    class="px-10 py-4 bg-white text-slate-900 hover:bg-slate-100 transition-all text-xs font-bold tracking-widest uppercase">
                    Contact Us
                </a>
                <a href="{{ route('about') }}"
                    class="px-10 py-4 bg-transparent border-2 border-white text-white hover:bg-white hover:text-slate-900 transition-all text-xs font-bold tracking-widest uppercase">
                    Learn More
                </a>
            </div>
        </div>
    </section>
@endsection