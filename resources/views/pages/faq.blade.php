@extends('layouts.site')

@section('title', 'Frequently Asked Questions - Lawyer in Nairobi | Omonge Adero')
@section('description', 'Common questions about legal services in Nairobi, Kenya. Get answers about hiring a lawyer, legal fees, court procedures, and more from Advocate Omonge Adero.')

@section('content')
    <!-- Header -->
    <header
        class="relative pt-32 pb-16 bg-gradient-to-br from-[#E0E7FF] to-[#F5F7FA] dark:from-slate-900 dark:to-slate-800">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">
            <h1 class="font-serif font-bold text-4xl sm:text-5xl md:text-6xl text-slate-900 dark:text-white mb-6">
                Legal FAQs
            </h1>
            <p class="text-lg sm:text-xl text-slate-600 dark:text-slate-300">
                Common questions about legal services in Nairobi, Kenya
            </p>
        </div>
    </header>

    <!-- FAQ Content -->
    <section class="py-20 bg-white dark:bg-slate-900">
        <div class="max-w-4xl mx-auto px-4 sm:px-6">
            @php
                $faqs = [
                    [
                        'category' => 'General Legal Services',
                        'questions' => [
                            [
                                'q' => 'How do I know if I need a lawyer?',
                                'a' => 'You should consider hiring a lawyer if you\'re involved in a legal dispute, need to draft or review contracts, are buying or selling property, going through a divorce, facing criminal charges, starting a business, or dealing with employment issues. A lawyer can provide expert guidance and protect your legal rights.'
                            ],
                            [
                                'q' => 'What areas of law do you practice in Nairobi?',
                                'a' => 'I specialize in Corporate Law, Family Law (including divorce and child custody), Civil Litigation, Property Law, Employment Law, Succession and Wills, and Contract Drafting. I serve clients throughout Nairobi including Westlands, Upper Hill, Kilimani, and the CBD.'
                            ],
                            [
                                'q' => 'How much do lawyer services cost in Nairobi?',
                                'a' => 'Legal fees vary depending on the complexity of your case, the time required, and the type of service. Some matters are charged hourly, while others may have a fixed fee. During your initial consultation, we\'ll discuss the expected costs and provide a transparent fee structure tailored to your needs.'
                            ],
                        ]
                    ],
                    [
                        'category' => 'Family Law',
                        'questions' => [
                            [
                                'q' => 'How long does a divorce take in Kenya?',
                                'a' => 'An uncontested divorce in Kenya typically takes 3-6 months, while a contested divorce can take 1-2 years or longer depending on the complexity and court schedule. Factors affecting the timeline include property division disputes, child custody arrangements, and whether both parties agree on terms.'
                            ],
                            [
                                'q' => 'What are the grounds for divorce in Kenya?',
                                'a' => 'In Kenya, the primary ground for divorce is the irretrievable breakdown of marriage, which can be proven through adultery, desertion for at least 3 years, cruelty (physical or mental), or voluntary separation for at least 2 years.'
                            ],
                        ]
                    ],
                    [
                        'category' => 'Property & Land Law',
                        'questions' => [
                            [
                                'q' => 'What is the land buying process in Kenya?',
                                'a' => 'The process involves: 1) Conducting a land search at the Ministry of Lands, 2) Verifying ownership and ensuring no encumbrances, 3) Negotiating terms and signing a sale agreement, 4) Paying stamp duty, 5) Lodging transfer documents at the Lands Office, and 6) Obtaining a new title deed. A lawyer should guide you through each step to avoid fraud and ensure proper documentation.'
                            ],
                            [
                                'q' => 'Do I need a lawyer for property transactions?',
                                'a' => 'Yes, it\'s highly recommended. A lawyer will conduct due diligence, verify the title deed, check for any charges or caveats, ensure proper valuation, draft or review the sale agreement, and facilitate the transfer process. This protects you from fraud and legal disputes.'
                            ],
                        ]
                    ],
                    [
                        'category' => 'Corporate & Business Law',
                        'questions' => [
                            [
                                'q' => 'How do I register a company in Kenya?',
                                'a' => 'Company registration involves reserving a name with the Registrar of Companies, preparing incorporation documents (Memorandum and Articles of Association), paying registration fees, and obtaining a certificate of incorporation. The process can take 7-14 days. A lawyer can handle this efficiently and ensure compliance with all legal requirements.'
                            ],
                            [
                                'q' => 'What legal documents does my business need?',
                                'a' => 'Essential documents include: Certificate of Registration/Incorporation, PIN Certificate, Business Permits/Licenses, Employment Contracts, Non-Disclosure Agreements, Client Contracts, Partnership/Shareholder Agreements, and Terms of Service. Requirements vary by business type and industry.'
                            ],
                        ]
                    ],
                ];
            @endphp

            @foreach($faqs as $section)
                <div class="mb-16">
                    <h2
                        class="font-serif font-bold text-2xl sm:text-3xl text-slate-900 dark:text-white mb-8 border-b-2 border-slate-200 dark:border-slate-700 pb-4">
                        {{ $section['category'] }}
                    </h2>

                    <div class="space-y-6">
                        @foreach($section['questions'] as $index => $faq)
                            <div class="bg-slate-50 dark:bg-slate-800 rounded-lg overflow-hidden">
                                <button
                                    class="w-full text-left p-6 flex justify-between items-start gap-4 hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors"
                                    onclick="toggleFaq(this)">
                                    <h3 class="font-bold text-lg text-slate-900 dark:text-white pr-4">
                                        {{ $faq['q'] }}
                                    </h3>
                                    <svg class="w-6 h-6 text-slate-500 flex-shrink-0 transform transition-transform duration-200"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                        </path>
                                    </svg>
                                </button>
                                <div class="faq-answer hidden px-6 pb-6">
                                    <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
                                        {{ $faq['a'] }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach

            <!-- CTA -->
            <div class="mt-16 bg-slate-900 text-white p-12 rounded-2xl text-center">
                <h2 class="font-serif font-bold text-3xl mb-4">Still Have Questions?</h2>
                <p class="text-slate-300 text-lg mb-8 max-w-2xl mx-auto">
                    Don't hesitate to reach out. Schedule a consultation and I'll be happy to discuss your legal matter.
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="{{ route('contact') }}"
                        class="px-8 py-4 bg-white text-slate-900 hover:bg-slate-100 transition-all text-sm font-bold uppercase tracking-widest rounded-lg">
                        Contact Us
                    </a>
                    <a href="tel:+254721485244"
                        class="px-8 py-4 bg-transparent border-2 border-white hover:bg-white hover:text-slate-900 transition-all text-sm font-bold uppercase tracking-widest rounded-lg">
                        Call +254 721 485 244
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Schema -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "FAQPage",
            "mainEntity": [
                @foreach($faqs as $section)
                    @foreach($section['questions'] as $faq)
                        {
                            "@type": "Question",
                            "name": "{{ $faq['q'] }}",
                            "acceptedAnswer": {
                                "@type": "Answer",
                                "text": "{{ $faq['a'] }}"
                            }
                        }{{ !$loop->parent->last || !$loop->last ? ',' : '' }}
                    @endforeach
                @endforeach
            ]
        }
        </script>

    <script>
        function toggleFaq(button) {
            const answer = button.nextElementSibling;
            const icon = button.querySelector('svg');
            const isOpen = !answer.classList.contains('hidden');

            if (isOpen) {
                answer.classList.add('hidden');
                icon.classList.remove('rotate-180');
            } else {
                answer.classList.remove('hidden');
                icon.classList.add('rotate-180');
            }
        }
    </script>
@endsection