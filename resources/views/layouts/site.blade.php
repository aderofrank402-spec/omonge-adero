@php use App\Models\SiteContent; @endphp
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-EWBMLN6B1P"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-EWBMLN6B1P');
    </script>

    <!-- Favicon -->
    <link rel="icon" type="image/jpeg" href="{{ asset('assets/images/aderologo.jpeg') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/aderologo.jpeg') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/aderologo.jpeg') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/aderologo.jpeg') }}">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">
    @php
        $routeName = Route::currentRouteName();
        $seoKeyMap = [
            'home' => 'home',
            'about' => 'about',
            'contact' => 'contact',
            'blogs.index' => 'blogs',
            'insights.index' => 'insights'
        ];
        $seoKeyPrefix = $seoKeyMap[$routeName] ?? null;

        $dbTitle = null;
        $dbDesc = null;

        if (isset($content) && is_object($content)) {
            $dbTitle = $seoKeyPrefix ? ($content->get("seo.{$seoKeyPrefix}.title")?->value ?? null) : null;
            $dbDesc = $seoKeyPrefix ? ($content->get("seo.{$seoKeyPrefix}.desc")?->value ?? null) : null;
        }
    @endphp
    <title>@yield('title', $dbTitle ?? 'Omonge Adero | Advocate of the High Court Kenya')
    </title>
    <meta name="description"
        content="@yield('description', $dbDesc ?? 'Leading Lawyer in Nairobi, Kenya. Omonge Adero is an Advocate of the High Court specializing in Corporate Law, Family Law, Civil Litigation, and Property Law. Expert legal representation in Nairobi, Westlands, and across Kenya.')">
    <meta name="keywords"
        content="Lawyer in Kenya, Lawyers in Nairobi, Advocate of the High Court Kenya, Best Lawyers in Kenya, Law Firms in Nairobi, Legal Services Kenya, Corporate Lawyers Nairobi, Civil Litigation Advocates, Family Lawyers Kenya, Employment Law Kenya, Property Lawyers Nairobi, Commercial Law Kenya, Dispute Resolution Kenya, Legal Experts Nairobi, Attorneys in Kenya, Brian Adero, Omonge Adero, Legal Consultancy Kenya, High Court Advocate Nairobi, Westlands Lawyers, Upper Hill Advocates, CBD Nairobi Lawyers, Kilimani Law Firms, Karen Advocates, Hurlingham Lawyers, Mombasa Advocates, Nakuru Lawyers, Kisumu Legal Services, Eldoret Advocates, Thika Lawyers, Divorce Lawyers Nairobi, Child Custody Advocate Kenya, Adoption Lawyers Kenya, Matrimonial Property Lawyer, Separation Agreements Kenya, Alimony and Child Support Lawyer, Land Conveyancing Kenya, Title Deed Transfer Nairobi, Land Disputes Lawyer, Lease Agreements Advocate, Tenant Dispute Lawyer, Real Estate Lawyers Kenya, Company Registration Kenya, Business Startups Lawyer, NGO Registration Kenya, Contract Drafting Lawyer, Mergers and Acquisitions Kenya, Intellectual Property Lawyer Kenya, Trademark Registration Nairobi, Patent Lawyer Kenya, Debt Collection Advocates, Defamation Lawyer Kenya, Medical Negligence Lawyer Nairobi, Personal Injury Advocates, Insurance Claims Lawyer, Breach of Contract Advocate, Unfair Dismissal Lawyer, Redundancy Advice Kenya, Work Injury Benefits Advocate, Employment Contracts Lawyer, Labor Laws Kenya, Disciplinary Hearing Advocate, Wills and Probate Lawyer, Succession Lawyers Kenya, Letters of Administration Kenya, Inheritance Disputes Advocate, Estate Planning Lawyer, Tax Law Kenya, KRA Dispute Lawyer, Banking and Finance Lawyer, Fintech Lawyers Kenya, Legal Audit Services, Corporate Governance Experts, Policy Drafting Kenya, Constitutional Law Advocate, Human Rights Lawyer Kenya, Criminal Defense Nairobi, Bail Application Lawyer, Traffic Offence Advocate, Fraud Litigation Lawyer, Arbitration Experts Kenya, Mediation Services Nairobi, Commissioner for Oaths Kenya, Notary Public Nairobi, Best Advocate in Kenya 2026, Top Rated Lawyers Nairobi, Affordable Legal Services Kenya, Trusted Legal Counsel Nairobi, Experienced Advocate High Court">

    <!-- OpenGraph / Social Meta -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title"
        content="{{ SiteContent::getValue('seo.og.title', 'Brian Adero | Lawyer in Nairobi, Kenya | Advocate of the High Court') }}">
    <meta property="og:description"
        content="{{ SiteContent::getValue('seo.og.description', 'Leading Lawyer in Nairobi, Kenya. Expert legal counsel for businesses and individuals.') }}">
    <meta property="og:image" content="{{ asset('assets/images/og-image.webp') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title"
        content="{{ SiteContent::getValue('seo.og.title', 'Brian Adero | Lawyer in Nairobi, Kenya | Advocate of the High Court') }}">
    <meta property="twitter:description"
        content="{{ SiteContent::getValue('seo.og.description', 'Leading Lawyer in Nairobi, Kenya. Expert legal counsel for businesses and individuals.') }}">
    <meta property="twitter:image" content="{{ asset('assets/images/og-image.webp') }}">

    <!-- Structured Data (JSON-LD) -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "LegalService",
      "name": "{{ SiteContent::getValue('seo.schema.name', 'Brian Adero Advocates') }}",
      "description": "{{ SiteContent::getValue('seo.og.description', 'Leading Lawyer in Nairobi, Kenya offering expert legal services.') }}",
      "url": "https://omongeadero.com",
      "telephone": "{{ SiteContent::getValue('contact.phone', '+254 721 485 244') }}",
      "address": {
        "@@type": "PostalAddress",
        "streetAddress": "{{ SiteContent::getValue('contact.location', 'Nairobi, Kenya') }}",
        "addressLocality": "Nairobi",
        "addressCountry": "KE"
      },
      "areaServed": ["Nairobi", "Kenya", "Westlands", "Upper Hill", "Kilimani", "Mombasa", "Kisumu", "Nakuru"],
      "image": "{{ asset('assets/images/og-image.webp') }}",
      "priceRange": "$$",
      "knowsAbout": [
        "Lawyer in Nairobi",
        "Lawyer in Kenya",
        "Advocate of the High Court",
        "Corporate Law Kenya",
        "Civil Litigation",
        "Family Law Kenya",
        "Divorce Lawyer Nairobi",
        "Commercial Law",
        "Employment Law Kenya",
        "Property Law Kenya",
        "Land Conveyancing",
        "Legal Consultancy",
        "Dispute Resolution",
        "Startups Legal Counsel",
        "Constitutional Law",
        "Criminal Defense Nairobi",
        "Wills and Probate",
        "Succession Law",
        "Banking and Finance Law",
        "Tax Law",
        "Intellectual Property",
        "Debt Collection",
        "Commissioner for Oaths",
        "Notary Public"
      ]
    }
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;1,400&display=swap"
        rel="stylesheet">

    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <script>
        if (localStorage.theme === 'dark') {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }

        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Manrope', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    },
                    colors: {
                        lavender: { 50: '#F5F7FA', 100: '#E4E9F2', 200: '#BCCCDC' },
                        navy: { 800: '#1F2937', 900: '#111827' }
                    }
                }
            }
        }
    </script>
