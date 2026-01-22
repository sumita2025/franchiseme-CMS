@extends('frontend.master-new')

@section('content')

<!-- Page Title -->
<div class="topbar">
    <section class="contactus_Section pagetitle" @if($service && $service->background_image) style="background-image: url('{{ asset('storage/'.$service->background_image) }}')" @endif>
        <div class="container-fluid px-5">
            <div class="container container_box position-relative">
                <h1 class="hero-title mb-3">
                    @if(app()->getLocale() == 'ar')
                    {!! $service->title_ar ?? '' !!}
                    @else
                        {!! $service->title ?? '' !!}
                    @endif
               
                </h1>
                <div class="breadcrumbs">
                    <a href="{{ route('index') }}">{{ app()->getLocale() == 'ar' ? 'الرئيسية' : 'Home' }}</a>
                    <p class="mb-0">{{ app()->getLocale() == 'ar' ? 'الخدمات' : 'Services' }}</p>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Section Title -->
<section class="section_padding my-0 title_Sections position-relative">
    <div class="container">
        <h2 class="title mb-0 text-center" data-aos="fade-up">
            @if(app()->getLocale() == 'ar')
                {!! $service->description_ar ?? '' !!}
            @else
                {!! $service->description ?? '' !!}
            @endif
        </h2>
    </div>
</section>

<!-- Consultation Section -->
<section class="section_padding_half my-0" style="background: #f1f2f4;">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-7">
                <h2 class="title">
                    @if(app()->getLocale() == 'ar')
                        {!! $service->consultant_title_ar ?? '' !!}
                    @else
                        {!! $service->consultant_title ?? '' !!}
                    @endif
                </h2>
                <div class="decription">
                    <p>
                        @if(app()->getLocale() == 'ar')
                            {!! $service->consultant_description_ar ?? '' !!}
                        @else
                            {!! $service->consultant_description ?? '' !!}
                        @endif
                    </p>
                </div>
            </div>
            <div class="col-md-5 d-flex align-items-center justify-content-md-end">
                <a href="{{ route('contact', ['type' => 'consulting']) }}" class="button button_secoundary">
                    @if(app()->getLocale() == 'ar')
                        {!! $service->button_text_ar ?? '' !!}
                    @else
                        {!! $service->button_text ?? '' !!}
                    @endif
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Service List Section with Slider -->
<section>
    <div class="container">
        <div class="service_list_section">
            <div class="row g-0">
                <div class="col-md-4">
                    <div class="pe-md-5" data-aos="fade-right">
                        <h2 class="title">
                            @if(app()->getLocale() == 'ar')
                                {!! $service->package_section_title_ar ?? '' !!}
                            @else
                                {!! $service->package_section_title ?? '' !!}
                            @endif
                        </h2>
                        <div class="decription">
                            <p>
                                @if(app()->getLocale() == 'ar')
                                    {!! $service->package_section_description_ar ?? '' !!}
                                @else
                                    {!! $service->package_section_description ?? '' !!}
                                @endif
                            </p>
                        </div>
                        <!-- <a href="{{ route('contact') }}" class="button button_secoundary mt-4">
                            @if(app()->getLocale() == 'ar')
                                اقرأ المزيد
                            @else
                                Read More
                            @endif
                        </a> -->
                    </div>
                </div>
                <div class="col-md-8 mt-5 mt-md-0">
                    {{-- <div class="services_list d-flex gap-1" id="lightSlider">
                        @forelse($service_packages as $package)
                            <div class="sl_item">
                                <img src="{{ asset($package->image) }}" alt="{{ app()->getLocale() == 'ar' ? $package->title_ar : $package->title }}" class="img-fluid sli_img">
                                <h4 class="sub_title mb-2">
                                    @if(app()->getLocale() == 'ar')
                                        {!! $package->title_ar ?? '' !!}
                                    @else
                                        {!! $package->title ?? '' !!}
                                    @endif
                                </h4>
                                <div class="decription">
                                    <p>
                                        @if(app()->getLocale() == 'ar')
                                            {!! $package->description_ar ?? '' !!}
                                        @else
                                            {!! $package->description ?? '' !!}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        @empty
                            <div class="sl_item">
                                <p class="text-muted">{{ app()->getLocale() == 'ar' ? 'لا توجد حزم خدمات' : 'No service packages available' }}</p>
                            </div>
                        @endforelse
                    </div> --}}
                    <div class="services_slider">
    <div id="servicesSplide" class="splide">
        <div class="splide__track slider-track">
            <ul class="splide__list services_list">

                @forelse($service_packages as $package)
                    <li class="splide__slide">
                        <div class="sl_item">
                            <img src="{{ asset($package->image) }}"
                                 alt="{{ app()->getLocale() == 'ar' ? $package->title_ar : $package->title }}"
                                 class="img-fluid sli_img">

                            <h4 class="sub_title mb-2">
                                {{ app()->getLocale() == 'ar' ? $package->title_ar : $package->title }}
                            </h4>

                            <div class="decription">
                                <p>
                                    @if(app()->getLocale() == 'ar')
                                        {!! $package->description_ar ?? '' !!}
                                    @else
                                        {!! $package->description ?? '' !!}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </li>
                @empty
                    <li class="splide__slide">
                        <p class="text-muted">
                            {{ app()->getLocale() == 'ar' ? 'لا توجد حزم خدمات' : 'No service packages available' }}
                        </p>
                    </li>
                @endforelse

            </ul>
        </div>
    </div>
