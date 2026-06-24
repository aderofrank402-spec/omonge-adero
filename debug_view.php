<?php use App\Models\SiteContent; ?>


<?php $__env->startSection('page-title', 'Visual Site Manager'); ?>
<?php $__env->startSection('page-subtitle', 'Professional Content & Design Control Center'); ?>

<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/admin-cms.css')); ?>">

    <div class="max-w-7xl mx-auto">
        <form action="<?php echo e(route('admin.content.update', 1)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <input type="hidden" name="page" value="all">

            <!-- Premium Tab Navigation -->
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 mb-8 overflow-hidden">
                <div class="flex items-center justify-between px-8 py-4 border-b border-slate-100 bg-slate-50/50">
                    <div class="flex gap-8">
                        <button type="button" onclick="switchMainTab('design')"
                            class="main-tab-btn active text-sm font-bold tracking-wider uppercase py-2 transition-all border-b-2 border-slate-900"
                            data-tab="design">Design System</button>
                        <button type="button" onclick="switchMainTab('seo')"
                            class="main-tab-btn text-sm font-bold tracking-wider uppercase py-2 transition-all border-b-2 border-transparent text-slate-400 hover:text-slate-600"
                            data-tab="seo">SEO & Social</button>
                        <button type="button" onclick="switchMainTab('pages')"
                            class="main-tab-btn text-sm font-bold tracking-wider uppercase py-2 transition-all border-b-2 border-transparent text-slate-400 hover:text-slate-600"
                            data-tab="pages">Page Content</button>
                    </div>
                    <button type="submit"
                        class="bg-slate-900 text-white px-6 py-2.5 rounded-xl font-bold text-sm tracking-wide shadow-lg shadow-slate-900/20 hover:scale-105 active:scale-95 transition-all flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Publish Changes
                    </button>
                </div>

                <!-- Main Content Area -->
                <div class="p-8">
                    <!-- Design System Tab -->
                    <div id="tab-design" class="main-tab-content space-y-12">
                        <div class="grid lg:grid-cols-3 gap-8">
                            <!-- Global Colors -->
                            <div
                                class="cms-card bg-white p-6 rounded-2xl border border-slate-100 shadow-sm transition-all h-full">
                                <span class="section-label">Global Identity</span>
                                <h3 class="text-xl font-serif font-bold text-slate-900 mb-6">Color Palette</h3>
                                <div class="space-y-6">
                                    <div>
                                        <label class="block text-sm font-semibold text-slate-700 mb-3">Primary
                                            Identity</label>
                                        <div
                                            class="flex items-center gap-4 p-3 bg-slate-50 rounded-xl border border-slate-100">
                                            <input type="color" name="content[style.global.primary_color]"
                                                value="<?php echo e(SiteContent::getValue('style.global.primary_color', '#1e293b')); ?>"
                                                class="w-12 h-12 rounded-lg cursor-pointer border-none p-0 bg-transparent">
                                            <input type="text"
                                                value="<?php echo e(SiteContent::getValue('style.global.primary_color', '#1e293b')); ?>"
                                                class="flex-1 bg-transparent border-none text-sm font-mono focus:ring-0"
                                                readonly>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-slate-700 mb-3">Brand Accent</label>
                                        <div
                                            class="flex items-center gap-4 p-3 bg-slate-50 rounded-xl border border-slate-100">
                                            <input type="color" name="content[style.global.accent_color]"
                                                value="<?php echo e(SiteContent::getValue('style.global.accent_color', '#2563eb')); ?>"
                                                class="w-12 h-12 rounded-lg cursor-pointer border-none p-0 bg-transparent">
                                            <input type="text"
                                                value="<?php echo e(SiteContent::getValue('style.global.accent_color', '#2563eb')); ?>"
                                                class="flex-1 bg-transparent border-none text-sm font-mono focus:ring-0"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Typography -->
                            <div
                                class="cms-card bg-white p-6 rounded-2xl border border-slate-100 shadow-sm transition-all h-full">
                                <span class="section-label">Readability</span>
                                <h3 class="text-xl font-serif font-bold text-slate-900 mb-6">Typography</h3>
                                <div class="space-y-6">
                                    <div>
                                        <label class="block text-sm font-semibold text-slate-700 mb-3">Secondary Font
                                            (Sans)</label>
                                        <select name="content[style.global.font_sans]"
                                            class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl text-sm focus:ring-slate-900 focus:border-slate-900">
                                            <option value="Manrope" <?php echo e(SiteContent::getValue('style.global.font_sans') === 'Manrope' ? 'selected' : ''); ?>>Manrope (Modern)</option>
                                            <option value="Inter" <?php echo e(SiteContent::getValue('style.global.font_sans') === 'Inter' ? 'selected' : ''); ?>>Inter (Clean)</option>
                                            <option value="Outfit" <?php echo e(SiteContent::getValue('style.global.font_sans') === 'Outfit' ? 'selected' : ''); ?>>Outfit (Elegant)</option>
                                            <option value="Roboto" <?php echo e(SiteContent::getValue('style.global.font_sans') === 'Roboto' ? 'selected' : ''); ?>>Roboto (Neutral)</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-slate-700 mb-3">Display Font
                                            (Serif)</label>
                                        <select name="content[style.global.font_serif]"
                                            class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl text-sm focus:ring-slate-900 focus:border-slate-900">
                                            <option value="Playfair Display" <?php echo e(SiteContent::getValue('style.global.font_serif') === 'Playfair Display' ? 'selected' : ''); ?>>Playfair Display (Classic)</option>
                                            <option value="Bodoni Moda" <?php echo e(SiteContent::getValue('style.global.font_serif') === 'Bodoni Moda' ? 'selected' : ''); ?>>Bodoni Moda (Modern Serif)</option>
                                            <option value="Cormorant Garamond" <?php echo e(SiteContent::getValue('style.global.font_serif') === 'Cormorant Garamond' ? 'selected' : ''); ?>>Cormorant Garamond (Sophisticated)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Hero Sizing -->
                            <div
                                class="cms-card bg-white p-6 rounded-2xl border border-slate-100 shadow-sm transition-all h-full">
                                <span class="section-label">Impact</span>
                                <h3 class="text-xl font-serif font-bold text-slate-900 mb-6">Hero Dynamics</h3>
                                <div class="space-y-8">
                                    <div>
                                        <div class="flex justify-between mb-3">
                                            <label class="text-sm font-semibold text-slate-700">Hero Font Size</label>
                                            <span class="text-xs font-mono text-slate-400"
                                                id="heroSizeVal"><?php echo e(SiteContent::getValue('style.hero.title_size', '4.5rem')); ?></span>
                                        </div>
                                        <input type="range" name="content[style.hero.title_size]" min="3" max="6" step="0.1"
                                            value="<?php echo e((float) SiteContent::getValue('style.hero.title_size', '4.5')); ?>"
                                            class="range-slider"
                                            oninput="document.getElementById('heroSizeVal').innerText = this.value + 'rem'">
                                    </div>
                                    <div class="p-4 bg-slate-900 rounded-xl">
                                        <p class="text-white text-center font-serif" style="font-size: 1.2rem;">Preview
                                            Scale</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- SEO & Social Tab -->
                    <div id="tab-seo" class="main-tab-content hidden space-y-12">
                        <div class="grid lg:grid-cols-2 gap-12">
                            <!-- Social Branding Information -->
                            <div class="space-y-8">
                                <div class="cms-card bg-white p-8 rounded-3xl border border-slate-100 shadow-sm space-y-8">
                                    <div>
                                        <span class="px-3 py-1 bg-indigo-50 text-indigo-600 text-[10px] font-bold uppercase rounded-full tracking-wider">Discovery</span>
                                        <h3 class="text-2xl font-serif font-bold text-slate-900 mt-3">Search & Social Branding</h3>
                                        <p class="text-slate-500 text-sm mt-1">Configure how your site appears when shared on LinkedIn, Twitter, and WhatsApp.</p>
                                    </div>

                                    <div class="space-y-6">
                                        <div>
                                            <label class="block text-sm font-bold uppercase text-slate-400 mb-2">Social Sharing Title (OG Title)</label>
                                            <input type="text" name="content[seo.og.title]" 
                                                value="<?php echo e(SiteContent::getValue('seo.og.title', 'Brian Adero | Advocate of the High Court')); ?>" 
                                                class="w-full p-4 bg-slate-50 border border-slate-100 rounded-xl text-base"
                                                oninput="updateSocialPreview('title', this.value)">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-bold uppercase text-slate-400 mb-2">Social Description (OG Description)</label>
                                            <textarea name="content[seo.og.description]" rows="3" 
                                                class="w-full p-4 bg-slate-50 border border-slate-100 rounded-xl text-base leading-relaxed"
                                                oninput="updateSocialPreview('desc', this.value)"><?php echo e(SiteContent::getValue('seo.og.description', 'Strategic legal counsel for businesses and individuals, ensuring your rights are protected with unwavering integrity.')); ?></textarea>
                                        </div>
                                        <div class="p-6 bg-slate-50 rounded-2xl border border-dashed border-slate-200">
                                            <label class="block text-sm font-bold uppercase text-slate-400 mb-4">Social Preview Image</label>
                                            <label class="cursor-pointer group block">
                                                <div class="w-full h-48 bg-white rounded-xl shadow-sm border border-slate-100 mb-4 flex items-center justify-center group-hover:bg-slate-900 transition-all overflow-hidden relative">
                                                    <img id="seoImgPrev" src="<?php echo e(asset('assets/images/og-image.jpeg')); ?>" class="w-full h-full object-cover">
                                                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity">
                                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/><path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                                    </div>
                                                </div>
                                                <span class="text-xs font-bold text-slate-500 group-hover:text-slate-900 transition-colors">Replace Social Preview Image (1200x630 Recommended)</span>
                                                <input type="file" name="seo_og_image" class="hidden" onchange="previewImage(this, 'seoImgPrev'); updateSocialPreview('image', this)">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Live Mockup -->
                            <div class="space-y-8">
                                <div class="sticky top-8 space-y-6">
                                    <h4 class="text-sm font-bold uppercase text-slate-400 tracking-widest text-center">Live Sharing Mockup</h4>
                                    
                                    <!-- LinkedIn/WhatsApp Style Mockup -->
                                    <div class="bg-white rounded-xl shadow-2xl border border-slate-200 overflow-hidden max-w-md mx-auto">
                                        <div class="bg-slate-100 h-64 flex items-center justify-center overflow-hidden">
                                            <img id="mockupImg" src="<?php echo e(asset('assets/images/og-image.jpeg')); ?>" class="w-full h-full object-cover opacity-90">
                                        </div>
                                        <div class="p-6 space-y-2 bg-slate-50">
                                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-tighter">ADEROBRIAN.COM</p>
                                            <h4 id="mockupTitle" class="text-lg font-bold text-slate-900 leading-tight"><?php echo e(SiteContent::getValue('seo.og.title', 'Brian Adero | Advocate of the High Court')); ?></h4>
                                            <p id="mockupDesc" class="text-sm text-slate-500 line-clamp-2"><?php echo e(SiteContent::getValue('seo.og.description', 'Strategic legal counsel for businesses and individuals, ensuring your rights are protected with unwavering integrity.')); ?></p>
                                        </div>
                                    </div>

                                    <!-- Google Search Result Mockup -->
                                    <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 max-w-md mx-auto space-y-2">
                                        <div class="flex items-center gap-2">
                                            <div class="w-7 h-7 bg-slate-100 rounded-full flex items-center justify-center text-[10px] font-bold">B</div>
                                            <div>
                                                <p class="text-[12px] text-slate-900 leading-none">Brian Adero</p>
                                                <p class="text-[11px] text-slate-500 leading-none">https://aderobrian.com</p>
                                            </div>
                                        </div>
                                        <h4 id="googleTitle" class="text-[#1a0dab] text-xl hover:underline cursor-pointer"><?php echo e(SiteContent::getValue('seo.og.title', 'Brian Adero | Advocate of the High Court')); ?></h4>
                                        <p id="googleDesc" class="text-[#4d5156] text-sm leading-relaxed"><?php echo e(SiteContent::getValue('seo.og.description', 'Strategic legal counsel for businesses and individuals, ensuring your rights are protected with unwavering integrity.')); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Structured Data Section -->
                        <div class="cms-card bg-white p-8 rounded-3xl border border-slate-100 shadow-sm">
                            <div class="flex gap-3 items-center mb-8">
                                <span class="px-3 py-1 bg-amber-50 text-amber-600 text-[10px] font-bold uppercase rounded-full tracking-wider">SEO Boost</span>
                                <h3 class="text-2xl font-serif font-bold text-slate-900">Legal Business Schema (JSON-LD)</h3>
                            </div>
                            
                            <div class="grid lg:grid-cols-3 gap-8">
                                <div class="space-y-6">
                                    <div>
                                        <label class="block text-sm font-bold uppercase text-slate-400 mb-2">Organization Name</label>
                                        <input type="text" name="content[seo.schema.name]" value="<?php echo e(SiteContent::getValue('seo.schema.name', 'Brian Adero Advocates')); ?>" class="w-full p-4 bg-slate-50 border border-slate-100 rounded-xl text-base">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-bold uppercase text-slate-400 mb-2">Legal Specialization</label>
                                        <input type="text" name="content[seo.schema.specialization]" value="<?php echo e(SiteContent::getValue('seo.schema.specialization', 'Corporate, Civil & Family Law')); ?>" class="w-full p-4 bg-slate-50 border border-slate-100 rounded-xl text-base">
                                    </div>
                                </div>
                                <div class="lg:col-span-2">
                                    <div class="p-6 bg-slate-900 rounded-2xl">
                                        <div class="flex items-center justify-between mb-4">
                                            <p class="text-slate-400 text-[10px] font-mono tracking-widest uppercase">Schema Generator Output</p>
                                            <span class="px-2 py-0.5 bg-green-500/10 text-green-400 text-[9px] font-bold rounded uppercase">Active</span>
                                        </div>
                                        <pre class="text-blue-300 text-xs font-mono leading-relaxed whitespace-pre-wrap">
{
  "<?php $__contextArgs = [];
if (context()->has($__contextArgs[0])) :
if (isset($value)) { $__contextPrevious[] = $value; }
$value = context()->get($__contextArgs[0]); ?>": "https://schema.org",
  "@type": "LegalService",
  "name": "<?php echo e(SiteContent::getValue('seo.schema.name', 'Brian Adero Advocates')); ?>",
  "image": "<?php echo e(asset('assets/images/og-image.jpeg')); ?>",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Nairobi, Kenya"
  }
}</pre>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Page Content Tab -->
                    <div id="tab-pages" class="main-tab-content hidden space-y-8">
                        <!-- Sub-navigation for Pages -->
                        <div class="flex gap-4 mb-8 overflow-x-auto pb-2">
                            <button type="button" onclick="switchPage('home')"
                                class="page-tab-btn active px-5 py-2 rounded-full bg-slate-100 text-slate-600 text-sm font-bold transition-all border border-transparent"
                                data-page="home">Homepage</button>
                            <button type="button" onclick="switchPage('about')"
                                class="page-tab-btn px-5 py-2 rounded-full bg-slate-50 text-slate-400 text-sm font-bold transition-all border border-transparent"
                                data-page="about">About Page</button>
                            <button type="button" onclick="switchPage('contact')"
                                class="page-tab-btn px-5 py-2 rounded-full bg-slate-50 text-slate-400 text-sm font-bold transition-all border border-transparent"
                                data-page="contact">Contact Details</button>
                        </div>

                        <!-- Home Page Content -->
                        <div id="page-home" class="page-content active flex flex-col gap-12">
                            <!-- Hero Content -->
                            <div class="cms-card bg-white p-8 rounded-2xl border border-slate-100 shadow-sm space-y-8">
                                <div class="flex justify-between items-center">
                                    <div class="flex gap-3 items-center">
                                        <h4 class="text-2xl font-serif font-bold text-slate-900">Hero Section</h4>
                                        <span
                                            class="px-2 py-0.5 bg-blue-50 text-blue-600 text-[9px] font-bold uppercase rounded-full">Section
                                            1</span>
                                    </div>
                                    <button type="button" onclick="toggleSection(this)"
                                        class="p-2 hover:bg-slate-100 rounded-lg transition-all transform -rotate-90"
                                        data-target="hero-body">
                                        <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </button>
                                </div>

                                <div id="hero-body" class="cms-section-body hidden pt-8 border-t border-slate-50">
                                    <div class="grid lg:grid-cols-2 gap-12">
                                        <div class="space-y-6">
                                            <div class="grid gap-6">
                                                <label class="block text-sm font-bold uppercase text-slate-400 mb-2">Main
                                                    Headline (3 Lines)</label>
                                                <div class="space-y-4">
                                                    <input type="text" name="content[hero.title.line1]"
                                                        value="<?php echo e($content['hero.title.line1']->value ?? 'Justice'); ?>"
                                                        placeholder="Line 1"
                                                        class="w-full p-4 bg-slate-50 border border-slate-100 rounded-xl text-base">
                                                    <input type="text" name="content[hero.title.line2]"
                                                        value="<?php echo e($content['hero.title.line2']->value ?? 'Requires'); ?>"
                                                        placeholder="Line 2 (Italic)"
                                                        class="w-full p-4 bg-slate-50 border border-slate-100 rounded-xl text-base italic">
                                                    <input type="text" name="content[hero.title.line3]"
                                                        value="<?php echo e($content['hero.title.line3']->value ?? 'Clarity.'); ?>"
                                                        placeholder="Line 3"
                                                        class="w-full p-4 bg-slate-50 border border-slate-100 rounded-xl text-base">
                                                </div>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-bold uppercase text-slate-400 mb-3">Impact
                                                    Quote (Floating Card)</label>
                                                <input type="text" name="content[hero.floating.quote]"
                                                    value="<?php echo e($content['hero.floating.quote']->value ?? 'Excellence is not an act, but a habit.'); ?>"
                                                    class="w-full p-4 bg-slate-50 border border-slate-100 rounded-xl text-base italic">
                                            </div>
                                            <textarea name="content[hero.description]" rows="3"
                                                class="w-full p-4 bg-slate-50 border border-slate-100 rounded-xl text-sm summernote"><?php echo e($content['hero.description']->value ?? 'I provide strategic counsel for businesses and individuals, ensuring your rights are protected with unwavering integrity and precision.'); ?></textarea>
                                        </div>
                                        <div
                                            class="bg-slate-50 rounded-3xl p-8 flex flex-col justify-center items-center border-2 border-dashed border-slate-200">
                                            <label class="cursor-pointer group text-center">
                                                <div
                                                    class="w-48 h-48 bg-white rounded-2xl shadow-md border border-slate-100 mb-4 flex items-center justify-center group-hover:bg-slate-900 group-hover:text-white transition-all overflow-hidden relative">
                                                    <img id="heroImgPrev" src="<?php echo e(asset('assets/images/brian.jpeg')); ?>"
                                                        class="w-full h-full object-cover">
                                                    <div
                                                        class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity">
                                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path
                                                                d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                                            <path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        </svg>
                                                    </div>
                                                </div>
                                                <span
                                                    class="text-sm font-bold text-slate-500 group-hover:text-slate-900 transition-colors">Replace
                                                    Hero Portrait</span>
                                                <input type="file" name="hero_image" class="hidden"
                                                    onchange="previewImage(this, 'heroImgPrev')">
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- About Section -->
                                <div class="cms-card bg-white p-8 rounded-2xl border border-slate-100 shadow-sm space-y-8">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <span class="section-label">Section 2</span>
                                            <h4 class="text-2xl font-serif font-bold text-slate-900">About Section</h4>
                                        </div>
                                        <button type="button" onclick="toggleSection(this)"
                                            class="p-2 hover:bg-slate-100 rounded-lg transition-all transform -rotate-90"
                                            data-target="about-body">
                                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div id="about-body" class="cms-section-body hidden">
                                        <div class="grid lg:grid-cols-2 gap-8">
                                            <div class="space-y-6">
                                                <div class="grid grid-cols-2 gap-4">
                                                    <div>
                                                        <label
                                                            class="block text-[10px] font-bold uppercase text-slate-400 mb-1">Title</label>
                                                        <input type="text" name="content[home.about.title]"
                                                            value="<?php echo e($content['home.about.title']->value ?? 'About Brian'); ?>"
                                                            class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl text-sm">
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="block text-[10px] font-bold uppercase text-slate-400 mb-1">Subtitle</label>
                                                        <input type="text" name="content[home.about.subtitle]"
                                                            value="<?php echo e($content['home.about.subtitle']->value ?? 'Since 2020'); ?>"
                                                            class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl text-sm">
                                                    </div>
                                                </div>
                                                <div>
                                                    <label
                                                        class="block text-[10px] font-bold uppercase text-slate-400 mb-1">Vision
                                                        Statement (Quote)</label>
                                                    <textarea name="content[home.about.quote]" rows="3"
                                                        class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl text-sm italic"><?php echo e($content['home.about.quote']->value ?? 'I believe that effective legal representation goes beyond merely knowing the law; it requires understanding the unique human and business dynamics behind every case.'); ?></textarea>
                                                </div>
                                            </div>
                                            <div class="space-y-6">
                                                <div>
                                                    <label
                                                        class="block text-[10px] font-bold uppercase text-slate-400 mb-1">Biography
                                                        Paragraph 1</label>
                                                    <textarea name="content[home.about.p1]" rows="3"
                                                        class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl text-sm"><?php echo e($content['home.about.p1']->value ?? 'With 4 years of experience practicing at the High Court, I have built a reputation for meticulous preparation and strategic advocacy. My approach is client-centric, ensuring that you are not just represented, but truly heard and understood.'); ?></textarea>
                                                </div>
                                                <div>
                                                    <label
                                                        class="block text-[10px] font-bold uppercase text-slate-400 mb-1">Biography
                                                        Paragraph 2</label>
                                                    <textarea name="content[home.about.p2]" rows="3"
                                                        class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl text-sm"><?php echo e($content['home.about.p2']->value ?? 'Whether navigating complex corporate disputes or sensitive family matters, my commitment remains the same: to provide ethical, aggressive, and effective counsel that secures your future.'); ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pt-6 border-t border-slate-50 flex items-center justify-between">
                                            <div class="flex items-center gap-4">
                                                <div
                                                    class="w-16 h-8 bg-slate-50 rounded border border-slate-100 flex items-center justify-center overflow-hidden">
                                                    <img id="sigImgPrev"
                                                        src="https://upload.wikimedia.org/wikipedia/commons/c/ca/Sig_J._R._R._Tolkien.png"
                                                        class="h-6 opacity-60 invert">
                                                </div>
                                                <label
                                                    class="text-sm font-bold text-slate-900 cursor-pointer hover:underline">
                                                    Upload New Signature
                                                    <input type="file" name="signature_image" class="hidden"
                                                        onchange="previewImage(this, 'sigImgPrev')">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- High Impact Quote -->
                            <div class="cms-card bg-slate-900 p-8 rounded-2xl border border-slate-800 shadow-sm space-y-6">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <span class="text-slate-500 text-[10px] font-bold uppercase tracking-widest">Section
                                            3</span>
                                        <h4 class="text-2xl font-serif font-bold text-white">Main Quote Section</h4>
                                    </div>
                                    <button type="button" onclick="toggleSection(this)"
                                        class="p-2 hover:bg-slate-800 rounded-lg transition-all transform -rotate-90"
                                        data-target="quote-body">
                                        <svg class="w-5 h-5 text-slate-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </button>
                                </div>
                                <div id="quote-body" class="cms-section-body hidden mt-8 pt-8 border-t border-slate-800">
                                    <textarea name="content[quote.main]" rows="2"
                                        class="w-full p-6 bg-slate-800 border-none rounded-xl text-white text-xl font-serif italic focus:ring-2 focus:ring-blue-500 outline-none"><?php echo e($content['quote.main']->value ?? "I don't just win cases; I secure futures. Your success is my singular mission."); ?></textarea>
                                </div>
                            </div>

                            <!-- Dynamic Lists Section -->
                            <div class="grid grid-cols-1 gap-12">
                                <!-- Experience Section -->
                                <div class="cms-card bg-white p-8 rounded-2xl border border-slate-100 shadow-sm space-y-6">
                                    <div class="flex justify-between items-center">
                                        <h4 class="text-xl font-serif font-bold text-slate-900">Experience Timeline</h4>
                                        <div class="flex items-center gap-2">
                                            <button type="button" onclick="addExperience()"
                                                class="p-2 bg-slate-50 text-slate-900 rounded-full hover:bg-slate-900 hover:text-white transition-all">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 4v16m8-8H4" />
                                                </svg>
                                            </button>
                                            <button type="button" onclick="toggleSection(this)"
                                                class="p-2 hover:bg-slate-100 rounded-lg transition-all transform -rotate-90"
                                                data-target="exp-body">
                                                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 9l-7 7-7-7" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <div id="exp-body" class="cms-section-body hidden">
                                        <div id="experience-list"
                                            class="space-y-6 max-h-[800px] overflow-y-auto pr-2 custom-scrollbar">
                                            <!-- Items via JS -->
                                        </div>
                                    </div>
                                    <input type="hidden" name="content[home.experience]" id="experienceInput">
                                </div>

                                <!-- Education Section -->
                                <div class="cms-card bg-white p-8 rounded-2xl border border-slate-100 shadow-sm space-y-6">
                                    <div class="flex justify-between items-center">
                                        <h4 class="text-xl font-serif font-bold text-slate-900">Education Background</h4>
                                        <div class="flex items-center gap-2">
                                            <button type="button" onclick="addEducation()"
                                                class="p-2 bg-slate-50 text-slate-900 rounded-full hover:bg-slate-900 hover:text-white transition-all">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 4v16m8-8H4" />
                                                </svg>
                                            </button>
                                            <button type="button" onclick="toggleSection(this)"
                                                class="p-2 hover:bg-slate-100 rounded-lg transition-all transform -rotate-90"
                                                data-target="edu-body">
                                                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 9l-7 7-7-7" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <div id="edu-body" class="cms-section-body hidden">
                                        <div id="education-list"
                                            class="space-y-6 max-h-[800px] overflow-y-auto pr-2 custom-scrollbar">
                                            <!-- Items via JS -->
                                        </div>
                                    </div>
                                    <input type="hidden" name="content[home.education]" id="educationInput">
                                </div>
                            </div>

                            <!-- Practice Areas -->
                            <div class="cms-card bg-white p-8 rounded-2xl border border-slate-100 shadow-sm space-y-6">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <span class="section-label">Section 6</span>
                                        <h4 class="text-xl font-serif font-bold text-slate-900">Areas of Law Practice</h4>
                                    </div>
                                    <div class="flex items-center gap-4">
                                        <button type="button" onclick="addPracticeArea()"
                                            class="px-4 py-2 bg-slate-900 text-white rounded-xl text-xs font-bold uppercase tracking-widest hover:scale-105 transition-all">Add
                                            Service Area</button>
                                        <button type="button" onclick="toggleSection(this)"
                                            class="p-2 hover:bg-slate-100 rounded-lg transition-all transform -rotate-90"
                                            data-target="practice-body">
                                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div id="practice-body" class="cms-section-body hidden">
                                    <div id="practice-areas-list" class="grid md:grid-cols-2 gap-8">
                                        <!-- Items via JS -->
                                    </div>
                                </div>
                                <input type="hidden" name="content[home.practice_areas]" id="practiceAreasInput">
                            </div>

                            <!-- Achievements Grid -->
                            <div class="cms-card bg-white p-8 rounded-2xl border border-slate-100 shadow-sm space-y-6">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <span class="section-label">Section 7</span>
                                        <h4 class="text-xl font-serif font-bold text-slate-900">Achievements Section</h4>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <button type="button" onclick="addAchievement()"
                                            class="p-2 bg-slate-50 text-slate-900 rounded-full hover:bg-slate-900 hover:text-white transition-all">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 4v16m8-8H4" />
                                            </svg>
                                        </button>
                                        <button type="button" onclick="toggleSection(this)"
                                            class="p-2 hover:bg-slate-100 rounded-lg transition-all transform -rotate-90"
                                            data-target="achieve-body">
                                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div id="achieve-body" class="cms-section-body hidden">
                                    <div id="achievements-list" class="grid md:grid-cols-3 gap-8">
                                        <!-- Items via JS -->
                                    </div>
                                </div>
                                <input type="hidden" name="content[home.achievements]" id="achievementsInput">
                            </div>
                        </div>
                    </div>

                    <!-- About Page Content -->
                    <div id="page-about" class="page-content flex flex-col gap-12">
                        <!-- Header Section -->
                        <div class="cms-card bg-white p-8 rounded-2xl border border-slate-100 shadow-sm space-y-8">
                            <div class="flex justify-between items-center">
                                <div class="flex gap-3 items-center">
                                    <h4 class="text-2xl font-serif font-bold text-slate-900">Header Section</h4>
                                    <span
                                        class="px-2 py-0.5 bg-blue-50 text-blue-600 text-[9px] font-bold uppercase rounded-full">Section
                                        1</span>
                                </div>
                                <button type="button" onclick="toggleSection(this)"
                                    class="p-2 hover:bg-slate-100 rounded-lg transition-all transform -rotate-90"
                                    data-target="about-header-body">
                                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                            </div>
                            <div id="about-header-body" class="cms-section-body hidden pt-8 border-t border-slate-50">
                                <div class="grid gap-8">
                                    <div>
                                        <label class="block text-sm font-bold uppercase text-slate-400 mb-3">Page
                                            Title</label>
                                        <input type="text" name="content[about.page.title]"
                                            value="<?php echo e($content['about.page.title']->value ?? 'About Brian Adero'); ?>"
                                            class="w-full p-4 bg-slate-50 border border-slate-100 rounded-xl text-base">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-bold uppercase text-slate-400 mb-3">Page
                                            Subtitle</label>
                                        <textarea name="content[about.page.subtitle]" rows="3"
                                            class="w-full p-4 bg-slate-50 border border-slate-100 rounded-xl text-base leading-relaxed"><?php echo e($content['about.page.subtitle']->value ?? 'A steadfast commitment to legal excellence, integrity, and the pursuit of justice for every client.'); ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Bio Section -->
                        <div class="cms-card bg-white p-8 rounded-2xl border border-slate-100 shadow-sm space-y-8">
                            <div class="flex justify-between items-center">
                                <div class="flex gap-3 items-center">
                                    <h4 class="text-2xl font-serif font-bold text-slate-900">Bio & Portrait</h4>
                                    <span
                                        class="px-2 py-0.5 bg-blue-50 text-blue-600 text-[9px] font-bold uppercase rounded-full">Section
                                        2</span>
                                </div>
                                <button type="button" onclick="toggleSection(this)"
                                    class="p-2 hover:bg-slate-100 rounded-lg transition-all transform -rotate-90"
                                    data-target="about-bio-body">
                                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                            </div>
                            <div id="about-bio-body" class="cms-section-body hidden pt-8 border-t border-slate-50">
                                <div class="grid gap-12">
                                    <div class="space-y-6">
                                        <div>
                                            <label class="block text-sm font-bold uppercase text-slate-400 mb-3">Section
                                                Title</label>
                                            <input type="text" name="content[about.section.title]"
                                                value="<?php echo e($content['about.section.title']->value ?? 'Dedicated to Your Legal Success'); ?>"
                                                class="w-full p-4 bg-slate-50 border border-slate-100 rounded-xl text-base">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-bold uppercase text-slate-400 mb-3">Full
                                                Biography</label>
                                            <div class="richtext-container">
                                                <textarea name="content[about.page.bio]" rows="10"
                                                    class="w-full p-5 bg-slate-50 border border-slate-100 rounded-2xl text-base summernote"><?php echo e($content['about.page.bio']->value ?? 'Brian Adero is an Advocate of the High Court of Kenya...'); ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-10 border-t border-slate-50">
                                        <label
                                            class="block text-sm font-bold uppercase text-slate-400 mb-6 text-center">Biography
                                            Portrait</label>
                                        <div class="max-w-md mx-auto">
                                            <div
                                                class="bg-slate-50 rounded-3xl p-10 flex flex-col justify-center items-center border-2 border-dashed border-slate-200">
                                                <label class="cursor-pointer group text-center block w-full">
                                                    <div
                                                        class="w-full aspect-[4/5] bg-white rounded-2xl shadow-lg border border-slate-100 mb-6 flex items-center justify-center group-hover:bg-slate-900 transition-all overflow-hidden relative">
                                                        <img id="aboutPortraitPrev"
                                                            src="<?php echo e(asset('assets/images/about-portrait.jpeg')); ?>"
                                                            onerror="this.src='<?php echo e(asset('assets/images/brian.jpeg')); ?>'"
                                                            class="w-full h-full object-cover">
                                                        <div
                                                            class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity">
                                                            <svg class="w-12 h-12 text-white" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24">
                                                                <path
                                                                    d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                                                <path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="inline-flex items-center gap-3 px-8 py-4 bg-slate-900 text-white rounded-2xl text-sm font-bold uppercase tracking-widest hover:scale-105 transition-all">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                                        </svg>
                                                        Replace Portrait Image
                                                    </div>
                                                    <input type="file" name="about_portrait" class="hidden"
                                                        onchange="previewImage(this, 'aboutPortraitPrev')">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Core Values Section -->
                        <div class="cms-card bg-white p-8 rounded-2xl border border-slate-100 shadow-sm space-y-8">
                            <div class="flex justify-between items-center">
                                <div class="flex gap-3 items-center">
                                    <h4 class="text-2xl font-serif font-bold text-slate-900">Core Values</h4>
                                    <span
                                        class="px-2 py-0.5 bg-blue-50 text-blue-600 text-[9px] font-bold uppercase rounded-full">Section
                                        3</span>
                                </div>
                                <button type="button" onclick="toggleSection(this)"
                                    class="p-2 hover:bg-slate-100 rounded-lg transition-all transform -rotate-90"
                                    data-target="about-values-body">
                                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                            </div>
                            <div id="about-values-body" class="cms-section-body hidden pt-8 border-t border-slate-50">
                                <div class="grid md:grid-cols-2 gap-8">
                                    <div class="p-8 bg-slate-50 rounded-2xl border border-slate-100 space-y-4">
                                        <div>
                                            <label class="block text-sm font-bold uppercase text-slate-400 mb-3">Value 1
                                                Title</label>
                                            <input type="text" name="content[about.value1.title]"
                                                value="<?php echo e($content['about.value1.title']->value ?? 'Integrity'); ?>"
                                                class="w-full p-4 bg-white border border-slate-200 rounded-xl text-base">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-bold uppercase text-slate-400 mb-3">Value 1
                                                Description</label>
                                            <textarea name="content[about.value1.desc]" rows="3"
                                                class="w-full p-4 bg-white border border-slate-200 rounded-xl text-base"><?php echo e($content['about.value1.desc']->value ?? 'Upholding the highest ethical standards in every case.'); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="p-8 bg-slate-50 rounded-2xl border border-slate-100 space-y-4">
                                        <div>
                                            <label class="block text-sm font-bold uppercase text-slate-400 mb-3">Value 2
                                                Title</label>
                                            <input type="text" name="content[about.value2.title]"
                                                value="<?php echo e($content['about.value2.title']->value ?? 'Excellence'); ?>"
                                                class="w-full p-4 bg-white border border-slate-200 rounded-xl text-base">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-bold uppercase text-slate-400 mb-3">Value 2
                                                Description</label>
                                            <textarea name="content[about.value2.desc]" rows="3"
                                                class="w-full p-4 bg-white border border-slate-200 rounded-xl text-base"><?php echo e($content['about.value2.desc']->value ?? 'Pursuing superior outcomes through diligent preparation.'); ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Philosophy & Approach Section -->
                        <div class="cms-card bg-white p-8 rounded-2xl border border-slate-100 shadow-sm space-y-8">
                            <div class="flex justify-between items-center">
                                <div class="flex gap-3 items-center">
                                    <h4 class="text-2xl font-serif font-bold text-slate-900">Philosophy & Approach</h4>
                                    <span
                                        class="px-2 py-0.5 bg-blue-50 text-blue-600 text-[9px] font-bold uppercase rounded-full">Section
                                        4</span>
                                </div>
                                <div class="flex items-center gap-4">
                                    <button type="button" onclick="addPhilosophyItem()"
                                        class="px-4 py-2 bg-slate-900 text-white rounded-xl text-xs font-bold uppercase tracking-widest hover:scale-105 transition-all">Add
                                        Pillar</button>
                                    <button type="button" onclick="toggleSection(this)"
                                        class="p-2 hover:bg-slate-100 rounded-lg transition-all transform -rotate-90"
                                        data-target="about-philosophy-body">
                                        <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div id="about-philosophy-body" class="cms-section-body hidden pt-8 border-t border-slate-50">
                                <div class="mb-12">
                                    <label class="block text-sm font-bold uppercase text-slate-400 mb-3">Section
                                        Title</label>
                                    <input type="text" name="content[about.philosophy.title]"
                                        value="<?php echo e($content['about.philosophy.title']->value ?? 'Philosophy & Approach'); ?>"
                                        class="w-full p-4 bg-slate-50 border border-slate-100 rounded-xl text-base">
                                </div>
                                <div id="philosophy-items-list" class="grid grid-cols-1 gap-8">
                                    <!-- Items via JS -->
                                </div>
                                <input type="hidden" name="content[about.philosophy.items]" id="philosophyItemsInput">
                            </div>
                        </div>

                        <!-- Professional Highlights Section -->
                        <div class="cms-card bg-white p-8 rounded-2xl border border-slate-100 shadow-sm space-y-8">
                            <div class="flex justify-between items-center">
                                <div class="flex gap-3 items-center">
                                    <h4 class="text-2xl font-serif font-bold text-slate-900">Professional Highlights</h4>
                                    <span
                                        class="px-2 py-0.5 bg-blue-50 text-blue-600 text-[9px] font-bold uppercase rounded-full">Section
                                        5</span>
                                </div>
                                <button type="button" onclick="toggleSection(this)"
                                    class="p-2 hover:bg-slate-100 rounded-lg transition-all transform -rotate-90"
                                    data-target="about-highlights-body">
                                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                            </div>
                            <div id="about-highlights-body" class="cms-section-body hidden pt-8 border-t border-slate-50">
                                <div class="grid gap-12">
                                    <div class="space-y-6">
                                        <div>
                                            <label class="block text-sm font-bold uppercase text-slate-400 mb-3">Section
                                                Title</label>
                                            <input type="text" name="content[about.highlights.title]"
                                                value="<?php echo e($content['about.highlights.title']->value ?? 'Professional Highlights'); ?>"
                                                class="w-full p-4 bg-slate-50 border border-slate-100 rounded-xl text-base">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-bold uppercase text-slate-400 mb-3">Intro
                                                Description</label>
                                            <textarea name="content[about.highlights.desc]" rows="3"
                                                class="w-full p-4 bg-slate-50 border border-slate-100 rounded-xl text-base"><?php echo e($content['about.highlights.desc']->value ?? "Throughout my years of practice, I have consistently delivered results across a broad range of legal fields."); ?></textarea>
                                        </div>
                                    </div>

                                    <div class="space-y-6">
                                        <div class="flex justify-between items-center">
                                            <h5 class="text-sm font-bold text-slate-700 uppercase tracking-wider">Bullet
                                                Points</h5>
                                            <button type="button" onclick="addHighlightItem()"
                                                class="text-xs font-bold text-blue-600 hover:text-blue-700 transition-colors">+
                                                Add Point</button>
                                        </div>
                                        <div id="highlights-items-list" class="grid grid-cols-1 gap-4">
                                            <!-- Items via JS -->
                                        </div>
                                        <input type="hidden" name="content[about.highlights.items]"
                                            id="highlightsItemsInput">
                                    </div>

                                    <div class="space-y-6 pt-8 border-t border-slate-50">
                                        <h5 class="text-sm font-bold text-slate-700 uppercase tracking-wider">Stats Grid
                                        </h5>
                                        <div id="stats-items-list" class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                            <!-- Items via JS -->
                                        </div>
                                        <input type="hidden" name="content[about.stats.items]" id="statsItemsInput">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Call to Action Section -->
                        <div class="cms-card bg-slate-900 p-8 rounded-2xl border border-slate-800 shadow-sm space-y-8">
                            <div class="flex justify-between items-center">
                                <div class="flex gap-3 items-center">
                                    <h4 class="text-2xl font-serif font-bold text-white">Call to Action</h4>
                                    <span
                                        class="px-2 py-0.5 bg-slate-800 text-slate-400 text-[9px] font-bold uppercase rounded-full">Section
                                        6</span>
                                </div>
                                <button type="button" onclick="toggleSection(this)"
                                    class="p-2 hover:bg-slate-800 rounded-lg transition-all transform -rotate-90"
                                    data-target="about-cta-body">
                                    <svg class="w-5 h-5 text-slate-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                            </div>
                            <div id="about-cta-body" class="cms-section-body hidden pt-8 border-t border-slate-800">
                                <div class="grid gap-8">
                                    <div>
                                        <label class="block text-sm font-bold uppercase text-slate-500 mb-3">CTA
                                            Title</label>
                                        <input type="text" name="content[about.cta.title]"
                                            value="<?php echo e($content['about.cta.title']->value ?? 'Ready to Discuss Your Case?'); ?>"
                                            class="w-full p-5 bg-slate-800 border-none text-white rounded-2xl text-lg font-serif">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-bold uppercase text-slate-500 mb-3">CTA
                                            Description</label>
                                        <textarea name="content[about.cta.text]" rows="4"
                                            class="w-full p-5 bg-slate-800 border-none text-white rounded-2xl text-base leading-relaxed"><?php echo e($content['about.cta.text']->value ?? 'Schedule a consultation today and let me provide the legal guidance you need.'); ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Page Content -->
                    <div id="page-contact" class="page-content flex flex-col gap-12">
                        <!-- Hero Section -->
                        <div class="cms-card bg-white p-8 rounded-2xl border border-slate-100 shadow-sm space-y-8">
                            <div class="flex justify-between items-center">
                                <div class="flex gap-3 items-center">
                                    <h4 class="text-2xl font-serif font-bold text-slate-900">Contact Hero</h4>
                                    <span
                                        class="px-2 py-0.5 bg-blue-50 text-blue-600 text-[9px] font-bold uppercase rounded-full">Section
                                        1</span>
                                </div>
                                <button type="button" onclick="toggleSection(this)"
                                    class="p-2 hover:bg-slate-100 rounded-lg transition-all transform -rotate-90"
                                    data-target="contact-hero-body">
                                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                            </div>
                            <div id="contact-hero-body" class="cms-section-body hidden pt-8 border-t border-slate-50">
                                <div class="grid gap-6">
                                    <div class="grid grid-cols-2 gap-6">
                                        <div>
                                            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Hero
                                                Subtitle</label>
                                            <input type="text" name="content[contact.hero.subtitle]"
                                                value="<?php echo e($content['contact.hero.subtitle']->value ?? 'Get In Touch'); ?>"
                                                class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl text-sm">
                                        </div>
                                        <div>
                                            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Hero
                                                Title</label>
                                            <input type="text" name="content[contact.hero.title]"
                                                value="<?php echo e($content['contact.hero.title']->value ?? 'Contact Me'); ?>"
                                                class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl text-sm">
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Hero
                                            Description</label>
                                        <textarea name="content[contact.hero.desc]" rows="2"
                                            class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl text-sm"><?php echo e($content['contact.hero.desc']->value ?? 'Reach out for legal consultations, inquiries, or representation.'); ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Office Information -->
                        <div class="cms-card bg-white p-8 rounded-2xl border border-slate-100 shadow-sm space-y-8">
                            <div class="flex justify-between items-center">
                                <div class="flex gap-3 items-center">
                                    <h4 class="text-2xl font-serif font-bold text-slate-900">Office Information</h4>
                                    <span
                                        class="px-2 py-0.5 bg-blue-50 text-blue-600 text-[9px] font-bold uppercase rounded-full">Section
                                        2</span>
                                </div>
                                <button type="button" onclick="toggleSection(this)"
                                    class="p-2 hover:bg-slate-100 rounded-lg transition-all transform -rotate-90"
                                    data-target="contact-office-body">
                                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                            </div>
                            <div id="contact-office-body" class="cms-section-body hidden pt-8 border-t border-slate-50">
                                <div class="grid gap-6">
                                    <div>
                                        <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Office Section
                                            Title</label>
                                        <input type="text" name="content[contact.office.title]"
                                            value="<?php echo e($content['contact.office.title']->value ?? 'Office Info'); ?>"
                                            class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl text-sm">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Office
                                            Description</label>
                                        <textarea name="content[contact.office.desc]" rows="4"
                                            class="w-full p-4 bg-slate-50 border border-slate-100 rounded-xl text-sm summernote"><?php echo e($content['contact.office.desc']->value ?? 'My office is open Monday through Friday, from 8:00 AM to 5:00 PM. I am available for consultations by appointment.'); ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Direct Contact Information -->
                        <div class="cms-card bg-white p-8 rounded-2xl border border-slate-100 shadow-sm space-y-8">
                            <div class="flex justify-between items-center">
                                <div class="flex gap-3 items-center">
                                    <h4 class="text-2xl font-serif font-bold text-slate-900">Direct Contact Details</h4>
                                    <span
                                        class="px-2 py-0.5 bg-blue-50 text-blue-600 text-[9px] font-bold uppercase rounded-full">Section
                                        3</span>
                                </div>
                                <button type="button" onclick="toggleSection(this)"
                                    class="p-2 hover:bg-slate-100 rounded-lg transition-all transform -rotate-90"
                                    data-target="contact-direct-body">
                                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                            </div>
                            <div id="contact-direct-body" class="cms-section-body hidden pt-8 border-t border-slate-50">
                                <div class="grid lg:grid-cols-3 gap-6">
                                    <div>
                                        <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Primary
                                            Phone</label>
                                        <input type="text" name="content[contact.phone]"
                                            value="<?php echo e($content['contact.phone']->value ?? '+254 721 485 244'); ?>"
                                            class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl text-sm">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Public
                                            Email</label>
                                        <input type="email" name="content[contact.email]"
                                            value="<?php echo e($content['contact.email']->value ?? 'omongeadero@gmail.com'); ?>"
                                            class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl text-sm">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Office
                                            Location</label>
                                        <input type="text" name="content[contact.location]"
                                            value="<?php echo e($content['contact.location']->value ?? 'Nairobi, Kenya'); ?>"
                                            class="w-full p-3 bg-slate-50 border border-slate-100 rounded-xl text-sm">
                                    </div>
                                </div>
                                <div class="mt-8 pt-8 border-t border-slate-50">
                                    <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Social Booking Link
                                        (Calendly)</label>
                                    <input type="text" name="content[general.booking_url]"
                                        value="<?php echo e($content['general.booking_url']->value ?? 'https://calendly.com/aderofrank401/30min'); ?>"
                                        class="w-full p-3 bg-blue-50/50 border border-blue-100 rounded-xl text-sm text-blue-600 font-medium">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Add other page sections similarly -->
                </div>
            </div>
    </div>
    </form>
    <!-- External Dependencies (Loaded first for custom scripts) -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script>
            // Ensure jQuery works for custom scripts bel       ow
            const $ = jQuery;
        </script>

        <script>
            function switchMainTab(tab) {
                document.querySelectorAll('.main-tab-content').forEach(t => t.classList.add('hidden'));
                document.querySelectorAll('.main-tab-btn').forEach(b => {
                    b.classList.remove('active', 'border-slate-900', 'text-slate-900');
                    b.classList.add('border-transparent', 'text-slate-400');
                });

                document.getElementById('tab-' + tab).classList.remove('hidden');
                
                // Fix for event context in switchMainTab
                const btn = event.currentTarget;
                btn.classList.add('active', 'border-slate-900', 'text-slate-900');
                btn.classList.remove('border-transparent', 'text-slate-400');
            }

            function toggleSection(btn) {
                const targetId = btn.getAttribute('data-target');
                const target = document.getElementById(targetId);
                const isHidden = target.classList.contains('hidden');

                if (isHidden) {
                    target.classList.remove('hidden');
                    btn.classList.add('rotate-0');
                    btn.classList.remove('-rotate-90');
                } else {
                    target.classList.add('hidden');
                    btn.classList.remove('rotate-0');
                    btn.classList.add('-rotate-90');
                }
            }

            function switchPage(page) {
                document.querySelectorAll('.page-content').forEach(p => p.classList.remove('active'));
                document.querySelectorAll('.page-tab-btn').forEach(b => {
                    b.classList.remove('active', 'bg-slate-100', 'text-slate-600');
                    b.classList.add('bg-slate-50', 'text-slate-400');
                });

                document.getElementById('page-' + page).classList.add('active');
                event.currentTarget.classList.add('active', 'bg-slate-100', 'text-slate-600');
            }

            // --- Experience List Manager ---
            <?php
                $expDefaults = [
                    ['period' => '2023 - Present', 'title' => 'Senior Associate Advocate', 'company' => 'Ochieng & Associates', 'desc' => 'Leading the corporate litigation department, overseeing complex merger disputes and high-value commercial arbitration. Successfully negotiated settlements totaling over $2M in 2023 alone.'],
                    ['period' => '2021 - 2023', 'title' => 'Associate Advocate', 'company' => 'Mutuso Dhahabu & Co. Advocates', 'desc' => 'Specialized in Family Law and Civil Litigation. Managed a verified caseload of 40+ active files, appearing before the High Court and Court of Appeal routinely.'],
                    ['period' => '2020 - 2021', 'title' => 'Legal Trainee', 'company' => 'Kenya School of Law', 'desc' => 'Completed pupillage with distinction. Drafted pleadings, legal opinions, and conducted extensive legal research on constitutional matters.']
                ];
                $eduDefaults = [
                    ['degree' => 'Post Graduate Diploma', 'institution' => 'Kenya School of Law', 'year' => '2021', 'desc' => 'ATP (Advocates Training Programme) completion with honors.'],
                    ['degree' => 'Bachelor of Laws (LL.B)', 'institution' => 'University of Nairobi', 'year' => '2019', 'desc' => 'Second Class Honors (Upper Division). Specialization in Commercial Law.']
                ];
                $practiceDefaults = [
                    ['title' => 'Corporate Law', 'icon' => 'Building', 'desc' => 'Company formation, contracts, compliance, and commercial transactions.'],
                    ['title' => 'Civil Litigation', 'icon' => 'Gavel', 'desc' => 'Representation in disputes, contract enforcement, and courtroom advocacy.'],
                    ['title' => 'Family Law', 'icon' => 'Users', 'desc' => 'Divorce, child custody, matrimonial property, and succession matters.']
                ];
                $achieveDefaults = [
                    ['number' => '2023', 'title' => 'Top litigator', 'desc' => 'Law Society of Kenya (Nairobi Branch)'],
                    ['number' => '50+', 'title' => 'Cases Won', 'desc' => 'High Court & Magistrates Court'],
                    ['number' => '98%', 'title' => 'Client Satisfaction', 'desc' => 'Based on exit surveys'],
                    ['number' => 'Pro', 'title' => 'Pro Bono Award', 'desc' => 'Service to Community']
                ];
                $philosophyDefaults = [
                    ['title' => 'Client-First Mentality', 'desc' => 'Every legal strategy is tailored to your specific needs, ensuring clear communication and absolute transparency at every stage of the process.', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>'],
                    ['title' => 'Relentless Diligence', 'desc' => 'Success in the courtroom is built on hours of research and preparation. I leave no stone unturned when building your case or negotiating on your behalf.', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>'],
                    ['title' => 'Result-Oriented Action', 'desc' => 'I focus on efficient, high-impact legal actions that move you closer to your goals, minimizing unnecessary delays and focusing on effective resolution.', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline><polyline points="16 7 22 7 22 13"></polyline></svg>']
                ];
                $highlightsDefaultsList = ['Over 50+ successful litigation outcomes', 'Expertise in Corporate & Commercial Arbitration', 'Dedicated Pro-Bono legal service contributor'];
                $statsDefaultsList = [
                    ['number' => '4+', 'label' => 'Years Practice'],
                    ['number' => '100%', 'label' => 'Dedication'],
                    ['number' => 'High', 'label' => 'Court Advocate'],
                    ['number' => '24/7', 'label' => 'Reliability']
                ];
            ?>

                        let experienceData = <?php echo json_encode(SiteContent::getValue('home.experience', $expDefaults), 512) ?>;
                        if (!Array.isArray(experienceData)) experienceData = <?php echo json_encode($expDefaults); ?>;

                        window.renderExperience = function () {
                            const container = document.getElementById('experience-list');
                            if (!container) return;
                            container.innerHTML = '';
                            experienceData.forEach((item, index) => {
                                const row = document.createElement('div');
                                row.className = 'p-8 bg-slate-50 rounded-2xl border border-slate-100 relative group';
                                row.innerHTML = `
                                        <button type="button" onclick="removeExperience(${index})" class="absolute top-6 right-6 text-slate-300 hover:text-red-500 transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                        <div class="grid gap-6 mt-2">
                                            <div class="grid grid-cols-2 gap-6">
                                                <div><label class="text-xs font-bold uppercase text-slate-400 mb-2 block">Period</label><input type="text" value="${item.period || ''}" oninput="updateExperience(${index}, 'period', this.value)" class="w-full p-3 bg-white border border-slate-200 rounded-lg text-sm"></div>
                                                <div><label class="text-xs font-bold uppercase text-slate-400 mb-2 block">Current Title</label><input type="text" value="${item.title || ''}" oninput="updateExperience(${index}, 'title', this.value)" class="w-full p-3 bg-white border border-slate-200 rounded-lg text-sm"></div>
                                            </div>
                                            <div><label class="text-xs font-bold uppercase text-slate-400 mb-2 block">Organization</label><input type="text" value="${item.company || ''}" oninput="updateExperience(${index}, 'company', this.value)" class="w-full p-3 bg-white border border-slate-200 rounded-lg text-sm"></div>
                                            <div><label class="text-xs font-bold uppercase text-slate-400 mb-2 block">Description</label><textarea oninput="updateExperience(${index}, 'desc', this.value)" class="w-full p-3 bg-white border border-slate-200 rounded-lg text-sm" rows="3">${item.desc || ''}</textarea></div>
                                        </div>`;
                                container.appendChild(row);
                            });
                            document.getElementById('experienceInput').value = JSON.stringify(experienceData);
                        };
                        window.addExperience = function () { experienceData.push({ period: '', title: '', company: '', desc: '' }); renderExperience(); };
                        window.removeExperience = function (i) { experienceData.splice(i, 1); renderExperience(); };
                        window.updateExperience = function (i, k, v) { experienceData[i][k] = v; document.getElementById('experienceInput').value = JSON.stringify(experienceData); };

                        // --- Education List Manager ---
                        let educationData = <?php echo json_encode(SiteContent::getValue('home.education', $eduDefaults), 512) ?>;
                        if (!Array.isArray(educationData)) educationData = <?php echo json_encode($eduDefaults); ?>;

                        window.renderEducation = function () {
                            const container = document.getElementById('education-list');
                            if (!container) return;
                            container.innerHTML = '';
                            educationData.forEach((item, index) => {
                                const row = document.createElement('div');
                                row.className = 'p-8 bg-slate-50 rounded-2xl border border-slate-100 relative group';
                                row.innerHTML = `
                                        <button type="button" onclick="removeEducation(${index})" class="absolute top-6 right-6 text-slate-300 hover:text-red-500 transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                        <div class="grid gap-6 mt-2">
                                            <div><label class="text-xs font-bold uppercase text-slate-400 mb-2 block">Qualification</label><input type="text" value="${item.degree || ''}" oninput="updateEducation(${index}, 'degree', this.value)" class="w-full p-3 bg-white border border-slate-200 rounded-lg text-sm focus:ring-slate-900"></div>
                                            <div class="grid grid-cols-2 gap-6">
                                                <div><label class="text-xs font-bold uppercase text-slate-400 mb-2 block">Institution</label><input type="text" value="${item.institution || ''}" oninput="updateEducation(${index}, 'institution', this.value)" class="w-full p-3 bg-white border border-slate-200 rounded-lg text-sm focus:ring-slate-900"></div>
                                                <div><label class="text-xs font-bold uppercase text-slate-400 mb-2 block">Year</label><input type="text" value="${item.year || ''}" oninput="updateEducation(${index}, 'year', this.value)" class="w-full p-3 bg-white border border-slate-200 rounded-lg text-sm focus:ring-slate-900"></div>
                                            </div>
                                        </div>`;
                                container.appendChild(row);
                            });
                            document.getElementById('educationInput').value = JSON.stringify(educationData);
                        };
                        window.addEducation = function () { educationData.push({ degree: '', institution: '', year: '' }); renderEducation(); };
                        window.removeEducation = function (i) { educationData.splice(i, 1); renderEducation(); };
                        window.updateEducation = function (i, k, v) { educationData[i][k] = v; document.getElementById('educationInput').value = JSON.stringify(educationData); };

                        // --- Practice Areas Manager ---
                        let practiceAreasData = <?php echo json_encode(SiteContent::getValue('home.practice_areas', $practiceDefaults), 512) ?>;
                        if (!Array.isArray(practiceAreasData)) practiceAreasData = <?php echo json_encode($practiceDefaults); ?>;

                        window.renderPracticeAreas = function () {
                            const container = document.getElementById('practice-areas-list');
                            if (!container) return;
                            container.innerHTML = '';
                            practiceAreasData.forEach((item, index) => {
                                const row = document.createElement('div');
                                row.className = 'p-8 bg-white rounded-2xl border border-slate-100 relative group shadow-sm';
                                row.innerHTML = `
                                        <button type="button" onclick="removePracticeArea(${index})" class="absolute top-6 right-6 text-slate-300 hover:text-red-500 transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                        <div class="space-y-6 mt-2">
                                            <div>
                                                <label class="text-xs font-bold uppercase text-slate-400 mb-2 block">Icon Type</label>
                                                <select onchange="updatePracticeArea(${index}, 'icon', this.value)" class="w-full p-3 bg-slate-50 border border-slate-200 rounded-lg text-xs">
                                                    <option value="Building" ${item.icon === 'Building' ? 'selected' : '' }>Corporate</option>
                                                    <option value="Gavel" ${item.icon === 'Gavel' ? 'selected' : '' }>Litigation</option>
                                                    <option value="Users" ${item.icon === 'Users' ? 'selected' : '' }>Family</option>
                                                    <option value="Scale" ${item.icon === 'Scale' ? 'selected' : '' }>Justice</option>
                                                </select>
                                            </div>
                                            <div><label class="text-xs font-bold uppercase text-slate-400 mb-2 block">Service Name</label><input type="text" value="${item.title || ''}" oninput="updatePracticeArea(${index}, 'title', this.value)" class="w-full p-3 bg-slate-50 border border-slate-200 rounded-lg text-sm"></div>
                                            <div><label class="text-xs font-bold uppercase text-slate-400 mb-2 block">Description</label><textarea oninput="updatePracticeArea(${index}, 'desc', this.value)" class="w-full p-3 bg-slate-50 border border-slate-200 rounded-lg text-sm" rows="3">${item.desc || ''}</textarea></div>
                                        </div>`;
                                container.appendChild(row);
                            });
                            document.getElementById('practiceAreasInput').value = JSON.stringify(practiceAreasData);
                        };
                        window.addPracticeArea = function () { practiceAreasData.push({ title: '', icon: 'Scale', desc: '' }); renderPracticeAreas(); };
                        window.removePracticeArea = function (i) { practiceAreasData.splice(i, 1); renderPracticeAreas(); };
                        window.updatePracticeArea = function (i, k, v) { practiceAreasData[i][k] = v; document.getElementById('practiceAreasInput').value = JSON.stringify(practiceAreasData); };

                        // --- Achievements Manager ---
                        let achievementsData = <?php echo json_encode(SiteContent::getValue('home.achievements', $achieveDefaults), 512) ?>;
                        if (!Array.isArray(achievementsData)) achievementsData = <?php echo json_encode($achieveDefaults); ?>;

                        window.renderAchievements = function() {
                            const container = document.getElementById('achievements-list');
                            if(!container) return;
                            container.innerHTML = '';
                            achievementsData.forEach((item, index) => {
                                const row = document.createElement('div');
                                row.className = 'p-8 bg-slate-50 rounded-2xl border border-slate-100 relative group';
                                row.innerHTML = `
                                    <button type="button" onclick="removeAchievement(${index})" class="absolute top-6 right-6 text-slate-300 hover:text-red-500 transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                    <div class="space-y-4 mt-2">
                                        <div><label class="text-xs font-bold uppercase text-slate-400 mb-2 block">Stat/Year</label><input type="text" value="${item.number || ''}" oninput="updateAchievement(${index}, 'number', this.value)" class="w-full p-3 bg-white border border-slate-200 rounded-lg text-sm font-serif text-blue-600"></div>
                                        <div><label class="text-xs font-bold uppercase text-slate-400 mb-2 block">Achievement Title</label><input type="text" value="${item.title || ''}" oninput="updateAchievement(${index}, 'title', this.value)" class="w-full p-3 bg-white border border-slate-200 rounded-lg text-sm"></div>
                                        <div><label class="text-xs font-bold uppercase text-slate-400 mb-2 block">Organization/Context</label><input type="text" value="${item.desc || ''}" oninput="updateAchievement(${index}, 'desc', this.value)" class="w-full p-3 bg-white border border-slate-200 rounded-lg text-xs"></div>
                                    </div>`;
                                container.appendChild(row);
                            });
                            document.getElementById('achievementsInput').value = JSON.stringify(achievementsData);
                        };
                        window.addAchievement = function() { achievementsData.push({number:'', title:'', desc:''}); renderAchievements(); };
                        window.removeAchievement = function(i) { achievementsData.splice(i, 1); renderAchievements(); };
                        window.updateAchievement = function(i, k, v) { achievementsData[i][k] = v; document.getElementById('achievementsInput').value = JSON.stringify(achievementsData); };

                        // --- Philosophy Items Manager ---
                        let philosophyData = <?php echo json_encode(SiteContent::getValue('about.philosophy.items', $philosophyDefaults), 512) ?>;
                        if (!Array.isArray(philosophyData)) philosophyData = <?php echo json_encode($philosophyDefaults); ?>;

                        window.renderPhilosophy = function() {
                            const container = document.getElementById('philosophy-items-list');
                            if(!container) return;
                            container.innerHTML = '';
                            philosophyData.forEach((item, index) => {
                                const row = document.createElement('div');
                                row.className = 'p-8 bg-slate-50 rounded-2xl border border-slate-100 relative group shadow-sm';
                                row.innerHTML = `
                                    <button type="button" onclick="removePhilosophyItem(${index})" class="absolute top-6 right-6 text-slate-300 hover:text-red-500 transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                    <div class="space-y-6">
                                        <div><label class="text-xs font-bold uppercase text-slate-400 mb-2 block">Pillar Title</label><input type="text" value="${item.title || ''}" oninput="updatePhilosophyItem(${index}, 'title', this.value)" class="w-full p-4 bg-white border border-slate-200 rounded-xl text-base"></div>
                                        <div><label class="text-xs font-bold uppercase text-slate-400 mb-2 block">Pillar Description</label><textarea oninput="updatePhilosophyItem(${index}, 'desc', this.value)" class="w-full p-4 bg-white border border-slate-200 rounded-xl text-base" rows="3">${item.desc || ''}</textarea></div>
                                        <div><label class="text-xs font-bold uppercase text-slate-400 mb-2 block">Icon SVG Code</label><textarea oninput="updatePhilosophyItem(${index}, 'icon', this.value)" class="w-full p-4 bg-white border border-slate-200 rounded-xl text-[10px] font-mono leading-relaxed" rows="2">${item.icon || ''}</textarea></div>
                                    </div>`;
                                container.appendChild(row);
                            });
                            document.getElementById('philosophyItemsInput').value = JSON.stringify(philosophyData);
                        };
                        window.addPhilosophyItem = function() { philosophyData.push({title:'', desc:'', icon:''}); renderPhilosophy(); };
                        window.removePhilosophyItem = function(i) { philosophyData.splice(i, 1); renderPhilosophy(); };
                        window.updatePhilosophyItem = function(i, k, v) { philosophyData[i][k] = v; document.getElementById('philosophyItemsInput').value = JSON.stringify(philosophyData); };

                        // --- Highlight Items Manager ---
                        let highlightsData = <?php echo json_encode(SiteContent::getValue('about.highlights.items', $highlightsDefaultsList), 512) ?>;
                        if (!Array.isArray(highlightsData)) highlightsData = <?php echo json_encode($highlightsDefaultsList); ?>;

                        window.renderHighlights = function() {
                            const container = document.getElementById('highlights-items-list');
                            if(!container) return;
                            container.innerHTML = '';
                            highlightsData.forEach((item, index) => {
                                const row = document.createElement('div');
                                row.className = 'flex items-center gap-4 bg-slate-50 p-4 rounded-xl border border-slate-100 group shadow-sm';
                                row.innerHTML = `
                                    <div class="w-2.5 h-2.5 bg-blue-600 rounded-full flex-shrink-0"></div>
                                    <input type="text" value="${item}" oninput="updateHighlightItem(${index}, this.value)" class="flex-1 bg-transparent border-none text-base p-0 focus:ring-0">
                                    <button type="button" onclick="removeHighlightItem(${index})" class="text-slate-300 hover:text-red-500 opacity-0 group-hover:opacity-100 transition-all p-1">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                    </button>`;
                                container.appendChild(row);
                            });
                            document.getElementById('highlightsItemsInput').value = JSON.stringify(highlightsData);
                        };
                        window.addHighlightItem = function() { highlightsData.push(''); renderHighlights(); };
                        window.removeHighlightItem = function(i) { highlightsData.splice(i, 1); renderHighlights(); };
                        window.updateHighlightItem = function(i, v) { highlightsData[i] = v; document.getElementById('highlightsItemsInput').value = JSON.stringify(highlightsData); };

                        // --- Stats grid Manager ---
                        let statsData = <?php echo json_encode(SiteContent::getValue('about.stats.items', $statsDefaultsList), 512) ?>;
                        if (!Array.isArray(statsData)) statsData = <?php echo json_encode($statsDefaultsList); ?>;

                        window.renderStats = function() {
                            const container = document.getElementById('stats-items-list');
                            if(!container) return;
                            container.innerHTML = '';
                            statsData.forEach((item, index) => {
                                const row = document.createElement('div');
                                row.className = 'p-5 bg-slate-50 rounded-2xl border border-slate-100 relative shadow-sm';
                                row.innerHTML = `
                                    <div class="space-y-3">
                                        <div><label class="text-[10px] font-bold uppercase text-slate-400 block mb-1">Stat Number</label><input type="text" value="${item.number || ''}" oninput="updateStatItem(${index}, 'number', this.value)" class="w-full p-3 bg-white border border-slate-200 rounded-xl text-base font-bold text-blue-600"></div>
                                        <div><label class="text-[10px] font-bold uppercase text-slate-400 block mb-1">Stat Label</label><input type="text" value="${item.label || ''}" oninput="updateStatItem(${index}, 'label', this.value)" class="w-full p-3 bg-white border border-slate-200 rounded-xl text-xs"></div>
                                    </div>`;
                                container.appendChild(row);
                            });
                            document.getElementById('statsItemsInput').value = JSON.stringify(statsData);
                        };
                        window.updateStatItem = function(i, k, v) { statsData[i][k] = v; document.getElementById('statsItemsInput').value = JSON.stringify(statsData); };

                        $(document).ready(function () {
                            renderExperience();
                            renderEducation();
                            renderPracticeAreas();
                            renderAchievements();
                            renderPhilosophy();
                            renderHighlights();
                            renderStats();

                            $('.summernote').summernote({
                                height: 300,
                                placeholder: 'Start writing here...',
                                toolbar: [
                                    ['style', ['style']],
                                    ['font', ['bold', 'underline', 'clear']],
                                    ['color', ['color']],
                                    ['para', ['ul', 'ol', 'paragraph']],
                                    ['insert', ['link']],
                                    ['view', ['fullscreen', 'codeview']]
                                ]
                            });
                        });

                    </script>

                    <style>
                        .page-content {
                            display: none;
                        }

                        .page-content.active {
                            display: flex;
                            flex-direction: column;
                        }
                    </style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>