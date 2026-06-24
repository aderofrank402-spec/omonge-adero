@php
    use App\Models\SiteContent;

    // Fetch styling configurations
    $primaryColor = SiteContent::getValue('style.global.primary_color', '#1e293b');
    $secondaryColor = SiteContent::getValue('style.global.secondary_color', '#334155');
    $accentColor = SiteContent::getValue('style.global.accent_color', '#2563eb');

    $fontSans = SiteContent::getValue('style.global.font_sans', 'Manrope');
    $fontSerif = SiteContent::getValue('style.global.font_serif', 'Playfair Display');

    $heroTitleSize = SiteContent::getValue('style.hero.title_size', '4.5rem');
    $heroDescSize = SiteContent::getValue('style.hero.desc_size', '1.125rem');
@endphp

<style id="dynamic-site-styles">
    :root {
        --primary-color:
            {{ $primaryColor }}
        ;
        --secondary-color:
            {{ $secondaryColor }}
        ;
        --accent-color:
            {{ $accentColor }}
        ;
        --font-sans: '{{ $fontSans }}', sans-serif;
        --font-serif: '{{ $fontSerif }}', serif;
        --hero-title-size:
            {{ $heroTitleSize }}
        ;
        --hero-desc-size:
            {{ $heroDescSize }}
        ;
    }

    /* Apply Global Fonts */
    body {
        font-family: var(--font-sans);
    }

    .font-serif {
        font-family: var(--font-serif);
    }

    /* Override Tailwind Classes with Dynamic Variables */
    .bg-slate-900 {
        background-color: var(--primary-color) !important;
    }

    .text-slate-900 {
        color: var(--primary-color) !important;
    }

    .border-slate-900 {
        border-color: var(--primary-color) !important;
    }

    .bg-blue-600 {
        background-color: var(--accent-color) !important;
    }

    .text-blue-600 {
        color: var(--accent-color) !important;
    }

    /* Hero Specific */
    #hero-title {
        font-size: var(--hero-title-size);
    }

    #hero-description {
        font-size: var(--hero-desc-size);
    }
</style>