</head>

<body class="antialiased text-slate-800 dark:bg-slate-900 dark:text-slate-100 transition-colors duration-300">
    <!-- Sticky Navigation -->
    <nav class="fixed top-0 w-full z-50 bg-[#F5F7FA]/90 dark:bg-slate-900/90 backdrop-blur-md border-b border-gray-200 dark:border-slate-800 transition-all duration-300"
        id="navbar">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <img src="{{ asset(SiteContent::getValue('branding.logo_main', 'assets/images/aderologo.jpeg')) }}"
                    alt="Logo" class="w-14 h-14 object-cover rounded-md">
                <div class="flex flex-col">
                    <span
                        class="font-serif text-lg font-bold leading-none text-slate-900">{{ SiteContent::getValue('site.name', 'Brian Adero') }}</span>
                    <span class="text-[10px] uppercase tracking-widest text-slate-500">Advocate</span>
                </div>
            </a>

            <!-- Desktop Menu -->
            <div
                class="hidden lg:flex items-center gap-10 text-xs font-bold tracking-widest uppercase text-slate-500 dark:text-slate-400">
                <a href="{{ route('home') }}"
                    class="hover:text-slate-900 dark:hover:text-white transition-colors">Home</a>
                <a href="{{ route('about') }}"
                    class="hover:text-slate-900 dark:hover:text-white transition-colors">About</a>
                <a href="{{ route('blogs.index') }}"
                    class="hover:text-slate-900 dark:hover:text-white transition-colors">Blogs</a>
                <a href="{{ route('insights.index') }}"
                    class="hover:text-slate-900 dark:hover:text-white transition-colors">Insights</a>
                <a href="{{ route('contact') }}"
                    class="hover:text-slate-900 dark:hover:text-white transition-colors">Contact</a>

                <!-- Dark Mode Toggle -->
                <button onclick="toggleTheme()"
                    class="p-2 text-slate-500 hover:text-slate-900 transition-colors dark:text-slate-400 dark:hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden dark:block" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 dark:hidden" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                </button>

                @php
                    $bookingUrl = SiteContent::getValue('general.booking_url', 'https://calendly.com/aderofrank401/30min');
                @endphp
                <a href="{{ $bookingUrl }}" target="_blank" rel="noopener noreferrer"
                    class="px-5 py-2.5 bg-slate-900 dark:bg-white dark:text-slate-900 text-white rounded-full hover:bg-slate-800 dark:hover:bg-slate-200 transition-colors shadow-lg shadow-slate-900/20">
                    Book Consultation
                </a>
            </div>

            <!-- Mobile Controls -->
            <div class="lg:hidden flex items-center gap-4">
                <!-- Mobile Enable/Disable Dark Mode -->
                <button onclick="toggleTheme()"
                    class="p-2 text-slate-500 hover:text-slate-900 transition-colors dark:text-slate-400 dark:hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hidden dark:block" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 dark:hidden" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                </button>

                <!-- Mobile Menu Button -->
                <button id="mobileMenuBtn" class="p-2 text-slate-900 dark:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    @yield('content')
    </div>

    <!-- Mobile Menu Backdrop -->
    <div id="menuBackdrop"
        class="fixed inset-0 z-[55] bg-slate-900/50 backdrop-blur-sm hidden lg:hidden transition-opacity opacity-0"
        aria-hidden="true"></div>

    <!-- Mobile Menu Drawer -->
    <div id="mobileMenu"
        class="fixed inset-y-0 right-0 z-[60] w-64 bg-white dark:bg-slate-900 shadow-2xl transform translate-x-full transition-transform duration-300 lg:hidden flex flex-col pt-20 px-6 gap-6">
        <button id="closeMenuBtn"
            class="absolute top-6 right-6 p-2 text-slate-900 dark:text-white hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>

        <nav class="flex flex-col gap-4">
            <a href="{{ route('home') }}"
                class="mobile-link text-lg font-serif font-bold text-slate-900 dark:text-white border-b border-slate-100 dark:border-slate-800 pb-2">Home</a>
            <a href="{{ route('about') }}"
                class="mobile-link text-lg font-serif font-bold text-slate-900 dark:text-white border-b border-slate-100 dark:border-slate-800 pb-2">About</a>
            <a href="{{ route('blogs.index') }}"
                class="mobile-link text-lg font-serif font-bold text-slate-900 dark:text-white border-b border-slate-100 dark:border-slate-800 pb-2">Blogs</a>
            <a href="{{ route('insights.index') }}"
                class="mobile-link text-lg font-serif font-bold text-slate-900 dark:text-white border-b border-slate-100 dark:border-slate-800 pb-2">Insights</a>
            <a href="{{ route('contact') }}"
                class="mobile-link text-lg font-serif font-bold text-slate-900 dark:text-white border-b border-slate-100 dark:border-slate-800 pb-2">Contact</a>

            @php
                $mobileBookingUrl = SiteContent::getValue('general.booking_url');
            @endphp
            @if(!empty($mobileBookingUrl))
                <a href="{{ $mobileBookingUrl }}" target="_blank"
                    class="mobile-link text-sm font-bold uppercase tracking-widest text-center text-white bg-slate-900 dark:bg-white dark:text-slate-900 py-3 rounded-full mt-4 hover:shadow-lg transition-all">
                    Book Consultation
                </a>
            @endif
        </nav>
    </div>

    <!-- Footer -->
    <footer class="bg-slate-900 border-t border-slate-800 py-12 md:py-20 text-slate-400">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-12">
            <!-- Brand Column -->
            <div class="col-span-1">
                <img src="/assets/images/aderologo.jpeg" alt="Logo" class="w-20 h-20 object-contain rounded-md mb-6">
                <p class="text-sm leading-relaxed mb-6">
                    Advocate of the High Court. Dedicated to justice, integrity, and client success.
                </p>
                <div class="flex gap-4 mt-6">
                    @php
                        // Helper to get clean URL or default
                        $linkedin = SiteContent::getValue('social.linkedin');
                        if (empty($linkedin) || $linkedin === '#') {
                            $linkedin = 'https://ke.linkedin.com/in/omonge-adero-627739142';
                        }

                        $facebook = SiteContent::getValue('social.facebook');
                        if (empty($facebook) || $facebook === '#') {
                            $facebook = 'https://web.facebook.com/brian.adero.1/?_rdc=1&_rdr#';
                        }

                        $socialMedia = [
                            [
                                'platform' => 'LinkedIn',
                                'url' => $linkedin,
                                'icon' => 'linkedin'
                            ],
                            [
                                'platform' => 'Facebook',
                                'url' => $facebook,
                                'icon' => 'facebook'
                            ]
                        ];
                    @endphp

                    @foreach($socialMedia as $social)
                        @if(!empty($social['url']))
                            <a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer"
                                class="h-10 w-10 border border-slate-700 rounded-full flex items-center justify-center hover:bg-white hover:text-slate-900 transition-colors">
                                <span class="sr-only">{{ $social['platform'] ?? 'Social Media' }}</span>
                                @if(strtolower($social['icon'] ?? '') === 'twitter' || strtolower($social['platform'] ?? '') === 'twitter')
                                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path
                                            d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                                    </svg>
                                @elseif(strtolower($social['icon'] ?? '') === 'linkedin' || strtolower($social['platform'] ?? '') === 'linkedin')
                                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path
                                            d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                                    </svg>
                                @elseif(strtolower($social['icon'] ?? '') === 'facebook' || strtolower($social['platform'] ?? '') === 'facebook')
                                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                            clip-rule="evenodd" />
                                    </svg>
                                @else
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                    </svg>
                                @endif
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>

            <!-- Menu Column -->
            <div>
                <h4 class="font-bold text-white mb-6 uppercase tracking-widest text-xs">Menu</h4>
                <ul class="space-y-3 text-sm">
                    <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-white transition-colors">About</a></li>
                    <li><a href="{{ route('blogs.index') }}" class="hover:text-white transition-colors">Blogs</a></li>
                    <li><a href="{{ route('insights.index') }}" class="hover:text-white transition-colors">Insights</a>
                    </li>
                    <li><a href="{{ route('contact') }}" class="hover:text-white transition-colors">Contact</a></li>
                </ul>
            </div>

            <!-- Contact Column -->
            <div>
                <h4 class="font-bold text-white mb-6 uppercase tracking-widest text-xs">Contact</h4>
                <ul class="space-y-4 text-sm">
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-slate-500 shrink-0" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span>{{ $content['contact.location']->value ?? 'Nairobi, Kenya' }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-slate-500 shrink-0" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                        <a href="mailto:{{ SiteContent::getValue('contact.email', 'info@omongeadero.com') }}"
                            class="hover:text-white transition-colors">{{ SiteContent::getValue('contact.email',
                            'info@omongeadero.com') }}</a>
                    </li>
                </ul>
            </div>

            <!-- Newsletter Column -->
            <div>
                <h4 class="font-bold text-white mb-6 uppercase tracking-widest text-xs">Stay Informed</h4>
                <p class="text-xs mb-4 text-slate-500">Subscribe for legal updates and news.</p>

                @if(session('newsletter_success'))
                    <div class="mb-4 p-3 bg-green-900/50 border border-green-800 text-green-200 text-xs rounded">
                        {{ session('newsletter_success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-4 p-3 bg-red-900/50 border border-red-800 text-red-200 text-xs rounded">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('subscribe') }}" method="POST" class="space-y-2">
                    @csrf
                    <input type="email" name="email" placeholder="Email Address" required
                        class="w-full bg-slate-800 border-none text-white text-sm px-4 py-3 rounded focus:ring-1 focus:ring-white outline-none placeholder-slate-500">
                    <button type="submit"
                        class="w-full bg-white text-slate-900 font-bold text-xs uppercase tracking-widest py-3 rounded hover:bg-slate-200 transition-colors">Subscribe</button>
                </form>
            </div>
        </div>
        <div
            class="max-w-7xl mx-auto px-6 mt-16 pt-8 border-t border-slate-800 flex flex-col md:flex-row items-center justify-between text-sm text-slate-600">
            <p>&copy; 2026 Brian Adero. All Rights Reserved.</p>
            <div class="flex gap-6 mt-4 md:mt-0">
                <a href="{{ route('privacy') }}" class="hover:text-white transition-colors">Privacy Policy</a>
                <a href="{{ route('terms') }}" class="hover:text-white transition-colors">Terms of Service</a>
            </div>
        </div>
    </footer>
    <script>
        function toggleTheme() {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.theme = 'light';
            } else {
                document.documentElement.classList.add('dark');
                localStorage.theme = 'dark';
            }
        }

        // Mobile Menu Logic
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        const menuBackdrop = document.getElementById('menuBackdrop');
        const closeMenuBtn = document.getElementById('closeMenuBtn');
        const mobileLinks = document.querySelectorAll('.mobile-link');

        function toggleMenu() {
            const isClosed = mobileMenu.classList.contains('translate-x-full');

            if (isClosed) {
                // Open Menu
                mobileMenu.classList.remove('translate-x-full');
                menuBackdrop.classList.remove('hidden');
                // Small timeout to allow display:block to apply before opacity transition
                setTimeout(() => {
                    menuBackdrop.classList.remove('opacity-0');
                }, 10);
                document.body.classList.add('overflow-hidden');
            } else {
                // Close Menu
                mobileMenu.classList.add('translate-x-full');
                menuBackdrop.classList.add('opacity-0');
                setTimeout(() => {
                    menuBackdrop.classList.add('hidden');
                }, 300);
                document.body.classList.remove('overflow-hidden');
            }
        }

        if (mobileMenuBtn) mobileMenuBtn.addEventListener('click', toggleMenu);
        if (closeMenuBtn) closeMenuBtn.addEventListener('click', toggleMenu);
        if (menuBackdrop) menuBackdrop.addEventListener('click', toggleMenu);

        mobileLinks.forEach(link => {
            link.addEventListener('click', toggleMenu);
        });

        // Sticky Navbar Logic
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (navbar && window.scrollY > 20) {
                navbar.classList.add('shadow-md');
            } else if (navbar) {
                navbar.classList.remove('shadow-md');
            }
        });
    </script>

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/254721485244?text=Hello%20Brian%20Adero,%20I%20would%20like%20to%20inquire%20about%20your%20legal%20services."
        target="_blank" rel="noopener noreferrer"
        class="fixed bottom-6 left-6 z-50 bg-[#25D366] text-white p-4 rounded-full shadow-2xl hover:bg-[#20BA5A] transition-all duration-300 hover:scale-110 group">
        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
            <path
                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
        </svg>
    </a>
    <!-- Calendly badge widget begin -->
    <link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
    <script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript" async></script>
    <script type="text/javascript">
        window.onload = function () {
            Calendly.initBadgeWidget({
                url: '{{ $bookingUrl ?? "https://calendly.com/aderofrank401/30min" }}',
                text: 'Schedule time with me',
                color: '#1e293b',
                textColor: '#ffffff',
                branding: true
            });
        }
    </script>
    <!-- Calendly badge widget end -->
</body>

</html>