</div>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section_padding_half cta_contact position-relative my-0" style="background: #f1f7fa;">
    <div class="container z-3 position-relative">
        <div class="row g-4">
            <div class="col-md-8">
                <!-- <h2 class="title mb-0"> -->
                <h2 class="sub_title mb-0">
                    @if(app()->getLocale() == 'ar')
                        {!! $service->package_title_ar ?? '' !!}
                    @else
                        {!! $service->package_title ?? '' !!}
                    @endif
                </h2>
            </div>
            <div class="col-md-4 d-flex align-items-center justify-content-md-end" style="z-index: 100">
                <a href="{{ route('contact') }}" class="button">
                    @if(app()->getLocale() == 'ar')
                        {!! $service->package_button_text_ar ?? '' !!}
                    @else
                        {!! $service->package_button_text ?? '' !!}
                    @endif
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Training Services Section -->
<section class="mt-0 secound_servie position-relative">
    <div class="container container_small z-3 position-relative">
        <div class="row training_service">
            <div class="col-md-6">
                <img src="{{ asset('storage/'.$service->side_image ?? 'frontend/assest/missionimage.jpg') }}" alt="" class="img-fluid ss_img" data-aos="fade-up">
            </div>
            <div class="col-md-6 d-flex align-items-center g-4 g-md-5">
                <div class="pb-4">
                    <h2 class="title">
                        @if(app()->getLocale() == 'ar')
                            {!! $service->service_title_ar ?? '' !!}
                        @else
                            {!! $service->service_title ?? '' !!}
                        @endif
                    </h2>
                    <div class="decription">
                        <p>
                            @if(app()->getLocale() == 'ar')
                                {!! $service->service_description_ar ?? '' !!}
                            @else
                                {!! $service->service_description ?? '' !!}
                            @endif
                        </p>
                    </div>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#FranchiseTrainingServices" class="button button_secoundary mt-4">
                        @if(app()->getLocale() == 'ar')
                            {!! $service->service_button_text_ar ?? '' !!}
                        @else
                            {!! $service->service_button_text ?? '' !!}
                        @endif
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="FranchiseTrainingServices" data-bs-keyboard="false" tabindex="-1" aria-labelledby="FranchiseTrainingServicesTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
        <div class="modal-content br-30 position-relative">
            <button type="button" class="btn-close position-absolute top-0 end-0 me-4 mt-4 z-1" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body px-md-5 py-md-5">
                <div class="d-flex flex-wrap title_wrap mb-3 justify-content-center">
                    <h2 class="title mb-0">
                        {{ app()->getLocale() == 'ar' ? 'نموذج' : 'Application' }}
                        <span>{{ app()->getLocale() == 'ar' ? 'التقديم' : 'Form' }}</span>
                    </h2>
                </div>
                <div class="contact_section form_box bg-transparent p-0">
                    <form id="serviceForm">
                        @csrf
                        <div class="row g-4">
                            <div class="col-md-12">
                                <input type="text" name="full_name" class="form-control" placeholder="@if(app()->getLocale() == 'ar') الاسم الكامل @else Full Name @endif*" data-en="Full Name *" data-ar="الاسم الكامل *" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control" placeholder="@if(app()->getLocale() == 'ar') بريد إلكتروني @else Email @endif*" data-en="Email *" data-ar="البريد الإلكتروني *" required>
                                <small class="text-danger email-error d-none"></small>
                            </div>
                            <div class="col-md-6">
                                <input type="number" name="phone_number" class="form-control" placeholder="@if(app()->getLocale() == 'ar') رقم الهاتف @else Phone Number @endif*" data-en="Phone Number *" data-ar="رقم الهاتف *" required>
                            </div>
                            <div class="col-md-12">
                                <input type="text" name="brand_name" class="form-control" placeholder="@if(app()->getLocale() == 'ar') اسم العلامة التجارية (اختياري) @else Brand Name (optional) @endif" data-en="Brand Name (optional)" data-ar="اسم العلامة التجارية (اختياري)">
                            </div>
                            <div class="col-md-12">
                                <textarea name="message" class="form-control" placeholder="@if(app()->getLocale() == 'ar') الرسالة / ملاحظات إضافية @else Message / Additional Notes @endif*" rows="3" data-en="Message / Additional Notes *" data-ar="الرسالة / ملاحظات إضافية *" required></textarea>
                            </div>
                            <div class="col-md-12 d-flex">
                                <a href="javascript:void(0);" class="button btn_secoundry">
                                    <div class="btn_text" data-en="Send Message" data-ar="إرسال الرسالة">@if(app()->getLocale() == 'ar') أرسل رسالة @else Send Message @endif</div>
                                </a>
                            </div>
                        </div>
                        <div class="contain black d-none">
                            <p class="mt-3 mb-0 text-success" data-en="Thank you for contacting FranchiseME! Our team will get back to you shortly." data-ar="شكرًا لتواصلك مع FranchiseME! سيتواصل معك فريقنا قريبًا.">
                                @if(app()->getLocale() == 'ar')
                                    شكرًا لتواصلك مع FranchiseME! سيتواصل معك فريقنا قريبًا.
                                @else
                                    Thank you for contacting FranchiseME! Our team will get back to you shortly.
                                @endif
                            </p>
                        </div>
                        <div class="contain black d-none">
                            <p class="mt-3 mb-0 text-danger" data-en="Something went wrong. Please try again." data-ar="حدث خطأ ما. يُرجى المحاولة مرة أخرى.">
                                @if(app()->getLocale() == 'ar')
                                    حدث خطأ ما. يُرجى المحاولة مرة أخرى.
                                @else
                                    Something went wrong. Please try again.
                                @endif
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/css/lightslider.css" />
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialize lightSlider for service packages
        $('#lightSlider').lightSlider({
            gallery: false,
            item: 3,
            auto: true,
            loop: true,
            slideMargin: 0,
            thumbItem: 0,
            rtl: {{ app()->getLocale() == 'ar' ? 'true' : 'false' }},
            responsive: [
                {
                    breakpoint: 1440,
                    settings: {
                        item: 3
                    }
                },
                {
                    breakpoint: 1024,
                    settings: {
                        item: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        item: 1
                    }
                }
            ]
        });

        // Modal form submission
        $('.btn_secoundry').on('click', function(e) {
            e.preventDefault();
            let form = $(this).closest('form');
            
            // Clear previous errors
            form.find('.email-error').addClass('d-none').text('');
            form.find('input[name="email"]').removeClass('is-invalid');
            
            // Validate email format
            let email = form.find('input[name="email"]').val();
            let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            let currentLang = document.documentElement.lang || 'en';
            
            if (!emailRegex.test(email)) {
                let errorMsg = currentLang === 'ar' 
                    ? 'يجب أن يكون حقل البريد الإلكتروني عنوان بريد إلكتروني صحيح.'
                    : 'The email field must be a valid email address.';
                form.find('.email-error').text(errorMsg).removeClass('d-none');
                form.find('input[name="email"]').addClass('is-invalid');
                return false;
            }
            
            // Get form data using FormData
            let formData = new FormData(form[0]);

            $.ajax({
                url: "{{ route('contact.submit') }}",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        form.find('.text-success').parent().removeClass('d-none');
                        form.find('.text-danger').parent().addClass('d-none');
                        form[0].reset();
                    }
                },
                error: function(xhr) {
                    form.find('.text-danger').parent().removeClass('d-none');
                    form.find('.text-success').parent().addClass('d-none');
                    
                    // Handle validation errors from server
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        let errors = xhr.responseJSON.errors;
                        
                        // Display email validation error if it exists
                        if (errors.email) {
                            form.find('input[name="email"]').addClass('is-invalid');
                            form.find('.email-error').text(errors.email[0]).removeClass('d-none');
                        }
                        
                        console.log('Validation errors:', errors);
                    }
                }
            });
        });
    });
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    new Splide('#servicesSplide', {
        type       : 'loop',
        perPage    : 3,
        perMove    : 1,
        gap        : '6px',
        arrows     : false,
        pagination : false,
        autoplay   : true,
        interval   : 3000,
        pauseOnHover: true,
        direction  : '{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}',

        breakpoints: {
            1024: {
                perPage: 2,
            },
            576: {
                perPage: 1,
            },
        },

    }).mount();
});
</script>

@endsection
