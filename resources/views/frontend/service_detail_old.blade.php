@extends('frontend.master-new')

@section('content')

<!-- Page Title -->
<div class="topbar">
    <section class="contactus_Section pagetitle">
        <div class="container-fluid px-5">
            <div class="container container_box position-relative">
                <a class="back_btn" href="{{ route('franchise') }}"><i class="fa fa-angle-left"></i> {{ app()->getLocale() == 'ar' ? 'رجوع' : 'Back' }}</a>
                <h1 class="hero-title">
                    @if(app()->getLocale() == 'ar')
                        {!! $franchise->title_ar ?? $franchise->title ?? 'Franchise Details' !!}
                    @else
                        {!! $franchise->title ?? 'Franchise Details' !!}
                    @endif
                </h1>
                <div class="breadcrumbs">
                    <a href="{{ route('index') }}">{{ app()->getLocale() == 'ar' ? 'الرئيسية' : 'Home' }}</a>
                    <p class="mb-0">{{ app()->getLocale() == 'ar' ? 'الفرنشايز' : 'Franchise' }}</p>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Franchise Details Section -->
<section class="blog-section">
    <div class="container">
        <div class="text-center content-header">
            <h1 class="title">
                @if(app()->getLocale() == 'ar')
                    {!! $franchise->title_ar ?? $franchise->title ?? '' !!}
                @else
                    {!! $franchise->title ?? '' !!}
                @endif
            </h1>
        </div>

        <!-- Service Logo/Image -->
        @if($franchise && $franchise->logo)
            <img src="{{ asset($franchise->logo) }}" class="blog-cover-img" data-aos="zoom-in" alt="{{ app()->getLocale() == 'ar' ? $franchise->title_ar : $franchise->title }}" />
        @endif

        <!-- Service Details Info -->
        <div class="blog-detail-container" data-aos="fade-up">
            <div class="row">
                <div class="col-md-4">
                    <div class="d-flex gap-2 align-items-center">
                        <i class="fa-regular fa-calendar blog-detail-cal-icon"></i>
                        <span class="blog-detail-date">
                            @if(app()->getLocale() == 'ar')
                                {!! $franchise->sector_ar ?? '' !!}
                            @else
                                {!! $franchise->sector ?? '' !!}
                            @endif
                        </span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex gap-2 align-items-center">
                        <i class="fa-regular fa-calendar blog-detail-cal-icon"></i>
                        <span class="blog-detail-date">
                            @if(app()->getLocale() == 'ar')
                                {!! $franchise->investment_level_ar ?? '' !!}
                            @else
                                {!! $franchise->investment_level ?? '' !!}
                            @endif
                        </span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex gap-2 align-items-center">
                        <i class="fa-regular fa-calendar blog-detail-cal-icon"></i>
                        <span class="blog-detail-date">
                            @if(app()->getLocale() == 'ar')
                                {!! $franchise->country_ar ?? '' !!}
                            @else
                                {!! $franchise->country ?? '' !!}
                            @endif
                        </span>
                    </div>
                </div>
            </div>

            <!-- Service Description -->
            <div class="blog-detail-content">
                @if($franchise && ($franchise->description || $franchise->description_ar))
                    @if(app()->getLocale() == 'ar')
                        {!! $franchise->description_ar ?? '' !!}
                    @else
                        {!! $franchise->description ?? '' !!}
                    @endif
                @else
                    <p class="text-muted">{{ app()->getLocale() == 'ar' ? 'لا تتوفر تفاصيل متاحة حالياً' : 'No details available at the moment' }}</p>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Application Form Section -->
