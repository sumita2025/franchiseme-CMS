@extends('frontend.master-new')

@section('content')
<div class="topbar">
    <section class="contactus_Section pagetitle" @if($contact && $contact->background_image) 
        style="background-image: url('{{ asset('storage/'.$contact->background_image) }}')" @endif>
        <div class="container-fluid px-5">
            <div class="container container_box position-relative">
                <h1 class="hero-title mb-3">
                    @if(app()->getLocale() == 'ar')
                        {!! $contact->page_title_ar ?? 'اتصل بنا' !!}
                    @else
                        {!! $contact->page_title ?? 'Contact Us' !!}
                    @endif
                </h1>
                <div class="breadcrumbs">
                    <a href="{{ route('index') }}">{{ app()->getLocale() == 'ar' ? 'الرئيسية' : 'Home' }}</a>
                    <p class="mb-0">{{ app()->getLocale() == 'ar' ? 'اتصل بنا' : 'Contact Us' }}</p>
                </div>
            </div>
        </div>
    </section>
</div>

<section class="section-container">
    <div class="container container_small">
        <div class="row g-3 g-md-4 g-lg-5">
            <!-- Left Section - Contact Info -->
            <div class="col-lg-6">
                <div>
                    <h2 class="title">
                        @if(app()->getLocale() == 'ar')
                            {!! $contact->title_ar ?? 'تواصل مع خبراء الفرنشايز الخاصين بنا' !!}
                        @else
                            {!! $contact->title ?? 'Get in Touch with Our Franchise Experts' !!}
                        @endif
                    </h2>
                    <div class="decription">
                        <p>
                            @if(app()->getLocale() == 'ar')
                                {!! $contact->description_ar ?? 'نحن هنا لدعم رحلتك في الفرنشايز.' !!}
                            @else
                                {!! $contact->description ?? 'We\'re here to support your journey in franchising.' !!}
                            @endif
                        </p>
                    </div>
                    <div class="row g-4 my-3 my-md-4">
                        <!-- Phone -->
                        <div class="col-md-6">
                            <h4 class="sub_title mb-2">
                                @if(app()->getLocale() == 'ar')
                                    {!! $contact->phone_text_ar ?? 'الهاتف' !!}
                                @else
                                    {!! $contact->phone_text ?? 'Phone' !!}
                                @endif
                            </h4>
                            <div class="decription">
                                <!-- <a href="tel:{{ $contact->phone_value ?? '+1 840 841 25 69' }}" class="mb-0"> -->
                                <p class="mb-0">
                                    @if(app()->getLocale() == 'ar')
                                        {!! $contact->phone_value_ar ?? $contact->phone_value ?? '+1 840 841 25 69' !!}
                                    @else
                                        {!! $contact->phone_value ?? '+1 840 841 25 69' !!}
                                    @endif
                                </p>
                                <!-- </a> -->
                            </div>
                        </div>

                        <!-- WhatsApp -->
                        <div class="col-md-6">
                            <h4 class="sub_title mb-2">
                                @if(app()->getLocale() == 'ar')
                                    {!! $contact->whatsapp_text_ar ?? 'واتس آب' !!}
                                @else
                                    {!! $contact->whatsapp_text ?? 'WhatsApp' !!}
                                @endif
                            </h4>
                            <div class="decription">
                                <!-- <a href="tel:{{ $contact->whatsapp_value ?? '+1 840 841 25 69' }}" class="mb-0"> -->
                                <a href="https://wa.me/+18408412569?text=Hello!" target="_blank" class="mb-0">
                                    @if(app()->getLocale() == 'ar')
                                        {!! $contact->whatsapp_value_ar ?? $contact->whatsapp_value ?? '+1 840 841 25 69' !!}
                                    @else
                                        {!! $contact->whatsapp_value ?? '+1 840 841 25 69' !!}
                                    @endif
                                </a>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="col-md-6">
                            <h4 class="sub_title mb-2">
                                @if(app()->getLocale() == 'ar')
                                    {!! $contact->email_text_ar ?? 'البريد الإلكتروني' !!}
                                @else
                                    {!! $contact->email_text ?? 'Email' !!}
                                @endif
                            </h4>
                            <div class="decription">
                                <a href="mailto:{{ $contact->email_value ?? 'info@franchiseme.com' }}" class="mb-0">
                                    @if(app()->getLocale() == 'ar')
                                        {!! $contact->email_value_ar ?? $contact->email_value ?? 'info@franchiseme.com' !!}
                                    @else
                                        {!! $contact->email_value ?? 'info@franchiseme.com' !!}
                                    @endif
                                </a>
                            </div>
                        </div>

                        <!-- Social Media -->
                        <div class="col-md-6">
                            <h4 class="sub_title mb-2">
                                @if(app()->getLocale() == 'ar')
                                    {!! $contact->social_media_text_ar ?? 'حسابات وسائل التواصل الاجتماعي' !!}
                                @else
                                    {!! $contact->social_media_text ?? 'Social Media Accounts' !!}
                                @endif
                            </h4>
                            <div class="d-flex social_links gap-4 decription">
                                @for ($i = 1; $i <= 5; $i++)
                                    @php
                                        $linkKey = 'social_link_' . $i;
                                        $urlKey = 'social_url_' . $i;
                                        $linkKeyAr = 'social_link_' . $i . '_ar';
                                        $urlKeyAr = 'social_url_' . $i . '_ar';

                                        $link = app()->getLocale() == 'ar' ? ($contact->$linkKeyAr ?? null) : ($contact->$linkKey ?? null);
                                        $url = app()->getLocale() == 'ar' ? ($contact->$urlKeyAr ?? null) : ($contact->$urlKey ?? null);
                                    @endphp

                                    @if(!empty($link) && !empty($url))
                                        <a href="{{ $url }}" target="_blank">
                                            {!! $link !!}
                                        </a>
                                    @endif
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Section - Contact Form -->
            <div class="col-lg-6">
                <div class="form_box contact_page_form" data-aos="fade-up">
                    <form id="contactForm">
                        @csrf
                        <input type="hidden" name="inquiry_type" id="inquiry_type" value="{{ request('type') }}">

                        <div class="row g-4">
                            <div class="col-md-12">
                                <input type="text" name="name" class="form-control" placeholder="{{ app()->getLocale() == 'ar' ? 'الاسم' : 'Name' }}" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control" placeholder="{{ app()->getLocale() == 'ar' ? 'بريد إلكتروني' : 'Email' }}" required>
                            </div>
                            <div class="col-md-6">
                                <input type="number" name="phone" class="form-control" placeholder="{{ app()->getLocale() == 'ar' ? 'رقم الهاتف' : 'Phone Number' }}" required>
                            </div>
                            <div class="col-md-12">
                                <select name="subject" class="form-control form-select ps-2" required>
                                    <option value="">
                                        @if(app()->getLocale() == 'ar')
                                            الموضوع
                                        @else
                                            Subject
                                        @endif
                                    </option>
                                    <option value="General Inquiry">
                                        @if(app()->getLocale() == 'ar')
                                            استفسار عام
                                        @else
                                            General Inquiry
                                        @endif
                                    </option>
                                    <option value="Franchise Consultation">
                                        @if(app()->getLocale() == 'ar')
                                            استشارة الفرنشايز
                                        @else
                                            Franchise Consultation
                                        @endif
                                    </option>
                                    <option value="Partnership">
                                        @if(app()->getLocale() == 'ar')
                                            شراكة
                                        @else
                                            Partnership
                                        @endif
                                    </option>
                                    <option value="Support">
                                        @if(app()->getLocale() == 'ar')
                                            دعم
                                        @else
                                            Support
                                        @endif
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <textarea name="message" class="form-control" placeholder="{{ app()->getLocale() == 'ar' ? 'الرسالة' : 'Message' }}" rows="3" required></textarea>
                            </div>
                            <div class="col-md-12 d-flex">
                                <button type="submit" class="button button_secoundary">
                                    {{ app()->getLocale() == 'ar' ? 'أرسل الرسالة' : 'Send Message' }}
                                </button>
                            </div>
                            <div class="col-md-12">
                                <div id="successMessage" class="alert alert-success d-none" role="alert">
                                    {{ app()->getLocale() == 'ar' ? 'شكرًا لتواصلك مع FranchiseME! سيتواصل فريقنا معك قريبًا.' : 'Thank you for contacting FranchiseME! Our team will get back to you shortly.' }}
                                </div>
                                <div id="errorMessage" class="alert alert-danger d-none" role="alert">
                                    {{ app()->getLocale() == 'ar' ? 'حدث خطأ ما. يُرجى المحاولة مرة أخرى.' : 'Something went wrong. Please try again.' }}
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section data-aos="zoom-in" class="map-container">
    <div class="container">
        @if($contact && $contact->map_embed)
            {!! $contact->map_embed !!}
        @else
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7243.595038896445!2d46.738512!3d24.802386!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2efd496c6fdc93%3A0xeabf6fe007f9dda1!2sFranchiseME!5e0!3m2!1sen!2sin!4v1758536250251!5m2!1sen!2sin" width="100%" height="540" style="border-radius:30px; -webkit-filter: grayscale(99%);" class="contact-map-iframe" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        @endif
    </div>
</section>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#contactForm').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: "{{ route('contact.store') }}" + "?type=" + $('#inquiry_type').val(),
            method: "POST",
            data: $(this).serialize(),
            success: function(response) {
                if (response.success) {
                    $('#successMessage').removeClass('d-none');
                    $('#errorMessage').addClass('d-none');
                    $('#contactForm')[0].reset();
                    
                    setTimeout(function() {
                        $('#successMessage').addClass('d-none');
                    }, 5000);
                }
            },
            error: function() {
                $('#errorMessage').removeClass('d-none');
                $('#successMessage').addClass('d-none');
                
                setTimeout(function() {
                    $('#errorMessage').addClass('d-none');
                }, 5000);
            }
        });
    });
</script>
@endsection
