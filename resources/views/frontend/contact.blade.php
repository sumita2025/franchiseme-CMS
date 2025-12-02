@extends('frontend.master')

@section('content')
{{-- <section class="page_title position-relative my-0">
    <div class="container text-center d-flex flex-column align-items-center gap-3" data-aos="fade-up">
        <h1 class="text-white mb-0">
            <span>
                @if(app()->getLocale() == 'ar')
                    {!! $contact->page_title_ar ?? '' !!}
                @else
                    {!! $contact->page_title ?? '' !!}
                @endif
            </span>
        </h1>
    </div>
</section> --}}
<section class="page_title position-relative my-0"
         style="background-image: url('{{ asset('storage/'.$contact->background_image ?? 'default.jpg') }}'); 
                background-size: cover; 
                background-position: center; 
                background-repeat: no-repeat;">
    
    <div class="container text-center d-flex flex-column align-items-center gap-3" data-aos="fade-up">
        <h1 class="text-white mb-0">
            <span>
                @if(app()->getLocale() == 'ar')
                    {!! $contact->page_title_ar ?? '' !!}
                @else
                    {!! $contact->page_title ?? '' !!}
                @endif
            </span>
        </h1>
    </div>
</section>
<section class="contact_section">
    <div class="container">
        <div class="row mx-0">
            <div class="col-xl-6 ps-0 pe-4">
                <div class="pe-4 me-4">
                    <div class="mb-md-4">
                        <h2 class="title mb-0">
                            @if(app()->getLocale() == 'ar')
                                {!! $contact->title_ar ?? '' !!}
                            @else
                                {!! $contact->title ?? '' !!}
                            @endif
                        </h2>  
                    </div>
                    <div class="d-flex flex-column gap-3">
                        <div class="contain black">
                            <p class="mb-0">
                                @if(app()->getLocale() == 'ar')
                                    {!! $contact->description_ar ?? '' !!}
                                @else
                                    {!! $contact->description ?? '' !!}
                                @endif
                            </p>
                        </div>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <h4 class="sub_title mb-2">
                                    @if(app()->getLocale() == 'ar')
                                        {!! $contact->phone_text_ar ?? '' !!}
                                    @else
                                        {!! $contact->phone_text ?? '' !!}
                                    @endif
                                </h4>
                                <div class="contain black">
                                    <p class="mb-0">
                                        @if(app()->getLocale() == 'ar')
                                            {!! $contact->phone_value_ar ?? '' !!}
                                        @else
                                            {!! $contact->phone_value ?? '' !!}
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4 class="sub_title mb-2">
                                    @if(app()->getLocale() == 'ar')
                                        {!! $contact->whatsapp_text_ar ?? '' !!}
                                    @else
                                        {!! $contact->whatsapp_text ?? '' !!}
                                    @endif
                                </h4>
                                <div class="contain black">
                                    <p class="mb-0">
                                        @if(app()->getLocale() == 'ar')
                                            {!! $contact->whatsapp_value_ar ?? '' !!}
                                        @else
                                            {!! $contact->whatsapp_value ?? '' !!}
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h4 class="sub_title mb-2">
                                    @if(app()->getLocale() == 'ar')
                                        {!! $contact->email_text_ar ?? '' !!}
                                    @else
                                        {!! $contact->email_text ?? '' !!}
                                    @endif
                                </h4>
                                <div class="contain black">
                                    <a href="mailto:{!! $contact->email_value ?? '' !!}" class="mb-0">
                                        @if(app()->getLocale() == 'ar')
                                            {!! $contact->email_value_ar ?? '' !!}
                                        @else
                                            {!! $contact->email_value ?? '' !!}
                                        @endif
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <h4 class="sub_title mb-2">
                                @if(app()->getLocale() == 'ar')
                                    {!! $contact->social_media_text_ar ?? '' !!}
                                @else
                                    {!! $contact->social_media_text ?? '' !!}
                                @endif
                            </h4>
                            <div class="d-flex social_links gap-4">
                                <a href="https://www.instagram.com/franchiseme_ksa/" target="_blank">
                                    @if(app()->getLocale() == 'ar')
                                        {!! $contact->social_link_1_ar ?? '' !!}
                                    @else
                                        {!! $contact->social_link_1 ?? '' !!}
                                    @endif
                                </a>
                                <a href="https://www.linkedin.com/company/franchiseme/" target="_blank">
                                    @if(app()->getLocale() == 'ar')
                                        {!! $contact->social_link_2_ar ?? '' !!}
                                    @else
                                        {!! $contact->social_link_2 ?? '' !!}
                                    @endif
                                </a>
                                <a href="https://x.com/FranchiseME24" target="_blank">
                                    @if(app()->getLocale() == 'ar')
                                        {!! $contact->social_link_3_ar ?? '' !!}
                                    @else
                                        {!! $contact->social_link_3 ?? '' !!}
                                    @endif
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 px-0">
                <form id="contactForm">
                    @csrf
                    <input type="hidden" name="inquiry_type" id="inquiry_type" value="{{ request('type') }}">

                    <div class="row g-4">
                        <div class="col-md-12">
                            <input type="text" name="name" class="form-control" placeholder="@if(app()->getLocale() == 'ar') اسم @else Name @endif">
                        </div>
                        <div class="col-md-6">
                            <input type="email" name="email" class="form-control" placeholder="@if(app()->getLocale() == 'ar') بريد إلكتروني @else Email @endif">
                        </div>
                        <div class="col-md-6">
                            <input type="number" name="phone" class="form-control" placeholder="@if(app()->getLocale() == 'ar') رقم التليفون @else Phone Number @endif ">
                        </div>
                        <div class="col-md-12">
                            <select name="subject" class="form-control form-select ps-2">
                                {{-- <option value="">Subject</option>
                                <option value="General Inquiry">General Inquiry</option>
                                <option value="Franchise Consultation">Franchise Consultation</option>
                                <option value="Partnership">Partnership</option>
                                <option value="Support">Support</option> --}}
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
                            <textarea name="message" class="form-control" placeholder=" @if(app()->getLocale() == 'ar') رسالة @else Message @endif" rows="3"></textarea>
                        </div>
                        <div class="col-md-12 d-flex">
                            <button type="submit" class="button btn_secoundry border-0 bg-transparent p-0">
                                <div class="btn_text">@if(app()->getLocale() == 'ar') أرسل رسالة @else Send Message @endif</div>
                            </button>
                        </div>
                    </div>
                    <div class="contain black d-none">
                        <p class="mt-3 mb-0 text-success" data-en="Thank you for contacting FranchiseME! Our team will get back to you shortly." data-ar="شكرًا لتواصلك مع FranchiseME! سيتواصل معك فريقنا قريبًا.">   @if(app()->getLocale() == 'ar') شكرًا لتواصلك مع FranchiseME! سيتواصل فريقنا معك قريبًا. @else Thank you for contacting FranchiseME! Our team will get back to you shortly. @endif</p>
                    </div>
                    <div class="contain black d-none">
                        <p class="mt-3 mb-0 text-danger" data-en="Something went wrong. Please try again." data-ar="حدث خطأ ما. يُرجى المحاولة مرة أخرى.">@if(app()->getLocale() == 'ar') حدث خطأ ما. يُرجى المحاولة مرة أخرى. @else Something went wrong. Please try again. @endif</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section data-aos="fade-up" class="contact_map">
    <div class="container-fluid">
        <div class="row g-0 justify-content-center">
            <div class="col-md-11">
                {!! $contact->map_embed ?? '' !!}
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$('#contactForm').on('submit', function(e) {
    e.preventDefault();

    $.ajax({
        // url: "{{ route('contact.store') }}",
        url: "{{ route('contact.store') }}" + "?type=" + $('#inquiry_type').val(),
        method: "POST",
        data: $(this).serialize(),
        success: function(response) {
            if (response.success) {
                alert(response.message);
                $('#contactForm')[0].reset();
            }
        },
        error: function() {
            alert('Something went wrong.');
        }
    });
});
</script>
@endsection