<section>
    <div class="container container_small">
        <div class="text-center mb-4">
            <h2 class="title franchise-form-title">
                {{ app()->getLocale() == 'ar' ? 'نموذج' : 'Application' }} 
                <span class="yellow">{{ app()->getLocale() == 'ar' ? 'التقديم' : 'Form' }}</span>
            </h2>
            <div class="decription">
                <p>{{ app()->getLocale() == 'ar' ? 'يتيح للمستثمرين التقدم بطلب للحصول على فرصة الامتياز بشكل مباشر.' : 'Allows investors to apply for a franchise opportunity directly.' }}</p>
            </div>
        </div>

        <div class="form_box franchise_form_box" data-aos="fade-up">
            <form id="applicationForm">
                @csrf
                <div class="row g-4">
                    <!-- Full Name -->
                    <div class="col-md-12">
                        <input 
                            type="text" 
                            class="form-control" 
                            placeholder="{{ app()->getLocale() == 'ar' ? 'الاسم الكامل' : 'Full Name' }}"
                            name="full_name"
                            required
                        >
                    </div>

                    <!-- Email -->
                    <div class="col-md-6">
                        <input 
                            type="email" 
                            class="form-control" 
                            placeholder="{{ app()->getLocale() == 'ar' ? 'البريد الإلكتروني' : 'Email' }}"
                            name="email"
                            required
                        >
                    </div>

                    <!-- Phone Number -->
                    <div class="col-md-6">
                        <input 
                            type="tel" 
                            class="form-control" 
                            placeholder="{{ app()->getLocale() == 'ar' ? 'رقم الهاتف' : 'Phone Number' }}"
                            name="phone_number"
                            required
                        >
                    </div>

                    <!-- Country -->
                    <div class="col-md-12">
                        <input 
                            type="text" 
                            class="form-control" 
                            placeholder="{{ app()->getLocale() == 'ar' ? 'الدولة' : 'Country' }}"
                            name="country"
                            required
                        >
                    </div>

                    <!-- Brand (Readonly) -->
                    <div class="col-md-6">
                        <input 
                            type="text" 
                            class="form-control" 
                            value="{{ app()->getLocale() == 'ar' ? ($franchise->title_ar ?? $franchise->title ?? '') : ($franchise->title ?? '') }}"
                            readonly
                        >
                    </div>

                    <!-- Investment Range -->
                    <div class="col-md-6">
                        <input 
                            type="text" 
                            class="form-control" 
                            placeholder="{{ app()->getLocale() == 'ar' ? 'نطاق الاستثمار' : 'Investment Range' }}"
                            name="investment_range"
                        >
                    </div>

                    <!-- Message -->
                    <div class="col-md-12">
                        <textarea 
                            class="form-control" 
                            placeholder="{{ app()->getLocale() == 'ar' ? 'الرسالة' : 'Message' }}"
                            name="message"
                            rows="3"
                            required
                        ></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="col-md-12 d-flex">
                        <button type="submit" class="button button_secoundary">
                            {{ app()->getLocale() == 'ar' ? 'إرسال الرسالة' : 'Send Message' }}
                        </button>
                    </div>

                    <!-- Success Message -->
                    <div class="col-md-12">
                        <div id="successMessage" class="alert alert-success d-none" role="alert">
                            {{ app()->getLocale() == 'ar' ? 'شكراً لاهتمامك! سيتواصل معك فريقنا قريباً.' : 'Thank you for your interest! Our team will contact you soon.' }}
                        </div>
                    </div>

                    <!-- Error Message -->
                    <div class="col-md-12">
                        <div id="errorMessage" class="alert alert-danger d-none" role="alert">
                            {{ app()->getLocale() == 'ar' ? 'حدث خطأ. يرجى المحاولة مرة أخرى.' : 'Something went wrong. Please try again.' }}
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Application Form AJAX Submission
        $('#applicationForm').on('submit', function(e) {
            e.preventDefault();

            let form = $(this);
            let formData = form.serialize();

            $.ajax({
                url: "{{ route('application.submit') }}",
                method: "POST",
                data: formData,
                success: function(response) {
                    if (response.success) {
                        // Show success message
                        $('#successMessage').removeClass('d-none');
                        $('#errorMessage').addClass('d-none');

                        // Reset form
                        form[0].reset();

                        // Auto-hide success message after 5 seconds
                        setTimeout(function() {
                            $('#successMessage').addClass('d-none');
                        }, 5000);
                    }
                },
                error: function(xhr) {
                    // Show error message
                    $('#errorMessage').removeClass('d-none');
                    $('#successMessage').addClass('d-none');

                    // Auto-hide error message after 5 seconds
                    setTimeout(function() {
                        $('#errorMessage').addClass('d-none');
                    }, 5000);
                }
            });
        });
    });
</script>
@endsection
