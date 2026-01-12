<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}" class="{{ app()->getLocale() === 'ar' ? 'rtl-mode' : 'ltr-mode' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    @php
        $site_title = app()->getLocale() === 'ar' ? get_setting('title_ar') : get_setting('title');
        $favicon = app()->getLocale() === 'ar' ? get_setting('favicon_logo_ar') : get_setting('favicon_logo');
        $site_logo = app()->getLocale() === 'ar' ? get_setting('header_logo_ar') : get_setting('header_logo');
    @endphp

    <title>{{ $site_title ?? 'FranchiseMe' }}</title>
    <link rel="icon" href="{{ asset($favicon ?? 'frontend/assest/favicon.png') }}" type="image/x-icon">

    <!-- CDN Links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('frontend/style/style.css') }}">

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Splide Slider -->
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-auto-scroll@0.5.3/dist/js/splide-extension-auto-scroll.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">

    <!-- lightSlider CSS and JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/css/lightslider.min.css" />

    <link rel="stylesheet" href="{{ asset('frontend/style/responsive.css') }}">

    @yield('style')
</head>
<body>

<!-- Header -->
<header id="siteHeader">
    <nav class="container">
        <div class="row nav-row align-items-center h-full">
            <!-- LOGO -->
            <div class="col-md-3 col-6 d-flex align-items-center">
                <a href="{{ route('index') }}">
                    <img src="{{ asset($site_logo ?? 'frontend/assest/logo.png') }}" class="nav-logo img-fluid header_logo" />
                </a>
            </div>

            <!-- CENTER MENU -->
            <div class="col-md-6 col-1  d-flex justify-content-center">
                <ul class="nav align-items-center d-none d-lg-flex">
                    <li class="nav-item">
                        <a href="{{ route('index') }}" class="nav-link fw-semibold nav-item-link {{ request()->routeIs('index') ? 'active' : '' }}">
                            {{ app()->getLocale() == 'ar' ? 'الرئيسية' : 'Home' }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('blog') }}" class="nav-link fw-semibold nav-item-link {{ request()->routeIs('blog*') ? 'active' : '' }}">
                            {{ app()->getLocale() == 'ar' ? 'المدونة' : 'Blog' }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('service') }}" class="nav-link fw-semibold nav-item-link {{ request()->routeIs('service*') ? 'active' : '' }}">
                            {{ app()->getLocale() == 'ar' ? 'خدماتنا' : 'Our Services' }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('franchise') }}" class="nav-link fw-semibold nav-item-link {{ request()->routeIs('franchise*') ? 'active' : '' }}">
                            {{ app()->getLocale() == 'ar' ? 'اكتشف الفرص' : 'Explore Opportunities' }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('faq-page') }}" class="nav-link fw-semibold nav-item-link {{ request()->routeIs('faq-page*') ? 'active' : '' }}">
                            {{ app()->getLocale() == 'ar' ? 'الأسئلة الشائعة' : 'FAQs' }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('contact') }}" class="nav-link fw-semibold nav-item-link {{ request()->routeIs('contact*') ? 'active' : '' }}">
                            {{ app()->getLocale() == 'ar' ? 'اتصل بنا' : 'Contact Us' }}
                        </a>
                    </li>
                </ul>
            </div>

            <!-- RIGHT BUTTON -->
            <div class="col-md-3 col-5 d-flex justify-content-end align-items-center gap-2">
                <a href="{{ route('change.language', app()->getLocale() == 'en' ? 'ar' : 'en') }}" class="button button_outline d-none d-lg-block">
                    {{ app()->getLocale() == 'ar' ? 'English' : 'عربي' }}
                </a>
                <button class="btn d-block d-lg-none" id="menu-btn"><i class="fa fa-bars"></i></button>
            </div>

            <!-- Mobile Menu -->
            <div class="bg-white position-absolute" id="mobile-menu">
                <ul class="nav">
                    <li class="nav-item">
                        <a href="{{ route('index') }}" class="nav-link fw-semibold nav-item-link">
                            {{ app()->getLocale() == 'ar' ? 'الرئيسية' : 'Home' }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('blog') }}" class="nav-link fw-semibold nav-item-link">
                            {{ app()->getLocale() == 'ar' ? 'المدونة' : 'Blog' }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('service') }}" class="nav-link fw-semibold nav-item-link">
                            {{ app()->getLocale() == 'ar' ? 'خدماتنا' : 'Our Services' }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('franchise') }}" class="nav-link fw-semibold nav-item-link">
                            {{ app()->getLocale() == 'ar' ? 'اكتشف الفرص' : 'Explore Opportunities' }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('faq-page') }}" class="nav-link fw-semibold nav-item-link">
                            {{ app()->getLocale() == 'ar' ? 'الأسئلة الشائعة' : 'FAQs' }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('contact') }}" class="nav-link fw-semibold nav-item-link">
                            {{ app()->getLocale() == 'ar' ? 'اتصل بنا' : 'Contact Us' }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('change.language', app()->getLocale() == 'en' ? 'ar' : 'en') }}" class="button button_outline">
                            {{ app()->getLocale() == 'ar' ? 'English' : 'يترجم' }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

@yield('content')

<!-- Footer Section -->
<footer data-aos="fade">
    <div class="container">
        <div class="row justify-content-between g-4">
            <div class="col-12 col-md-5 col-lg-4">
                <a href="{{ route('index') }}">
                    <img src="{{ asset($site_logo ?? 'frontend/assest/logo.png') }}" class="nav-logo footer_logo img-fluid" />
                </a>
                <div class="decription mt-3 mb-4">
                    <p>{{ app()->getLocale() == 'ar' ? 'تمكين العلامات التجارية لتحقيق نمو مستدام للامتياز.' : 'Empowering Brands for Sustainable Franchise Growth.' }}</p>
                </div>
                <div class="d-flex gap-3 icons footer_social_icons">
                    @php
                        $contact = \App\Models\PageContact::first();
                    @endphp
                    @for ($i = 1; $i <= 5; $i++)
                        @php
                            $iconKey = 'social_icon_image_' . $i;
                            $urlKey = 'social_url_' . $i;

                            $icon = $contact->$iconKey ?? null;
                            $url = $contact->$urlKey ?? null;
                        @endphp

                        @if(!empty($icon) && !empty($url))
                            <a href="{{ $url }}" target="_blank" class="social-btn">
                                <img src="{{ asset('storage/' . $icon) }}" alt="Social Icon {{ $i }}">
                            </a>
                        @endif
                    @endfor
                </div>
            </div>
    
            <div class="col-12 col-md-5 col-lg-4">
                <h3 class="sub_title">{{ app()->getLocale() == 'ar' ? 'روابط سريعة' : 'Quick Links' }}</h3>
                <ul class="list-unstyled ps-0 ms-0">
                    <li><a class="link {{ request()->routeIs('index') ? 'active' : '' }}" href="{{ route('index') }}">{{ app()->getLocale() == 'ar' ? 'الرئيسية' : 'Home' }}</a></li>
                    <li><a class="link {{ request()->routeIs('service*') ? 'active' : '' }}" href="{{ route('service') }}">{{ app()->getLocale() == 'ar' ? 'خدماتنا' : 'Our Services' }}</a></li>
                    <li><a class="link {{ request()->routeIs('franchise*') ? 'active' : '' }}" href="{{ route('franchise') }}">{{ app()->getLocale() == 'ar' ? 'اكتشف الفرص' : 'Explore Opportunities' }}</a></li>
                    <li><a class="link {{ request()->routeIs('faq-page*') ? 'active' : '' }}" href="{{ route('faq-page') }}">{{ app()->getLocale() == 'ar' ? 'الأسئلة الشائعة' : 'FAQs' }}</a></li>
                    <li><a class="link {{ request()->routeIs('blog*') ? 'active' : '' }}" href="{{ route('blog') }}">{{ app()->getLocale() == 'ar' ? 'المدونة' : 'Blog' }}</a></li>
                </ul>
            </div>

            <div class="maps-container col-12 col-lg-4">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3621.8019800121297!2d46.7385495!3d24.802233299999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2efd2e0de1c587%3A0x71491deac9b1ed8d!2z2YHYsdmG2LTYp9mK2LLZhdmKIHwgRnJhbmNoaXNlTUU!5e0!3m2!1sen!2sin!4v1761887205665!5m2!1sen!2sin" width="100%" height="270" style="-webkit-filter: grayscale(99%);" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="rounded-4"></iframe>
            </div>
        </div>

        <div class="footer-copyright">
            <div class="decription small">
                <p class="text-center">
                    @php
                        $copy_right_text = app()->getLocale() === 'ar' ? get_setting('copy_right_text_ar') : get_setting('copy_right_text');
                        $copy_right_link = app()->getLocale() === 'ar' ? get_setting('copy_right_link_ar') : get_setting('copy_right_link');
                    @endphp
                    {{ $copy_right_text ?? (app()->getLocale() == 'ar' ? 'جميع الحقوق محفوظة لشركة FranchiseME. تصميم:' : 'Copyright © 2026 FranchiseME - All Rights Reserved. Designed by:') }}
                    <a href="https://shreedaconsulting.com/" target="_blank">
                        {{ app()->getLocale() == 'ar' ? 'شريدا للاستشارات' : 'Shreeda Consulting' }}
                    </a>
                </p>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- lightSlider JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.min.js"></script>

<!-- AOS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<!-- Custom Scripts -->
<script src="{{ asset('frontend/jquery/custom.js') }}"></script>
<script src="{{ asset('frontend/scripts/responsive.js') }}"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        AOS.init({
            duration: 1500,
            once: false,
            offset: 100,
        });
    });

    // Mobile Menu Toggle
    document.getElementById('menu-btn').addEventListener('click', function() {
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('active');
    });
</script>

{{-- tooltip bs-5 --}}
<script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>
{{-- tooltip bs-5 --}}

@yield('script')

</body>
</html>
