<!doctype html>
<html lang="{{ $currentLocale ?? app()->getLocale() }}"
      dir="{{ $htmlDirection ?? (app()->getLocale() === 'ar' ? 'rtl' : 'ltr') }}"
      class="{{ $htmlClass ?? (app()->getLocale() === 'ar' ? 'rtl-mode' : 'ltr-mode') }}">
<!-- <html lang="{{ $appLocale ?? app()->getLocale() }}" dir="{{ $htmlDirection ?? (app()->getLocale() === 'ar' ? 'rtl' : 'ltr') }}"> -->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Franchise Me</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/image/favicon.png') }}">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        
        <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Light slider -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/css/lightslider.css" />

        <!-- Infinite slider -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">

        <!-- AOS -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    </head>
    <body>
        <header class="main_header position-absolute top-0 w-100 z-3">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg py-0 justify-content-between">
                    <a class="navbar-brand py-0 mx-0" href="{{ route('index') }}">
                        <img src="{{ asset('assets/image/logo.png') }}" alt="" class="img-fluid logo">
                    </a>
                    <div>
                        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                            <ul class="navbar-nav">
                                <!-- <li class="nav-item">
                                    <a class="nav-link text-white" data-en="Blog" data-ar="المدونة" href="">Blog</a>
                                </li> -->
                                <li class="nav-item">
                                    <a class="nav-link text-white {{ request()->routeIs('index') ? 'active' : '' }}" href="{{ route('index') }}">
                                        @if(app()->getLocale() == 'ar')
                                            الرئيسية
                                        @else
                                            Home
                                        @endif
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link text-white {{ request()->routeIs('blog') ? 'active' : '' }}" href="{{ route('blog') }}">
                                        @if(app()->getLocale() == 'ar')
                                            مدونة
                                        @else
                                            Blog
                                        @endif
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link text-white {{ request()->routeIs('service') ? 'active' : '' }}" href="{{ route('service') }}">
                                        @if(app()->getLocale() == 'ar')
                                            خدماتنا
                                        @else
                                            Our Services
                                        @endif
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link text-white {{ request()->routeIs('franchise') ? 'active' : '' }}" href="{{ route('franchise') }}">
                                        @if(app()->getLocale() == 'ar')
                                            استكشف فرص الامتياز التجاري
                                        @else
                                            Explore Franchise Opportunities
                                        @endif
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link text-white {{ request()->routeIs('faq-page') ? 'active' : '' }}" href="{{ route('faq-page') }}">
                                        @if(app()->getLocale() == 'ar')
                                            الأسئلة الشائعة
                                        @else
                                            FAQ
                                        @endif
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link text-white {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">
                                        @if(app()->getLocale() == 'ar')
                                            اتصل بنا
                                        @else
                                            Contact Us
                                        @endif
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    </div>
                    <div>
                        <!-- <a href="javascript:void(0);" class="button btn_primary" id="changeLanguage">
                            <div class="btn_text" data-ar="English" data-en="عربي">عربي</div>
                        </a> -->
                        <a href="{{ route('change.language', app()->getLocale() == 'en' ? 'ar' : 'en') }}" class="button btn_primary">
                            <div class="btn_text">
                                {{ app()->getLocale() == 'en' ? 'عربي' : 'English' }}
                            </div>
                        </a>
                    </div>
                </nav>
            </div>
        </header>

        @yield('content')

        <footer class="main_footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <a href="{{ route('index') }}" class="footer_logo">
                            <img src="{{ asset('assets/image/logo.png') }}" alt="" class="img-fluid">
                        </a>
                        <div class="contain my-3">
                            <p data-en="Empowering Brands for Sustainable Franchise Growth." data-ar="تمكين العلامات التجارية لتحقيق نمو مستدام للامتياز.">Empowering Brands for Sustainable Franchise Growth.</p>
                        </div>
                    </div>
                    <div class="col-lg col-12">
                        <h4 class="sub_title text-white mb-4" data-en="Quick Links" data-ar="روابط سريعة">Quick Links</h4>
                        <div class="d-flex flex-column gap-2 footer_links">
                            <a href="{{ route('index') }}" 
                            class="{{ request()->routeIs('index') ? 'active' : '' }}">
                                @if(app()->getLocale() == 'ar')
                                    الرئيسية
                                @else
                                    Home
                                @endif
                            </a>

                            <a href="{{ route('service') }}" 
                            class="{{ request()->routeIs('service*') ? 'active' : '' }}">
                                @if(app()->getLocale() == 'ar')
                                    خدماتنا
                                @else
                                    Our Services
                                @endif
                            </a>

                            <a href="{{ route('franchise') }}" 
                            class="{{ request()->routeIs('franchise*') ? 'active' : '' }}">
                                @if(app()->getLocale() == 'ar')
                                    استكشف فرص الامتياز التجاري
                                @else
                                    Explore Franchise Opportunities
                                @endif
                            </a>

                            <a href="{{ route('faq-page') }}" 
                            class="{{ request()->routeIs('faq-page*') ? 'active' : '' }}">
                                @if(app()->getLocale() == 'ar')
                                    الأسئلة الشائعة
                                @else
                                    FAQ
                                @endif
                            </a>
                        </div>
                    </div>
                    <div class="col-lg col-12">
                        <h4 class="sub_title text-white mb-4" data-en="Connect With Us" data-ar="تواصل معنا">Connect With Us</h4>
                        <div class="d-flex flex-column gap-2 footer_links">
                            <a href="https://www.instagram.com/franchiseme_ksa/" target="_blank">
                                Instagram
                            </a>
                            <a href="https://www.linkedin.com/company/franchiseme/" target="_blank">
                                LinkedIn
                            </a>
                            <a href="https://x.com/FranchiseME24" target="_blank">
                                X
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3621.8019800121297!2d46.7385495!3d24.802233299999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2efd2e0de1c587%3A0x71491deac9b1ed8d!2z2YHYsdmG2LTYp9mK2LLZhdmKIHwgRnJhbmNoaXNlTUU!5e0!3m2!1sen!2sin!4v1761887205665!5m2!1sen!2sin" width="100%" height="270" style="-webkit-filter: grayscale(99%);" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="rounded-4"></iframe>
                    </div>
                </div>
                <div class="copy_right contain text-center d-flex flex-wrap justify-content-center gap-2">
                    <p class="mb-0" data-en="Copyright ©" data-ar="حقوق النشر ©">Copyright ©</p>
                    <p class="mb-0"><span id="currentYear"></span></p>
                    <p class="mb-0" data-en="FranchiseME - All Rights Reserved. Powered by:" data-ar="فرانشايز مي - جميع الحقوق محفوظة. تم التطوير بواسطة:">FranchiseME - All Rights Reserved. Powered by:</p>
                    <a href="https://shreedaconsulting.com/" target="_blank" class="text-white" data-en="Shreeda Consulting" data-ar="شريدا للاستشارات">Shreeda Consulting</a>
                </div>
            </div> 
        </footer>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

        <!-- Jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

        <script src="{{ asset('assets/js/custom.js') }}"></script>

        <!-- Light slider -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.min.js" ></script>

        <!-- AOS -->
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

        <!-- Infinite slider -->
        <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-auto-scroll@0.5.3/dist/js/splide-extension-auto-scroll.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#currentYear').text(new Date().getFullYear());
            });
        </script>

        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const counters = document.querySelectorAll(".counter_info");
                const speed = 300;

                const runCounter = (counter) => {
                    const updateCount = () => {
                        const target = +counter.getAttribute("data-target");
                        const count = +counter.innerText;
                        const inc = Math.ceil(target / speed);

                        if (count < target) {
                            counter.innerText = count + inc;
                            setTimeout(updateCount, 20);
                        } else {
                            counter.innerText = target + "+";
                        }
                    };
                    updateCount();
                };

                const observer = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            runCounter(entry.target);
                            observer.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.4 });

                counters.forEach(counter => {
                    observer.observe(counter);
                });
            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Wait a bit to ensure Blade finished rendering and Splide loaded
                setTimeout(() => {
                    if (typeof Splide === 'undefined') {
                        console.error('Splide JS not loaded. Include splide.min.js before this script.');
                        return;
                    }
            
                    const sliderElement = document.querySelector('.brand_logo_slider');
                    if (!sliderElement) {
                        console.error('brand_logo_slider not found in DOM.');
                        return;
                    }
            
                    try {
                        const splide = new Splide('.brand_logo_slider', {
                            perPage: 3,
                            type: 'loop',
                            pagination: false,
                            speed: 1,
                            arrows: false,
                            lazyLoad: "nearby",
                            drag: 'free',
                            focus: 'center',
                            gap: '20px',
                            direction: document.documentElement.getAttribute('dir') === 'rtl' ? 'rtl' : 'ltr',
                            autoScroll: {
                                pauseOnHover: true,
                                speed: 1,
                            },
                            mediaQuery: 'min',
                            breakpoints: {
                                1123: {
                                    perPage: 5,
                                    autoScroll: {
                                        speed: 1,
                                    },
                                    gap: '70px',
                                },
                            },
                        });
            
                        splide.on('ready', function () {
                            sliderElement.classList.add('is-active');
                        });
            
                        if (window.splide && window.splide.Extensions) {
                            splide.mount(window.splide.Extensions);
                        } else {
                            splide.mount();
                        }
            
                        console.log('Splide initialized successfully.');
            
                    } catch (error) {
                        console.error('Splide initialization error:', error);
                    }
                }, 200);
            });
        </script>

        <script>
            $(document).ready(function() {
                function initSlider() {
                    return $('#our_team_slider').lightSlider({
                        gallery: false,
                        item: 3,
                        loop: true,
                        auto: true,
                        slideMargin: 30,
                        thumbItem: 0,
                        controls: false,
                        rtl: $("html").attr("dir") === "rtl" // ✅ only check, not change
                    });
                }

                var slider = initSlider();
            });
        </script>

        <script>
            AOS.init({
                duration: 1500,
                once: false,
                offset: 100,
            });
        </script>

        <script>
            $(document).ready(function() {
                function initSlider() {
                    return $('#featuredSlider').lightSlider({
                        gallery: false,
                        item: 1,
                        loop: true,
                        auto: true,
                        slideMargin: 0,
                        thumbItem: 0,
                        controls: false,
                        rtl: $("html").attr("dir") === "rtl" // ✅ only check, not change
                    });
                }

                var slider = initSlider();

                $('.slideControls .slidePrev').click(function() {
                    slider.goToPrevSlide();
                });

                $('.slideControls .slideNext').click(function() {
                    slider.goToNextSlide();
                });

                $('#changeLanguage').click(function() {
                    slider.destroy();
                    slider = initSlider();
                });
            });
        </script>
        @yield('script')
    </body>
</html>