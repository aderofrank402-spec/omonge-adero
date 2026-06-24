@extends('layouts.site')

@section('content')
    <!-- Header / Hero Section -->
    <header
        class="relative pt-24 sm:pt-28 md:pt-32 pb-16 sm:pb-20 bg-[#F0F7FF] dark:from-slate-900 dark:to-slate-800 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 text-center fade-up">
            <span class="text-xs font-bold tracking-[0.2em] text-slate-500 dark:text-slate-400 uppercase mb-4 block">My
                Story</span>
            <h1 class="font-serif font-bold text-4xl sm:text-5xl md:text-6xl text-slate-900 dark:text-white mb-6 transition-colors">
                {{ $content['about.page.title']->value ?? 'About Omonge Adero' }}
            </h1>
            <p
                class="font-serif text-lg sm:text-xl text-slate-600 dark:text-slate-300 max-w-3xl mx-auto leading-relaxed transition-colors">
                {{ $content['about.page.subtitle']->value ?? 'A steadfast commitment to legal excellence, integrity, and the pursuit of justice for every client.' }}
            </p>
        </div>
    </header>

    <!-- Content Section -->
    <section class="py-16 sm:py-20 md:py-24 bg-white dark:bg-slate-900 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <!-- Image / Visual -->
                <div class="relative fade-up">
                    <div
                        class="aspect-[3/4] bg-slate-200 dark:bg-slate-800 rounded-lg overflow-hidden relative transition-colors">
                        <!-- Using the dynamically uploaded image name -->
                        <img src="{{ SiteContent::getImageUrl('about.portrait', 'assets/images/about-portrait.jpeg') }}"
                            onerror="this.src='{{ asset('assets/images/brian.jpeg') }}'" alt="Omonge Adero - Advocate"
                            class="w-full h-full object-cover">
                    </div>
                </div>

                <!-- Text Content -->
                <div class="space-y-8 fade-up" style="transition-delay: 100ms;">
                    <div>
                        <h2 class="font-serif font-bold text-2xl sm:text-3xl md:text-4xl text-slate-900 dark:text-white mb-6 transition-colors">
                {{ $content['about.section.title']->value ?? 'Dedicated to Your Legal Success' }}
            </h2>
                        <div class="w-12 h-1 bg-slate-900 dark:bg-slate-500 mb-6 transition-colors"></div>
                        <div
                            class="font-serif text-slate-600 dark:text-slate-300 leading-relaxed mb-6 space-y-6 transition-colors">
                            {!! $content['about.page.bio']->value ?? 'Omonge Adero is an Advocate of the High Court of Kenya...' !!}
                        </div>
                    </div>

                    <!-- Values Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6 pt-4">
                        <div class="bg-slate-50 dark:bg-slate-800 p-4 sm:p-6 rounded-lg transition-colors">
                            <h3 class="font-serif font-bold text-lg sm:text-xl text-slate-900 dark:text-white mb-3 transition-colors">
                                {{ $content['about.value1.title']->value ?? 'Integrity' }}
                            </h3>
                            <p
                                class="font-serif text-base sm:text-lg text-slate-600 dark:text-slate-400 transition-colors leading-relaxed">
                                {{ $content['about.value1.desc']->value ?? 'Upholding the highest ethical standards in every case.' }}
                            </p>
                        </div>
                        <div class="bg-slate-50 dark:bg-slate-800 p-4 sm:p-6 rounded-lg transition-colors">
                            <h3 class="font-serif font-bold text-lg sm:text-xl text-slate-900 dark:text-white mb-3 transition-colors">
                                {{ $content['about.value2.title']->value ?? 'Excellence' }}
                            </h3>
                            <p
                                class="font-serif text-base sm:text-lg text-slate-600 dark:text-slate-400 transition-colors leading-relaxed">
                                {{ $content['about.value2.desc']->value ?? 'Pursuing superior outcomes through diligent preparation.' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Experience Section -->
    <section class="py-16 sm:py-20 md:py-24 bg-[#F8FAFF] dark:bg-slate-800 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end mb-12 sm:mb-16 gap-4 fade-up">
                <div>
                    <h2 class="font-serif font-bold text-3xl sm:text-4xl text-slate-900 dark:text-white mb-4 transition-colors">
                        Experience</h2>
                    <p class="text-slate-500 uppercase tracking-widest text-xs font-bold">Professional Journey</p>
                </div>
                <div class="hidden md:block h-px w-32 bg-slate-200 dark:bg-slate-700 mb-4 transition-colors"></div>
            </div>

            @php use App\Models\SiteContent; @endphp
            @php
                $experience = SiteContent::getValue('home.experience', [
                    ['period' => '2023 - Present', 'title' => 'Senior Associate Advocate', 'company' => 'Ochieng & Associates', 'desc' => 'Leading the corporate litigation department, overseeing complex merger disputes and high-value commercial arbitration. Successfully negotiated settlements totaling over $2M in 2023 alone.'],
                    ['period' => '2021 - 2023', 'title' => 'Associate Advocate', 'company' => 'Mutuso Dhahabu & Co. Advocates', 'desc' => 'Specialized in Family Law and Civil Litigation. Managed a verified caseload of 40+ active files, appearing before the High Court and Court of Appeal routinely.'],
                    ['period' => '2020 - 2021', 'title' => 'Legal Trainee', 'company' => 'Kenya School of Law', 'desc' => 'Completed pupillage with distinction. Drafted pleadings, legal opinions, and conducted extensive legal research on constitutional matters.']
                ]);
            @endphp
            <div class="space-y-16 max-w-4xl border-l-2 border-slate-200 dark:border-slate-700 ml-4 sm:ml-6 pl-8 sm:pl-12 relative transition-colors">
                @foreach($experience as $exp)
                    <div class="relative fade-up mb-16 last:mb-0">
                        <div class="absolute -left-[41px] sm:-left-[57px] top-0 w-4 h-4 rounded-full bg-slate-900 dark:bg-slate-400 border-4 border-white dark:border-slate-800 transition-colors">
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-12 gap-4 sm:gap-6">
                            <div class="sm:col-span-3">
                                <span class="text-sm font-bold text-slate-500 dark:text-slate-400">{{ $exp['period'] }}</span>
                            </div>
                            <div class="sm:col-span-9">
                                <h3 class="text-xl sm:text-2xl font-serif font-bold text-slate-900 dark:text-white mb-2 transition-colors">
                                    {{ $exp['title'] }}
                                </h3>
                                <p class="text-xs font-bold uppercase tracking-widest text-slate-500 dark:text-slate-400 mb-6">
                                    {{ $exp['company'] }}
                                </p>
                                <p class="text-slate-600 dark:text-slate-400 text-base leading-relaxed transition-colors">
                                    {{ $exp['desc'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Education Section -->
    <section class="py-16 sm:py-20 md:py-24 bg-white dark:bg-slate-900 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="flex justify-between items-end mb-16 fade-up">
                <div>
                    <h2 class="font-serif font-bold text-3xl sm:text-4xl text-slate-900 dark:text-white mb-4 transition-colors">
                        Education</h2>
                    <p class="text-slate-500 uppercase tracking-widest text-xs font-bold">Academic Background</p>
                </div>
                <div class="hidden md:block h-px w-32 bg-slate-200 dark:bg-slate-700 mb-4 transition-colors"></div>
            </div>

            @php
                $education = SiteContent::getValue('home.education', [
                    ['degree' => 'Post Graduate Diploma', 'institution' => 'Kenya School of Law', 'year' => '2021', 'desc' => 'ATP (Advocates Training Programme) completion with honors.'],
                    ['degree' => 'Bachelor of Laws (LL.B)', 'institution' => 'University of Nairobi', 'year' => '2019', 'desc' => 'Second Class Honors (Upper Division). Specialization in Commercial Law.']
                ]);
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl">
                @foreach($education as $edu)
                    <div class="bg-slate-50 dark:bg-slate-800 p-8 rounded-xl shadow-sm hover:shadow-md transition-all fade-up {{ $loop->iteration > 1 ? 'delay-100' : '' }}">
                        <span class="text-5xl text-slate-200 dark:text-slate-700 font-serif font-bold absolute -mt-6 -ml-4 pointer-events-none transition-colors">
                            {{ sprintf('%02d', $loop->iteration) }}
                        </span>
                        <div class="relative">
                            <h3 class="text-xl font-bold font-serif text-slate-900 dark:text-white mb-2 transition-colors">
                                {{ $edu['degree'] }}
                            </h3>
                            <p class="text-sm text-slate-500 dark:text-slate-400 mb-4">{{ $edu['institution'] }} | {{ $edu['year'] }}</p>
                            <p class="text-slate-600 dark:text-slate-400 text-base leading-relaxed transition-colors">
                                {{ $edu['desc'] }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Philosophy / Approach Section -->
    <section class="py-16 sm:py-20 md:py-24 bg-[#F8FAFF] dark:bg-slate-800 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="text-center mb-16 fade-up">
                <h2 class="font-serif font-bold text-3xl sm:text-4xl text-slate-900 dark:text-white mb-6">
                    {{ $content['about.philosophy.title']->value ?? 'Philosophy & Approach' }}
                </h2>
                <div class="w-16 h-1 bg-slate-900 dark:bg-slate-500 mx-auto transition-colors"></div>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @php
                    $philosophyDefaults = [
                        ['title' => 'Client-First Mentality', 'desc' => 'Every legal strategy is tailored to your specific needs, ensuring clear communication and absolute transparency at every stage of the process.', 'icon' => 'users'],
                        ['title' => 'Relentless Diligence', 'desc' => 'Success in the courtroom is built on hours of research and preparation. I leave no stone unturned when building your case or negotiating on your behalf.', 'icon' => 'search'],
                        ['title' => 'Result-Oriented Action', 'desc' => 'I focus on efficient, high-impact legal actions that move you closer to your goals, minimizing unnecessary delays and focusing on effective resolution.', 'icon' => 'target']
                    ];
                    $philosophyItems = json_decode($content['about.philosophy.items']->value ?? json_encode($philosophyDefaults), true);

                    // Icon Map
                    $icons = [
                        'users' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M22 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>',
                        'search' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                        'target' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M12 6v6l4 2"></path></svg>', // Using clock/timer for diligence/time, or target below. Let's use Target actually.
                        // Actual Target/TrendingUp
                        'target' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg>',
                        'scale' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m16 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="m2 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="M7 21h10"/><path d="M12 3v18"/><path d="M3 7h2c2 0 5-1 7-2 2 1 5 2 7 2h2"/></svg>',
                        'gavel' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m14.5 12.5-8 8a2.119 2.119 0 1 1-3-3l8-8"/><path d="m16 16 6-6"/><path d="m8 8 6-6"/><path d="m9 7 8 8"/><path d="m21 11-8-8"/></svg>',
                        'briefcase' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="14" x="2" y="7" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>',
                        'shield' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/></svg>',
                        'lightbulb' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 14c.2-1 .7-1.7 1.5-2.5 1-1 1.5-2 1.5-3.5a6 6 0 0 0-11.43-1.428C5.99 7.382 6 7.691 6 8a4.844 4.844 0 0 0 .733 2.665C7.262 11.536 7.79 12.188 8 13c.2.828.2 1.83 0 3v0a2 2 0 0 0 1.084 2.824c.761.274 1.59.436 2.458.436h.917c.868 0 1.697-.162 2.458-.436A2 2 0 0 0 16 16v0c-.2-1.17-.2-2.172 0-3Z"/><path d="M12 21h0"/></svg>'
                    ];
                @endphp
                @foreach($philosophyItems as $item)
                    <div class="bg-white dark:bg-slate-900 p-8 rounded-xl shadow-soft hover:shadow-lg transition-all fade-up">
                        <div
                            class="w-12 h-12 bg-blue-50 dark:bg-slate-800 flex items-center justify-center text-blue-600 dark:text-blue-400 rounded-lg mb-6">
                            @if(isset($icons[$item['icon']]))
                                {!! $icons[$item['icon']] !!}
                            @else
                                {!! $item['icon'] !!} <!-- Fallback for legacy SVG strings -->
                            @endif
                        </div>
                        <h3 class="font-serif font-bold text-xl text-slate-900 dark:text-white mb-4">{{ $item['title'] }}</h3>
                        <p class="font-serif text-slate-600 dark:text-slate-400 text-base sm:text-lg leading-relaxed">
                            {{ $item['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Professional Highlights Section -->
    <section class="py-16 sm:py-20 md:py-24 bg-white dark:bg-slate-900 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="fade-up">
                    <h2 class="font-serif font-bold text-3xl sm:text-4xl text-slate-900 dark:text-white mb-8">
                        {{ $content['about.highlights.title']->value ?? 'Professional Highlights' }}
                    </h2>
                    <p class="font-serif text-base sm:text-lg text-slate-600 dark:text-slate-400 mb-8 leading-relaxed">
                        {{ $content['about.highlights.desc']->value ?? "Throughout my years of practice, I have consistently delivered results across a broad range of legal fields. My dedication to the law and my clients is reflected in the milestones I've achieved." }}
                    </p>
                    <div class="space-y-4">
                        @php
                            $highlightsDefaults = ['Over 50+ successful litigation outcomes', 'Expertise in Corporate & Commercial Arbitration', 'Dedicated Pro-Bono legal service contributor'];
                            $highlightsItems = json_decode($content['about.highlights.items']->value ?? json_encode($highlightsDefaults), true);
                        @endphp
                        @foreach($highlightsItems as $item)
                            <div class="flex items-center gap-4">
                                <div class="w-2 h-2 bg-blue-600 rounded-full"></div>
                                <span
                                    class="font-serif text-lg text-slate-700 dark:text-slate-300 font-medium">{{ $item }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4 fade-up" style="transition-delay: 200ms;">
                    @php
                        $statsDefaults = [
                            ['number' => '4+', 'label' => 'Years Practice'],
                            ['number' => '100%', 'label' => 'Dedication'],
                            ['number' => 'High', 'label' => 'Court Advocate'],
                            ['number' => '24/7', 'label' => 'Reliability']
                        ];
                        $statsItems = json_decode($content['about.stats.items']->value ?? json_encode($statsDefaults), true);
                    @endphp
                    @foreach($statsItems as $stat)
                        <div class="bg-[#F0F7FF] dark:bg-slate-800 p-8 rounded-2xl text-center">
                            <div class="text-4xl font-serif text-blue-700 dark:text-blue-400 mb-2">{{ $stat['number'] }}</div>
                            <div class="text-xs font-bold uppercase tracking-widest text-slate-500">{{ $stat['label'] }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-16 sm:py-20 md:py-24 bg-[#F5F7FA] dark:bg-slate-800 transition-colors duration-300">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center fade-up">
            <h2 class="font-serif font-bold text-2xl sm:text-3xl md:text-4xl text-slate-900 dark:text-white mb-8 transition-colors">
                {{ $content['about.cta.title']->value ?? 'Ready to Discuss Your Case?' }}
            </h2>
            <p class="font-serif text-slate-600 dark:text-slate-400 mb-8 sm:mb-10 text-base sm:text-lg transition-colors">
                {{ $content['about.cta.text']->value ?? 'Schedule a consultation today and let me provide the legal guidance you need.' }}
            </p>
            @php
                $bookingUrl = $content['general.booking_url']->value ?? 'https://calendly.com/aderofrank401/30min';
            @endphp
            <a href="{{ $bookingUrl }}" target="_blank" rel="noopener noreferrer"
                class="inline-block px-8 py-4 bg-slate-900 text-white dark:bg-white dark:text-slate-900 font-bold tracking-widest uppercase rounded-lg hover:bg-slate-800 dark:hover:bg-slate-200 transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-1">
                Book Consultation
            </a>
        </div>
    </section>
@endsection