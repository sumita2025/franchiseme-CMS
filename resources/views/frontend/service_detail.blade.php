@extends('frontend.master-new')

@section('content')

<!-- Page Title -->
<div class="topbar">
    <section class="contactus_Section pagetitle brand_detail">
        <div class="container-fluid px-5">
            <div class="container container_box position-relative">
                <a class="back_btn" href="{{ route('franchise') }}"><i class="fa fa-angle-left"></i> {{ app()->getLocale() == 'ar' ? 'رجوع' : 'Back' }}</a>
                <h1 class="hero-title">
                    {{-- @if(app()->getLocale() == 'ar')
                        {!! $franchise->title_ar ?? $franchise->title ?? 'Franchise Details' !!}
                    @else
                        {!! $franchise->title ?? 'Franchise Details' !!}
                    @endif --}}

                    <h1 class="hero-title">
                           @if(app()->getLocale() == 'ar') تفاصيل العلامة التجارية    @else Brand Detail  @endif
                    </h1>
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

        <!-- Service Feature Logo/Image -->
        @if($franchise && $franchise->feature_image)
            <img src="{{ asset($franchise->feature_image) }}" class="blog-cover-img" data-aos="zoom-in" alt="{{ app()->getLocale() == 'ar' ? $franchise->title_ar : $franchise->title }}" />
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
                            value="{{ old('full_name') }}"
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
                            value="{{ old('email') }}"
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
                            value="{{ old('phone_number') }}"
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
                            value="{{ old('country') }}"
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
                            value="{{ old('investment_range') }}"
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
                        >{{ old('message') }}</textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="col-md-12 d-flex">
                        <button type="submit" class="button button_secoundary">
                            {{ app()->getLocale() == 'ar' ? 'إرسال الرسالة' : 'Send Message' }}
                        </button>
                    </div>

                    <!-- Success & Error Messages -->
                    <div class="col-md-12">
                        <div id="successMessage" class="alert alert-success d-none" role="alert">
                            {{ app()->getLocale() == 'ar' ? 'شكرًا لاهتمامك! سيتواصل فريقنا معك قريبًا.' : 'Thank you for your interest! Our team will get back to you shortly.' }}
                        </div>
                        <div id="errorMessage" class="alert alert-danger d-none" role="alert">
                            {{ app()->getLocale() == 'ar' ? 'حدث خطأ ما. يُرجى المحاولة مرة أخرى.' : 'Something went wrong. Please try again.' }}
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
        $('#applicationForm').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: "{{ route('application.submit') }}",
                method: "POST",
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    console.log('Success response:', response);
                    $('#successMessage').removeClass('d-none');
                    $('#errorMessage').addClass('d-none');
                    $('#applicationForm')[0].reset();
                    
                    setTimeout(function() {
                        $('#successMessage').addClass('d-none');
                    }, 5000);
                },
                error: function(xhr, status, error) {
                    console.log('Error response:', xhr.responseJSON);
                    $('#errorMessage').removeClass('d-none');
                    $('#successMessage').addClass('d-none');
                    
                    setTimeout(function() {
                        $('#errorMessage').addClass('d-none');
                    }, 5000);
                }
            });
        });
    });
</script>
@endsection
