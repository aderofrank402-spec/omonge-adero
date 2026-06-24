@php use App\Models\SiteContent; @endphp@extends('layouts.admin')@section('page-title', 'Site Content Manager')@section('page-subtitle', 'Manage all website text, images, and configuration.')

@section('content')
    <div class="max-w-7xl mx-auto pb-20">
        <form action="{{ route('admin.content.update') }}" method="POST" enctype="multipart/form-data" id="contentForm"
            novalidate>
            @csrf
            @method('PUT')
            <input type="hidden" name="page" value="all">

            @if($errors->any())
                <div class="mb-6 bg-red-50 border border-red-200 text-red-800 px-6 py-4 rounded-lg">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Tab Navigation -->
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 mb-8 overflow-x-auto">
                <div class="flex items-center px-4 py-2 border-b border-slate-100 bg-slate-50/50 min-w-max">
                    <button type="button" onclick="switchTab('global')"
                        class="tab-btn active px-6 py-4 text-sm font-bold uppercase tracking-wider border-b-2 border-slate-900 text-slate-900"
                        data-tab="global">Global & SEO</button>
                    <button type="button" onclick="switchTab('home')"
                        class="tab-btn px-6 py-4 text-sm font-bold uppercase tracking-wider border-b-2 border-transparent text-slate-400 hover:text-slate-600"
                        data-tab="home">Home Page</button>
                    <button type="button" onclick="switchTab('about')"
                        class="tab-btn px-6 py-4 text-sm font-bold uppercase tracking-wider border-b-2 border-transparent text-slate-400 hover:text-slate-600"
                        data-tab="about">About Page</button>
                    <!-- Resume merged into Home -->
                    <button type="button" onclick="switchTab('contact')"
                        class="tab-btn px-6 py-4 text-sm font-bold uppercase tracking-wider border-b-2 border-transparent text-slate-400 hover:text-slate-600"
                        data-tab="contact">Contact & Social</button>
                    <button type="button" onclick="switchTab('legal')"
                        class="tab-btn px-6 py-4 text-sm font-bold uppercase tracking-wider border-b-2 border-transparent text-slate-400 hover:text-slate-600"
                        data-tab="legal">Legal Pages</button>
                </div>
            </div>

            <!-- Sticky Publish Button -->
            <div class="fixed bottom-6 right-6 z-40">
                <button type="submit" form="contentForm"
                    onclick="this.innerHTML='Saving...'; this.classList.add('opacity-75', 'cursor-not-allowed');"
                    class="bg-slate-900 text-white px-8 py-4 rounded-full font-bold text-sm tracking-wide shadow-2xl hover:scale-105 active:scale-95 transition-all flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Save All Changes
                </button>
            </div>

            <!-- GLOBAL TAB -->
            <div id="tab-global" class="tab-content space-y-8">
                <div class="p-8 bg-white rounded-2xl border border-slate-100 shadow-sm">
                    <h3 class="text-lg font-serif font-bold text-slate-900 mb-6">Global Site Identity</h3>
                    <div class="grid gap-6">
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Site Name</label>
                            <input type="text" name="content[site.name]"
                                value="{{ SiteContent::getValue('site.name', 'Brian Adero') }}"
                                class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl">
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Site Description
                                (SEO)</label>
                            <textarea name="content[site.description]" rows="2"
                                class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl">{{ SiteContent::getValue('site.description', 'Advocate of the High Court of Kenya') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Booking URL (Calendly,
                                etc.)</label>
                            <input type="url" name="content[general.booking_url]"
                                value="{{ SiteContent::getValue('general.booking_url', 'https://calendly.com/aderofrank401/30min') }}"
                                class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl">
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Footer Copyright
                                Text</label>
                            <input type="text" name="content[footer.copyright]"
                                value="{{ SiteContent::getValue('footer.copyright', '© 2026 Brian Adero. All rights reserved.') }}"
                                class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl">
                        </div>
                    </div>
                </div>

                <div class="p-8 bg-white rounded-2xl border border-slate-100 shadow-sm">
                    <h3 class="text-lg font-serif font-bold text-slate-900 mb-6">Branding & Logos</h3>
                    <div class="grid md:grid-cols-2 gap-8">
                        <!-- Favicon -->
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Favicon / Small
                                Logo</label>
                            <div class="flex items-center gap-4">
                                <!-- Note: Keys matched to what might be used in layout, assuming layout uses 'favicon' or sim. Defaulting to new key structure. -->
                                <div
                                    class="w-16 h-16 bg-slate-100 rounded-lg flex items-center justify-center overflow-hidden border border-slate-200">
                                    <img src="{{ asset(SiteContent::getValue('branding.favicon', 'assets/images/aderologo.jpeg')) }}"
                                        class="w-full h-full object-cover" id="preview-favicon">
                                </div>
                                <input type="file" name="images[branding.favicon]" class="text-sm text-slate-500"
                                    onchange="previewImage(this, 'preview-favicon')">
                            </div>
                        </div>
                        <!-- Main Logo -->
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Main Logo (Header)</label>
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-16 h-16 bg-slate-100 rounded-lg flex items-center justify-center overflow-hidden border border-slate-200">
                                    <img src="{{ asset(SiteContent::getValue('branding.logo_main', 'assets/images/aderologo.jpeg')) }}"
                                        class="w-full h-full object-cover" id="preview-logo">
                                </div>
                                <input type="file" name="images[branding.logo_main]" class="text-sm text-slate-500"
                                    onchange="previewImage(this, 'preview-logo')">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- HOME TAB -->
            <div id="tab-home" class="tab-content hidden space-y-8">
                <!-- Hero Section -->
                <div class="p-8 bg-white rounded-2xl border border-slate-100 shadow-sm">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-serif font-bold text-slate-900">Hero Section</h3>
                        <span class="px-2 py-1 bg-indigo-50 text-indigo-700 rounded text-xs font-bold uppercase">Above The
                            Fold</span>
                    </div>
                    <div class="grid md:grid-cols-2 gap-8">
                        <div class="space-y-4">
                            <div>
                                <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Title Line 1</label>
                                <input type="text" name="content[hero.title.line1]"
                                    value="{{ SiteContent::getValue('hero.title.line1', 'Justice') }}"
                                    class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl text-lg font-bold">
                            </div>
                            <div>
                                <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Title Line 2
                                    (Italic)</label>
                                <input type="text" name="content[hero.title.line2]"
                                    value="{{ SiteContent::getValue('hero.title.line2', 'Requires') }}"
                                    class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl text-lg italic font-serif">
                            </div>
                            <div>
                                <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Title Line 3</label>
                                <input type="text" name="content[hero.title.line3]"
                                    value="{{ SiteContent::getValue('hero.title.line3', 'Clarity.') }}"
                                    class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl text-lg font-bold">
                            </div>
                            <div>
                                <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Subtext / Intro</label>
                                <textarea name="content[hero.description]" rows="4"
                                    class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl">{{ SiteContent::getValue('hero.description', 'I provide strategic counsel...') }}</textarea>
                            </div>
                            <div>
                                <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Floating Quote</label>
                                <input type="text" name="content[hero.floating.quote]"
                                    value="{{ SiteContent::getValue('hero.floating.quote', 'Excellence is not an act, but a habit.') }}"
                                    class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Hero Portrait</label>
                            <!-- Using explicit key 'home_hero_image' which aligns with controller fallback if needed, but preferable key is structured -->
                            <div class="w-full h-80 bg-slate-100 rounded-xl overflow-hidden relative group mb-4">
                                <img src="{{ asset(SiteContent::getValue('hero.image', 'assets/images/brian.jpeg')) }}"
                                    class="w-full h-full object-cover" id="preview-hero">
                            </div>
                            <input type="file" name="images[hero.image]" class="block w-full text-sm text-slate-500"
                                onchange="previewImage(this, 'preview-hero')">
                        </div>
                    </div>
                </div>

                <!-- Home About -->
                <div class="p-8 bg-white rounded-2xl border border-slate-100 shadow-sm">
                    <h3 class="text-lg font-serif font-bold text-slate-900 mb-6">About Preview Section</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Section Title</label>
                            <input type="text" name="content[home.about.title]"
                                value="{{ SiteContent::getValue('home.about.title', 'About Brian') }}"
                                class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl">
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Subtitle</label>
                            <input type="text" name="content[home.about.subtitle]"
                                value="{{ SiteContent::getValue('home.about.subtitle', 'Since 2020') }}"
                                class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl">
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Highlights Quote</label>
                            <textarea name="content[home.about.quote]" rows="2"
                                class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl italic font-serif">{{ SiteContent::getValue('home.about.quote', 'I believe...') }}</textarea>
                        </div>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Paragraph 1</label>
                                <textarea name="content[home.about.p1]" rows="5"
                                    class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl">{{ SiteContent::getValue('home.about.p1', '') }}</textarea>
                            </div>
                            <div>
                                <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Paragraph 2</label>
                                <textarea name="content[home.about.p2]" rows="5"
                                    class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl">{{ SiteContent::getValue('home.about.p2', '') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quote Section -->
                <div class="p-8 bg-white rounded-2xl border border-slate-100 shadow-sm">
                    <h3 class="text-lg font-serif font-bold text-slate-900 mb-6">Dark Quote Section</h3>
                    <textarea name="content[quote.main]" rows="3"
                        class="w-full p-3 bg-slate-900 text-white rounded-xl font-serif text-lg">{{ SiteContent::getValue('quote.main', 'I don\'t just win cases; I secure futures...') }}</textarea>
                </div>

                <!-- 4. Experience Section -->
                <div class="p-8 bg-white rounded-2xl border border-slate-100 shadow-sm">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-serif font-bold text-slate-900">Experience List</h3>
                        <div class="flex items-center gap-2">
                            <span class="px-2 py-1 bg-indigo-50 text-indigo-700 rounded text-xs font-bold uppercase">Section
                                4</span>
                            <button type="button" onclick="addItem('experience')"
                                class="px-3 py-1 bg-slate-900 text-white text-xs rounded hover:bg-slate-700">+ Add
                                Job</button>
                        </div>
                    </div>

                    <div id="experience-container" class="space-y-4">
                        @php
                            $experiences = SiteContent::getValue('home.experience', [
                                ['period' => '2023 - Present', 'title' => 'Senior Associate', 'company' => 'Firm A', 'desc' => '...']
                            ]);
                           @endphp
                        @foreach($experiences as $index => $item)
                            <div class="p-4 bg-slate-50 rounded-lg border border-slate-100 relative group item-row">
                                <button type="button" onclick="this.parentElement.remove()"
                                    class="absolute top-2 right-2 text-red-400 hover:text-red-600 font-bold">&times;</button>
                                <div class="grid md:grid-cols-3 gap-4">
                                    <input type="text" name="content[home.experience][{{$index}}][period]"
                                        value="{{ $item['period'] ?? '' }}" placeholder="Period (e.g. 2023-Present)"
                                        class="p-2 border rounded">
                                    <input type="text" name="content[home.experience][{{$index}}][title]"
                                        value="{{ $item['title'] ?? '' }}" placeholder="Job Title" class="p-2 border rounded">
                                    <input type="text" name="content[home.experience][{{$index}}][company]"
                                        value="{{ $item['company'] ?? '' }}" placeholder="Company" class="p-2 border rounded">
                                    <textarea name="content[home.experience][{{$index}}][desc]" rows="2"
                                        placeholder="Description"
                                        class="md:col-span-3 p-2 border rounded">{{ $item['desc'] ?? '' }}</textarea>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- 5. Education Section -->
                <div class="p-8 bg-white rounded-2xl border border-slate-100 shadow-sm">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-serif font-bold text-slate-900">Education List</h3>
                        <div class="flex items-center gap-2">
                            <span class="px-2 py-1 bg-indigo-50 text-indigo-700 rounded text-xs font-bold uppercase">Section
                                5</span>
                            <button type="button" onclick="addItem('education')"
                                class="px-3 py-1 bg-slate-900 text-white text-xs rounded hover:bg-slate-700">+ Add
                                School</button>
                        </div>
                    </div>

                    <div id="education-container" class="space-y-4">
                        @php
                            $education = SiteContent::getValue('home.education', [
                                ['year' => '2021', 'degree' => 'PG Dip', 'institution' => 'KSL', 'desc' => '...']
                            ]);
                           @endphp
                        @foreach($education as $index => $item)
                            <div class="p-4 bg-slate-50 rounded-lg border border-slate-100 relative group item-row">
                                <button type="button" onclick="this.parentElement.remove()"
                                    class="absolute top-2 right-2 text-red-400 hover:text-red-600 font-bold">&times;</button>
                                <div class="grid md:grid-cols-3 gap-4">
                                    <input type="text" name="content[home.education][{{$index}}][year]"
                                        value="{{ $item['year'] ?? '' }}" placeholder="Year" class="p-2 border rounded">
                                    <input type="text" name="content[home.education][{{$index}}][degree]"
                                        value="{{ $item['degree'] ?? '' }}" placeholder="Degree" class="p-2 border rounded">
                                    <input type="text" name="content[home.education][{{$index}}][institution]"
                                        value="{{ $item['institution'] ?? '' }}" placeholder="Institution"
                                        class="p-2 border rounded">
                                    <textarea name="content[home.education][{{$index}}][desc]" rows="2"
                                        placeholder="Description"
                                        class="md:col-span-3 p-2 border rounded">{{ $item['desc'] ?? '' }}</textarea>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- 6. Practice Areas Repeater (Renamed comment for clarity) -->
                <div class="p-8 bg-white rounded-2xl border border-slate-100 shadow-sm">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-serif font-bold text-slate-900">Practice Areas</h3>
                        <button type="button" onclick="addItem('practice-areas')"
                            class="px-3 py-1 bg-slate-900 text-white text-xs rounded hover:bg-slate-700">+ Add Area</button>
                    </div>
                    <div id="practice-areas-container" class="grid md:grid-cols-2 gap-4">
                        @php
                            $practiceAreas = SiteContent::getValue('home.practice_areas', []);
                        @endphp
                        @foreach($practiceAreas as $index => $item)
                            <div class="p-4 bg-slate-50 rounded-lg border border-slate-100 relative group item-row">
                                <button type="button" onclick="this.parentElement.remove()"
                                    class="absolute top-2 right-2 text-red-400 hover:text-red-600 font-bold">&times;</button>
                                <div class="grid gap-2">
                                    <input type="text" name="content[home.practice_areas][{{$index}}][title]"
                                        value="{{ $item['title'] ?? '' }}" placeholder="Area Title"
                                        class="p-2 border rounded font-bold">
                                    <select name="content[home.practice_areas][{{$index}}][icon]" class="p-2 border rounded">
                                        <option value="Building" {{ ($item['icon'] ?? '') == 'Building' ? 'selected' : '' }}>
                                            Building (Corporate)</option>
                                        <option value="Gavel" {{ ($item['icon'] ?? '') == 'Gavel' ? 'selected' : '' }}>Gavel
                                            (Litigation)</option>
                                        <option value="Users" {{ ($item['icon'] ?? '') == 'Users' ? 'selected' : '' }}>Users
                                            (Family)</option>
                                        <option value="Scale" {{ ($item['icon'] ?? '') == 'Scale' ? 'selected' : '' }}>Scale
                                            (Justice)</option>
                                        <option value="Briefcase" {{ ($item['icon'] ?? '') == 'Briefcase' ? 'selected' : '' }}>
                                            Briefcase</option>
                                        <option value="FileText" {{ ($item['icon'] ?? '') == 'FileText' ? 'selected' : '' }}>
                                            File/Contract</option>
                                        <option value="Shield" {{ ($item['icon'] ?? '') == 'Shield' ? 'selected' : '' }}>Shield
                                        </option>
                                    </select>
                                    <textarea name="content[home.practice_areas][{{$index}}][desc]" rows="2"
                                        placeholder="Description"
                                        class="p-2 border rounded text-sm">{{ $item['desc'] ?? '' }}</textarea>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- 7. Latest Updates Section (Headings Only) -->
                <div class="p-8 bg-white rounded-2xl border border-slate-100 shadow-sm">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-serif font-bold text-slate-900">Latest Updates Headers</h3>
                        <span class="px-2 py-1 bg-indigo-50 text-indigo-700 rounded text-xs font-bold uppercase">Section
                            7</span>
                    </div>
                    <p class="text-xs text-slate-400 mb-4">The actual blog posts are managed in the "Blog/Insights" section.
                        These are just the section titles.</p>
                    <div class="grid gap-4">
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Section Title</label>
                            <input type="text" name="content[home.updates.title]"
                                value="{{ SiteContent::getValue('home.updates.title', 'Latest Updates') }}"
                                class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl">
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Subtitle</label>
                            <input type="text" name="content[home.updates.subtitle]"
                                value="{{ SiteContent::getValue('home.updates.subtitle', 'Insights & Perspectives') }}"
                                class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl">
                        </div>
                    </div>
                </div>

                <!-- 8. Achievements Section -->
                <div class="p-8 bg-white rounded-2xl border border-slate-100 shadow-sm">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-serif font-bold text-slate-900">Achievements (Stats)</h3>
                        <div class="flex items-center gap-2">
                            <span class="px-2 py-1 bg-indigo-50 text-indigo-700 rounded text-xs font-bold uppercase">Section
                                8</span>
                            <button type="button" onclick="addItem('achievements')"
                                class="px-3 py-1 bg-slate-900 text-white text-xs rounded hover:bg-slate-700">+ Add
                                Stat</button>
                        </div>
                    </div>
                    <div class="mb-6 grid gap-4">
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Section Title</label>
                            <input type="text" name="content[home.achievements.title]"
                                value="{{ SiteContent::getValue('home.achievements.title', 'Achievements') }}"
                                class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl">
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Subtitle</label>
                            <input type="text" name="content[home.achievements.subtitle]"
                                value="{{ SiteContent::getValue('home.achievements.subtitle', 'Recognition & Awards') }}"
                                class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl">
                        </div>
                    </div>
                    <div id="achievements-container" class="grid md:grid-cols-2 gap-4">
                        @php
                            $achievements = SiteContent::getValue('home.achievements', []);
                           @endphp
                        @foreach($achievements as $index => $item)
                            <div class="p-4 bg-slate-50 rounded-lg border border-slate-100 relative group item-row">
                                <button type="button" onclick="this.parentElement.remove()"
                                    class="absolute top-2 right-2 text-red-400 hover:text-red-600 font-bold">&times;</button>
                                <div class="grid gap-2">
                                    <input type="text" name="content[home.achievements][{{$index}}][number]"
                                        value="{{ $item['number'] ?? '' }}" placeholder="Number (e.g. 2023-Present)"
                                        class="p-2 border rounded font-bold">
                                    <input type="text" name="content[home.achievements][{{$index}}][title]"
                                        value="{{ $item['title'] ?? '' }}" placeholder="Title" class="p-2 border rounded">
                                    <input type="text" name="content[home.achievements][{{$index}}][desc]"
                                        value="{{ $item['desc'] ?? '' }}" placeholder="Subtitle/Desc"
                                        class="p-2 border rounded text-sm">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- 9. Contact Section Intro -->
                <div class="p-8 bg-white rounded-2xl border border-slate-100 shadow-sm">
                    <h3 class="text-lg font-serif font-bold text-slate-900 mb-6">Contact Section Intro</h3>
                    <div class="flex items-center gap-2 mb-4">
                        <span
                            class="px-2 py-1 bg-indigo-50 text-indigo-700 rounded text-xs font-bold uppercase block">Section
                            9</span>
                    </div>
                    <p class="text-xs text-slate-400 mb-4">This controls the text above the contact form on the home page.
                    </p>
                    <div class="grid gap-4">
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Section Title</label>
                            <input type="text" name="content[home.contact.title]"
                                value="{{ SiteContent::getValue('home.contact.title', 'Get in Touch') }}"
                                class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl">
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Intro Text</label>
                            <textarea name="content[home.contact.text]" rows="3"
                                class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl">{{ SiteContent::getValue('home.contact.text', 'Whether you have a question about a case, need legal advice, or want to book a consultation, I\'m here to help.') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ABOUT TAB -->
            <div id="tab-about" class="tab-content hidden space-y-8">
                <!-- 1. Header Section -->
                <div class="p-8 bg-white rounded-2xl border border-slate-100 shadow-sm">
                    <h3 class="text-lg font-serif font-bold text-slate-900 mb-6">Header Section</h3>
                    <div class="grid gap-6">
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Page Title</label>
                            <input type="text" name="content[about.page.title]"
                                value="{{ SiteContent::getValue('about.page.title', 'About Brian Adero') }}"
                                class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl">
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Subtitle / Intro</label>
                            <textarea name="content[about.page.subtitle]" rows="2"
                                class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl">{{ SiteContent::getValue('about.page.subtitle', 'A steadfast commitment...') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- 2. Main Content Section -->
                <div class="p-8 bg-white rounded-2xl border border-slate-100 shadow-sm">
                    <h3 class="text-lg font-serif font-bold text-slate-900 mb-6">Main Content (Bio)</h3>
                    <div class="grid gap-6">
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Section Title</label>
                            <input type="text" name="content[about.section.title]"
                                value="{{ SiteContent::getValue('about.section.title', 'Dedicated to Your Legal Success') }}"
                                class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl">
                        </div>
                        <div class="grid md:grid-cols-3 gap-6">
                            <div class="md:col-span-2">
                                <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Full Bio (HTML
                                    Allowed)</label>
                                <textarea name="content[about.page.bio]" rows="12"
                                    class="w-full p-4 bg-slate-50 border border-slate-100 rounded-xl font-serif leading-relaxed">{{ SiteContent::getValue('about.page.bio', 'Brian Adero is an Advocate...') }}</textarea>
                            </div>
                            <div>
                                <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Portrait Image
                                    (Vertical)</label>
                                <div class="w-full h-64 bg-slate-100 rounded-xl overflow-hidden relative group mb-4">
                                    <img src="{{ asset(SiteContent::getValue('about.portrait', 'assets/images/about-portrait.jpeg')) }}"
                                        onerror="this.src='{{ asset('assets/images/brian.jpeg') }}'"
                                        class="w-full h-full object-cover" id="preview-about-portrait">
                                </div>
                                <input type="file" name="images[about.portrait]" class="block w-full text-sm text-slate-500"
                                    onchange="previewImage(this, 'preview-about-portrait')">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 3. Core Values -->
                <div class="p-8 bg-white rounded-2xl border border-slate-100 shadow-sm">
                    <h3 class="text-lg font-serif font-bold text-slate-900 mb-6">Core Values</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="p-4 border border-slate-100 rounded-xl">
                            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Value 1 Title</label>
                            <input type="text" name="content[about.value1.title]"
                                value="{{ SiteContent::getValue('about.value1.title', 'Integrity') }}"
                                class="w-full p-2 bg-slate-50 border border-slate-100 rounded">
                            <label class="block text-xs font-bold uppercase text-slate-400 mt-2 mb-2">Value 1 Desc</label>
                            <textarea name="content[about.value1.desc]" rows="2"
                                class="w-full p-2 bg-slate-50 border border-slate-100 rounded">{{ SiteContent::getValue('about.value1.desc', 'Upholding the highest ethical standards...') }}</textarea>
                        </div>
                        <div class="p-4 border border-slate-100 rounded-xl">
                            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Value 2 Title</label>
                            <input type="text" name="content[about.value2.title]"
                                value="{{ SiteContent::getValue('about.value2.title', 'Excellence') }}"
                                class="w-full p-2 bg-slate-50 border border-slate-100 rounded">
                            <label class="block text-xs font-bold uppercase text-slate-400 mt-2 mb-2">Value 2 Desc</label>
                            <textarea name="content[about.value2.desc]" rows="2"
                                class="w-full p-2 bg-slate-50 border border-slate-100 rounded">{{ SiteContent::getValue('about.value2.desc', 'Pursuing superior outcomes...') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- 4. Philosophy & Approach -->
                <div class="p-8 bg-white rounded-2xl border border-slate-100 shadow-sm">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-serif font-bold text-slate-900">Philosophy & Approach</h3>
                        <button type="button" onclick="addItem('philosophy')"
                            class="px-3 py-1 bg-slate-900 text-white text-xs rounded hover:bg-slate-700">+ Add Item</button>
                    </div>
                    <div class="mb-6">
                        <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Section Title</label>
                        <input type="text" name="content[about.philosophy.title]"
                            value="{{ SiteContent::getValue('about.philosophy.title', 'Philosophy & Approach') }}"
                            class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl">
                    </div>

                    <div id="philosophy-container" class="grid md:grid-cols-3 gap-4">
                        @php
                            $philosophyDefaults = [
                                ['title' => 'Client-First Mentality', 'desc' => 'Every legal strategy is tailored...', 'icon' => 'users'],
                            ];
                            $philosophyItems = SiteContent::getValue('about.philosophy.items', $philosophyDefaults);
                            if (is_string($philosophyItems)) {
                                $philosophyItems = json_decode($philosophyItems, true) ?? [];
                            }

                            $adminIcons = [
                                'users' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M22 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>',
                                'search' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                                'target' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg>',
                                'scale' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m16 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="m2 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="M7 21h10"/><path d="M12 3v18"/><path d="M3 7h2c2 0 5-1 7-2 2 1 5 2 7 2h2"/></svg>',
                                'gavel' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m14.5 12.5-8 8a2.119 2.119 0 1 1-3-3l8-8"/><path d="m16 16 6-6"/><path d="m8 8 6-6"/><path d="m9 7 8 8"/><path d="m21 11-8-8"/></svg>',
                                'briefcase' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="14" x="2" y="7" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>',
                                'shield' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/></svg>',
                                'lightbulb' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 14c.2-1 .7-1.7 1.5-2.5 1-1 1.5-2 1.5-3.5a6 6 0 0 0-11.43-1.428C5.99 7.382 6 7.691 6 8a4.844 4.844 0 0 0 .733 2.665C7.262 11.536 7.79 12.188 8 13c.2.828.2 1.83 0 3v0a2 2 0 0 0 1.084 2.824c.761.274 1.59.436 2.458.436h.917c.868 0 1.697-.162 2.458-.436A2 2 0 0 0 16 16v0c-.2-1.17-.2-2.172 0-3Z"/><path d="M12 21h0"/></svg>'
                            ];
                        @endphp
                        @foreach($philosophyItems as $index => $item)
                            <div class="p-4 bg-slate-50 rounded-lg border border-slate-100 relative group item-row">
                                <button type="button" onclick="this.parentElement.remove()"
                                    class="absolute top-2 right-2 text-red-400 hover:text-red-600 font-bold">&times;</button>
                                <div class="grid gap-2">
                                    <label class="text-[10px] font-bold uppercase text-slate-400">Icon</label>

                                    <!-- Fallback for legacy SVG data checks -->
                                    @if(str_starts_with($item['icon'] ?? '', '<svg'))
                                        <div class="text-xs text-amber-600 bg-amber-50 p-2 rounded mb-2">Legacy SVG detected. Select
                                            a new icon below to update.</div>
                                        <input type="hidden" name="content[about.philosophy.items][{{$index}}][icon]"
                                            value="{{ $item['icon'] }}">
                                    @endif

                                    <div class="flex flex-wrap gap-2">
                                        @foreach($adminIcons as $key => $svg)
                                            <label class="cursor-pointer">
                                                <input type="radio" name="content[about.philosophy.items][{{$index}}][icon]"
                                                    value="{{ $key }}" class="peer hidden" {{ ($item['icon'] ?? '') == $key ? 'checked' : '' }}>
                                                <div
                                                    class="p-2 bg-white border border-slate-200 rounded hover:bg-slate-100 peer-checked:bg-slate-900 peer-checked:text-white peer-checked:border-slate-900 transition-colors text-slate-500">
                                                    {!! $svg !!}
                                                </div>
                                            </label>
                                        @endforeach
                                    </div>

                                    <label class="text-[10px] font-bold uppercase text-slate-400">Title</label>
                                    <input type="text" name="content[about.philosophy.items][{{$index}}][title]"
                                        value="{{ $item['title'] ?? '' }}" class="p-2 border rounded font-bold">

                                    <label class="text-[10px] font-bold uppercase text-slate-400">Description</label>
                                    <textarea name="content[about.philosophy.items][{{$index}}][desc]" rows="3"
                                        class="p-2 border rounded text-sm">{{ $item['desc'] ?? '' }}</textarea>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- 5. Professional Highlights -->
                <div class="p-8 bg-white rounded-2xl border border-slate-100 shadow-sm">
                    <h3 class="text-lg font-serif font-bold text-slate-900 mb-6">Professional Highlights</h3>

                    <div class="mb-6 grid gap-4">
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Section Title</label>
                            <input type="text" name="content[about.highlights.title]"
                                value="{{ SiteContent::getValue('about.highlights.title', 'Professional Highlights') }}"
                                class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl">
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Description</label>
                            <textarea name="content[about.highlights.desc]" rows="2"
                                class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl">{{ SiteContent::getValue('about.highlights.desc', 'Throughout my years...') }}</textarea>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-8">
                        <!-- List Items -->
                        <div>
                            <div class="flex justify-between items-center mb-4">
                                <h4 class="font-bold text-sm text-slate-700">Bullet Points</h4>
                                <button type="button" onclick="addItem('highlightItem')"
                                    class="px-2 py-1 bg-slate-200 text-slate-700 text-xs rounded hover:bg-slate-300">+ Add
                                    Point</button>
                            </div>
                            <div id="highlightItem-container" class="space-y-2">
                                @php
                                    $highlightsDefaults = ['Over 50+ successful litigation outcomes', 'Expertise in Corporate & Commercial Arbitration', 'Dedicated Pro-Bono legal service contributor'];
                                    $highlightsItems = SiteContent::getValue('about.highlights.items', $highlightsDefaults);
                                    if (is_string($highlightsItems)) {
                                        $highlightsItems = json_decode($highlightsItems, true) ?? [];
                                    }
                                @endphp
                                @foreach($highlightsItems as $index => $item)
                                    <div class="flex items-center gap-2 item-row">
                                        <input type="text" name="content[about.highlights.items][]" value="{{ $item }}"
                                            class="flex-1 p-2 border rounded text-sm">
                                        <button type="button" onclick="this.parentElement.remove()"
                                            class="text-red-400 hover:text-red-600 font-bold">&times;</button>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Stats Grid -->
                        <div>
                            <div class="flex justify-between items-center mb-4">
                                <h4 class="font-bold text-sm text-slate-700">Stats Grid</h4>
                                <button type="button" onclick="addItem('aboutStat')"
                                    class="px-2 py-1 bg-slate-200 text-slate-700 text-xs rounded hover:bg-slate-300">+ Add
                                    Stat</button>
                            </div>
                            <div id="aboutStat-container" class="space-y-2">
                                @php
                                    $statsDefaults = [
                                        ['number' => '4+', 'label' => 'Years Practice'],
                                        ['number' => '100%', 'label' => 'Dedication']
                                    ];
                                    $statsItems = SiteContent::getValue('about.stats.items', $statsDefaults);
                                    if (is_string($statsItems)) {
                                        $statsItems = json_decode($statsItems, true) ?? [];
                                    }
                                @endphp
                                @foreach($statsItems as $index => $item)
                                    <div
                                        class="flex items-center gap-2 item-row bg-slate-50 p-2 rounded border border-slate-100">
                                        <input type="text" name="content[about.stats.items][{{$index}}][number]"
                                            value="{{ $item['number'] ?? '' }}" placeholder="4+"
                                            class="w-20 p-1 border rounded text-sm text-center font-bold">
                                        <input type="text" name="content[about.stats.items][{{$index}}][label]"
                                            value="{{ $item['label'] ?? '' }}" placeholder="Years Practice"
                                            class="flex-1 p-1 border rounded text-sm">
                                        <button type="button" onclick="this.parentElement.remove()"
                                            class="text-red-400 hover:text-red-600 font-bold px-2">&times;</button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 6. Call to Action -->
                <div class="p-8 bg-white rounded-2xl border border-slate-100 shadow-sm">
                    <h3 class="text-lg font-serif font-bold text-slate-900 mb-6">Call to Action</h3>
                    <div class="grid gap-6">
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Section Title</label>
                            <input type="text" name="content[about.cta.title]"
                                value="{{ SiteContent::getValue('about.cta.title', 'Ready to Discuss Your Case?') }}"
                                class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl">
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Button Text / Intro</label>
                            <textarea name="content[about.cta.text]" rows="2"
                                class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl">{{ SiteContent::getValue('about.cta.text', 'Schedule a consultation...') }}</textarea>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Resume Tab Removed (Merged into Home) -->


            <!-- CONTACT TAB -->
            <div id="tab-contact" class="tab-content hidden space-y-8">
                <div class="p-8 bg-white rounded-2xl border border-slate-100 shadow-sm">
                    <h3 class="text-lg font-serif font-bold text-slate-900 mb-6">Contact Information</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Email Address</label>
                            <input type="email" name="content[contact.email]"
                                value="{{ SiteContent::getValue('contact.email', 'admin@aderobrian.com') }}"
                                class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl">
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Phone Number</label>
                            <input type="text" name="content[contact.phone]"
                                value="{{ SiteContent::getValue('contact.phone', '+254 700 000 000') }}"
                                class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl">
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Physical Address</label>
                            <textarea name="content[contact.location]" rows="3"
                                class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl">{{ SiteContent::getValue('contact.location', 'Nairobi, Kenya') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Google Maps Embed
                                URL</label>
                            <textarea name="content[contact.map_url]" rows="3"
                                class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl font-mono text-xs">{{ SiteContent::getValue('contact.map_url', '') }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="p-8 bg-white rounded-2xl border border-slate-100 shadow-sm">
                    <h3 class="text-lg font-serif font-bold text-slate-900 mb-6">Social Media Links</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">LinkedIn URL</label>
                            <input type="url" name="content[social.linkedin]"
                                value="{{ SiteContent::getValue('social.linkedin', 'https://ke.linkedin.com/in/omonge-adero-627739142') }}"
                                class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl">
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Facebook URL</label>
                            <input type="url" name="content[social.facebook]"
                                value="{{ SiteContent::getValue('social.facebook', 'https://web.facebook.com/brian.adero.1/?_rdc=1&_rdr#') }}"
                                class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl">
                        </div>
                    </div>
                </div>
            </div>

            <!-- LEGAL TAB -->
            <div id="tab-legal" class="tab-content hidden space-y-8">
                <div class="p-8 bg-white rounded-2xl border border-slate-100 shadow-sm">
                    <h3 class="text-lg font-serif font-bold text-slate-900 mb-6">Privacy Policy</h3>
                    <textarea name="content[legal.privacy]" rows="10"
                        class="rich-text-editor w-full p-4 bg-slate-50 border border-slate-100 rounded-xl">{{ SiteContent::getValue('legal.privacy', '') }}</textarea>
                </div>
                <div class="p-8 bg-white rounded-2xl border border-slate-100 shadow-sm">
                    <h3 class="text-lg font-serif font-bold text-slate-900 mb-6">Terms of Service</h3>
                    <textarea name="content[legal.terms]" rows="10"
                        class="rich-text-editor w-full p-4 bg-slate-50 border border-slate-100 rounded-xl">{{ SiteContent::getValue('legal.terms', '') }}</textarea>
                </div>
            </div>

        </form>
    </div>

    <!-- Templates for Repeaters -->
    <template id="tpl-practice-areas">
        <div class="p-4 bg-slate-50 rounded-lg border border-slate-100 relative group item-row">
            <button type="button" onclick="this.parentElement.remove()"
                class="absolute top-2 right-2 text-red-400 hover:text-red-600 font-bold">&times;</button>
            <div class="grid gap-2">
                <input type="text" name="content[home.practice_areas][INDEX][title]" placeholder="Area Title"
                    class="p-2 border rounded font-bold">
                <select name="content[home.practice_areas][INDEX][icon]" class="p-2 border rounded">
                    <option value="Building">Building (Corporate)</option>
                    <option value="Gavel">Gavel (Litigation)</option>
                    <option value="Users">Users (Family)</option>
                    <option value="Scale">Scale (Justice)</option>
                    <option value="Briefcase">Briefcase</option>
                    <option value="FileText">File/Contract</option>
                    <option value="Shield">Shield</option>
                </select>
                <textarea name="content[home.practice_areas][INDEX][desc]" rows="2" placeholder="Description"
                    class="p-2 border rounded text-sm"></textarea>
            </div>
        </div>
    </template>
    <template id="tpl-experience">
        <div class="p-4 bg-slate-50 rounded-lg border border-slate-100 relative group item-row">
            <button type="button" onclick="this.parentElement.remove()"
                class="absolute top-2 right-2 text-red-400 hover:text-red-600 font-bold">&times;</button>
            <div class="grid md:grid-cols-3 gap-4">
                <input type="text" name="content[home.experience][INDEX][period]" placeholder="Period (e.g. 2023-Present)"
                    class="p-2 border rounded">
                <input type="text" name="content[home.experience][INDEX][title]" placeholder="Job Title"
                    class="p-2 border rounded">
                <input type="text" name="content[home.experience][INDEX][company]" placeholder="Company"
                    class="p-2 border rounded">
                <textarea name="content[home.experience][INDEX][desc]" rows="2" placeholder="Description"
                    class="md:col-span-3 p-2 border rounded"></textarea>
            </div>
        </div>
    </template>

    <template id="tpl-education">
        <div class="p-4 bg-slate-50 rounded-lg border border-slate-100 relative group item-row">
            <button type="button" onclick="this.parentElement.remove()"
                class="absolute top-2 right-2 text-red-400 hover:text-red-600 font-bold">&times;</button>
            <div class="grid md:grid-cols-3 gap-4">
                <input type="text" name="content[home.education][INDEX][year]" placeholder="Year"
                    class="p-2 border rounded">
                <input type="text" name="content[home.education][INDEX][degree]" placeholder="Degree"
                    class="p-2 border rounded">
                <input type="text" name="content[home.education][INDEX][institution]" placeholder="Institution"
                    class="p-2 border rounded">
                <textarea name="content[home.education][INDEX][desc]" rows="2" placeholder="Description"
                    class="md:col-span-3 p-2 border rounded"></textarea>
            </div>
        </div>
    </template>

    <template id="tpl-achievements">
        <div class="p-4 bg-slate-50 rounded-lg border border-slate-100 relative group item-row">
            <button type="button" onclick="this.parentElement.remove()"
                class="absolute top-2 right-2 text-red-400 hover:text-red-600 font-bold">&times;</button>
            <div class="grid gap-2">
                <input type="text" name="content[home.achievements][INDEX][number]" placeholder="Number (e.g. 50+)"
                    class="p-2 border rounded font-bold">
                <input type="text" name="content[home.achievements][INDEX][title]" placeholder="Title"
                    class="p-2 border rounded">
                <input type="text" name="content[home.achievements][INDEX][desc]" placeholder="Subtitle/Desc"
                    class="p-2 border rounded text-sm">
            </div>
        </div>
    </template>

    <template id="tpl-philosophy">
        <div class="p-4 bg-slate-50 rounded-lg border border-slate-100 relative group item-row">
            <button type="button" onclick="this.parentElement.remove()"
                class="absolute top-2 right-2 text-red-400 hover:text-red-600 font-bold">&times;</button>
            <div class="grid gap-2">
                <label class="text-[10px] font-bold uppercase text-slate-400">Select Icon</label>
                <div class="flex flex-wrap gap-2">
                    <!-- Hardcoded Icons for JS Template -->
                    <label class="cursor-pointer"><input type="radio" name="content[about.philosophy.items][INDEX][icon]"
                            value="users" class="peer hidden" checked>
                        <div
                            class="p-2 bg-white border border-slate-200 rounded hover:bg-slate-100 peer-checked:bg-slate-900 peer-checked:text-white peer-checked:border-slate-900 transition-colors text-slate-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg></div>
                    </label>
                    <label class="cursor-pointer"><input type="radio" name="content[about.philosophy.items][INDEX][icon]"
                            value="search" class="peer hidden">
                        <div
                            class="p-2 bg-white border border-slate-200 rounded hover:bg-slate-100 peer-checked:bg-slate-900 peer-checked:text-white peer-checked:border-slate-900 transition-colors text-slate-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg></div>
                    </label>
                    <label class="cursor-pointer"><input type="radio" name="content[about.philosophy.items][INDEX][icon]"
                            value="target" class="peer hidden">
                        <div
                            class="p-2 bg-white border border-slate-200 rounded hover:bg-slate-100 peer-checked:bg-slate-900 peer-checked:text-white peer-checked:border-slate-900 transition-colors text-slate-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <circle cx="12" cy="12" r="6"></circle>
                                <circle cx="12" cy="12" r="2"></circle>
                            </svg></div>
                    </label>
                    <label class="cursor-pointer"><input type="radio" name="content[about.philosophy.items][INDEX][icon]"
                            value="scale" class="peer hidden">
                        <div
                            class="p-2 bg-white border border-slate-200 rounded hover:bg-slate-100 peer-checked:bg-slate-900 peer-checked:text-white peer-checked:border-slate-900 transition-colors text-slate-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m16 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z" />
                                <path d="m2 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z" />
                                <path d="M7 21h10" />
                                <path d="M12 3v18" />
                                <path d="M3 7h2c2 0 5-1 7-2 2 1 5 2 7 2h2" />
                            </svg></div>
                    </label>
                    <label class="cursor-pointer"><input type="radio" name="content[about.philosophy.items][INDEX][icon]"
                            value="gavel" class="peer hidden">
                        <div
                            class="p-2 bg-white border border-slate-200 rounded hover:bg-slate-100 peer-checked:bg-slate-900 peer-checked:text-white peer-checked:border-slate-900 transition-colors text-slate-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m14.5 12.5-8 8a2.119 2.119 0 1 1-3-3l8-8" />
                                <path d="m16 16 6-6" />
                                <path d="m8 8 6-6" />
                                <path d="m9 7 8 8" />
                                <path d="m21 11-8-8" />
                            </svg></div>
                    </label>
                    <label class="cursor-pointer"><input type="radio" name="content[about.philosophy.items][INDEX][icon]"
                            value="briefcase" class="peer hidden">
                        <div
                            class="p-2 bg-white border border-slate-200 rounded hover:bg-slate-100 peer-checked:bg-slate-900 peer-checked:text-white peer-checked:border-slate-900 transition-colors text-slate-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect width="20" height="14" x="2" y="7" rx="2" ry="2" />
                                <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16" />
                            </svg></div>
                    </label>
                    <label class="cursor-pointer"><input type="radio" name="content[about.philosophy.items][INDEX][icon]"
                            value="shield" class="peer hidden">
                        <div
                            class="p-2 bg-white border border-slate-200 rounded hover:bg-slate-100 peer-checked:bg-slate-900 peer-checked:text-white peer-checked:border-slate-900 transition-colors text-slate-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z" />
                            </svg></div>
                    </label>
                    <label class="cursor-pointer"><input type="radio" name="content[about.philosophy.items][INDEX][icon]"
                            value="lightbulb" class="peer hidden">
                        <div
                            class="p-2 bg-white border border-slate-200 rounded hover:bg-slate-100 peer-checked:bg-slate-900 peer-checked:text-white peer-checked:border-slate-900 transition-colors text-slate-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M15 14c.2-1 .7-1.7 1.5-2.5 1-1 1.5-2 1.5-3.5a6 6 0 0 0-11.43-1.428C5.99 7.382 6 7.691 6 8a4.844 4.844 0 0 0 .733 2.665C7.262 11.536 7.79 12.188 8 13c.2.828.2 1.83 0 3v0a2 2 0 0 0 1.084 2.824c.761.274 1.59.436 2.458.436h.917c.868 0 1.697-.162 2.458-.436A2 2 0 0 0 16 16v0c-.2-1.17-.2-2.172 0-3Z" />
                                <path d="M12 21h0" />
                            </svg></div>
                    </label>
                </div>

                <label class="text-[10px] font-bold uppercase text-slate-400">Title</label>
                <input type="text" name="content[about.philosophy.items][INDEX][title]"
                    class="p-2 border rounded font-bold">

                <label class="text-[10px] font-bold uppercase text-slate-400">Description</label>
                <textarea name="content[about.philosophy.items][INDEX][desc]" rows="3"
                    class="p-2 border rounded text-sm"></textarea>
            </div>
        </div>
    </template>

    <template id="tpl-highlightItem">
        <div class="flex items-center gap-2 item-row">
            <input type="text" name="content[about.highlights.items][]" class="flex-1 p-2 border rounded text-sm">
            <button type="button" onclick="this.parentElement.remove()"
                class="text-red-400 hover:text-red-600 font-bold">&times;</button>
        </div>
    </template>

    <template id="tpl-aboutStat">
        <div class="flex items-center gap-2 item-row bg-slate-50 p-2 rounded border border-slate-100">
            <input type="text" name="content[about.stats.items][INDEX][number]" placeholder="4+"
                class="w-20 p-1 border rounded text-sm text-center font-bold">
            <input type="text" name="content[about.stats.items][INDEX][label]" placeholder="Label"
                class="flex-1 p-1 border rounded text-sm">
            <button type="button" onclick="this.parentElement.remove()"
                class="text-red-400 hover:text-red-600 font-bold px-2">&times;</button>
        </div>
    </template>

    <!-- Summernote Assets -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script>
            $(document).ready(function() {
                $('.rich-text-editor').summernote({
                    height: 400,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'italic', 'underline', 'clear']],
                        ['fontsize', ['fontsize']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['insert', ['link']],
                        ['view', ['codeview']]
                    ]
                });
            });

            function switchTab(tabId)           {
                document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
                document.getElementById('tab-' + tabId).classList.remove('hidden');
                document.querySelectorAll('.tab-btn').forEach(btn => {
                    btn.classList.remove('active', 'border-slate-900', 'text-slate-900');
                    btn.classList.add('border-transparent', 'text-slate-400');
                });
                const activeBtn = document.querySelector(`.tab-btn[data-tab="${tabId}"]`);
                activeBtn.classList.remove('border-transparent', 'text-slate-400');
                activeBtn.classList.add('active', 'border-slate-900', 'text-slate-900');
            }

            function previewImage(input, imgId) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        document.getElementById(imgId).src = e.target.result;
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            function addItem(type) {
                const container = document.getElementById(type + '-container');
                const tpl = document.getElementById('tpl-' + type);
                // Calculate new index based on current children count (hacky but works for simple appends)
                // Better way: defined a counter global or random ID.
                // PHP-style array content[home.experience][] works too if we don't care about explicit keys, 
                // but for safety let's use a timestamp or count.
                const index = new Date().getTime();

                let html = tpl.innerHTML.replace(/INDEX/g, index);

                // Append
                let tempDiv = document.createElement('div');
                tempDiv.innerHTML = html;
                container.appendChild(tempDiv.firstElementChild);
            }
        </script>
@endsection