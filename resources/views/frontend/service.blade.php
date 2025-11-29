@extends('frontend.master')

@section('content')
{{-- <section class="page_title position-relative my-0">
    <div class="container text-center d-flex flex-column align-items-center gap-3" data-aos="fade-up">
        <h1 class="text-white mb-0">
            <span>
                @if(app()->getLocale() == 'ar')
                    {!! $service->title_ar ?? '' !!}
                @else
                    {!! $service->title ?? '' !!}
                @endif
            </span>
        </h1>
    </div>
</section> --}}

<section class="page_title position-relative my-0"
         style="background-image: url('{{ asset('storage/'.$service->background_image ?? 'default.jpg') }}');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;">

    <div class="container text-center d-flex flex-column align-items-center gap-3" data-aos="fade-up">
        <h1 class="text-white mb-0">
            <span>
                @if(app()->getLocale() == 'ar')
                    {!! $service->title_ar ?? '' !!}
                @else
                    {!! $service->title ?? '' !!}
                @endif
            </span>
        </h1>
    </div>
</section>

<section>
    <div class="container">
        <h4 class="mb-0 title text-center">
            @if(app()->getLocale() == 'ar')
                {!! $service->description_ar ?? '' !!}
            @else
                {!! $service->description ?? '' !!}
            @endif
        </h4>
    </div>
</section>

<section class="about_cta" data-aos="fade-up">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="box br-30">
                    <div class="d-flex flex-column align-items-center text-center gap-3">
                        <div class="d-flex flex-wrap title_wrap justify-content-center">
                            <h2 class="title mb-0 white">
                                @if(app()->getLocale() == 'ar')
                                    {!! $service->consultant_title_ar ?? '' !!}
                                @else
                                    {!! $service->consultant_title ?? '' !!}
                                @endif
                            </h2>
                        </div>
                        <div class="contain">
                            <p class="mb-0">
                                @if(app()->getLocale() == 'ar')
                                    {!! $service->consultant_description_ar ?? '' !!}
                                @else
                                    {!! $service->consultant_description ?? '' !!}
                                @endif
                            </p>
                        </div>
                        <div class="d-flex">
                            <a href="{!! $service->button_url ?? '' !!}" class="button btn_primary mt-4">
                                <div class="btn_text">
                                    @if(app()->getLocale() == 'ar')
                                        {!! $service->button_text_ar ?? '' !!}
                                    @else
                                        {!! $service->button_text ?? '' !!}
                                    @endif
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-transparent">
    <div class="container">
        <div class="text-center mb-5">
            <div class="d-flex flex-wrap title_wrap mb-3 justify-content-center">
                <h2 class="title mb-0">
                    @if(app()->getLocale() == 'ar')
                        {!! $service->package_section_title_ar ?? '' !!}
                    @else
                        {!! $service->package_section_title ?? '' !!}
                    @endif
                </h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="contain black text-center">
                        <p class="mb-0">
                            @if(app()->getLocale() == 'ar')
                                {!! $service->package_section_description_ar ?? '' !!}
                            @else
                                {!! $service->package_section_description ?? '' !!}
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
        {{-- old service packages --}}
        {{-- <div class="our_services">
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4">
                    <div class="card os_item h-100">
                        <div class="d-flex align-items-center justify-content-center image_part">
                            <img src="{{ asset('storage/' . $service->service_image1) }}" class="img-fluid" alt="Service Image">
                        </div>
                        <div class="d-flex flex-column h-100 justify-content-between">
                            <div class="text-center">
                                <h4 class="sub_title mb-3">
                                    @if(app()->getLocale() == 'ar')
                                        {!! $service->service_title1_ar ?? '' !!}
                                    @else
                                        {!! $service->service_title1 ?? '' !!}
                                    @endif
                                </h4>
                                <div class="contain black">
                                    <p class="mb-0">
                                        @if(app()->getLocale() == 'ar')
                                            {!! $service->service_description1_ar ?? '' !!}
                                        @else
                                            {!! $service->service_description1 ?? '' !!}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card os_item h-100">
                        <div class="d-flex align-items-center justify-content-center image_part">
                            <img src="{{ asset('storage/' . $service->service_image2) }}" alt="" class="img-fluid">
                        </div>
                        <div class="d-flex flex-column h-100 justify-content-between">
                            <div class="text-center">
                                <h4 class="sub_title mb-3">
                                    @if(app()->getLocale() == 'ar')
                                        {!! $service->service_title2_ar ?? '' !!}
                                    @else
                                        {!! $service->service_title2 ?? '' !!}
                                    @endif
                                </h4>
                                <div class="contain black">
                                    <p class="mb-0">
                                        @if(app()->getLocale() == 'ar')
                                            {!! $service->service_description2_ar ?? '' !!}
                                        @else
                                            {!! $service->service_description2 ?? '' !!}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card os_item h-100">
                        <div class="d-flex align-items-center justify-content-center image_part">
                            <img src="{{ asset('storage/' . $service->service_image3) }}" alt="" class="img-fluid">
                        </div>
                        <div class="d-flex flex-column h-100 justify-content-between">
                            <div class="text-center">
                                <h4 class="sub_title mb-3">
                                    @if(app()->getLocale() == 'ar')
                                        {!! $service->service_title3_ar ?? '' !!}
                                    @else
                                        {!! $service->service_title3 ?? '' !!}
                                    @endif
                                </h4>
                                <div class="contain black">
                                    <p class="mb-0">
                                        @if(app()->getLocale() == 'ar')
                                            {!! $service->service_description3_ar ?? '' !!}
                                        @else
                                            {!! $service->service_description3 ?? '' !!}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card os_item h-100">
                        <div class="d-flex align-items-center justify-content-center image_part">
                            <img src="{{ asset('storage/' . $service->service_image4) }}" alt="" class="img-fluid">
                        </div>
                        <div class="d-flex flex-column h-100 justify-content-between">
                            <div class="text-center">
                                <h4 class="sub_title mb-3">
                                    @if(app()->getLocale() == 'ar')
                                        {!! $service->service_title4_ar ?? '' !!}
                                    @else
                                        {!! $service->service_title4 ?? '' !!}
                                    @endif
                                </h4>
                                <div class="contain black">
                                    <p class="mb-0">
                                        @if(app()->getLocale() == 'ar')
                                            {!! $service->service_description4_ar ?? '' !!}
                                        @else
                                            {!! $service->service_description4 ?? '' !!}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card os_item h-100">
                        <div class="d-flex align-items-center justify-content-center image_part">
                            <img src="{{ asset('storage/' . $service->service_image5) }}" alt="" class="img-fluid">
                        </div>
                        <div class="d-flex flex-column h-100 justify-content-between">
                            <div class="text-center">
                                <h4 class="sub_title mb-3">
                                    @if(app()->getLocale() == 'ar')
                                        {!! $service->service_title5_ar ?? '' !!}
                                    @else
                                        {!! $service->service_title5 ?? '' !!}
                                    @endif
                                </h4>
                                <div class="contain black">
                                    <p class="mb-0">
                                        @if(app()->getLocale() == 'ar')
                                            {!! $service->service_description5_ar ?? '' !!}
                                        @else
                                            {!! $service->service_description5 ?? '' !!}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="our_services">
            <div class="row g-4 justify-content-center">

                @foreach($service_packages as $package)
                    <div class="col-lg-4">
                        <div class="card os_item h-100">

                            {{-- IMAGE --}}
                            <div class="d-flex align-items-center justify-content-center image_part">
                                <img src="{{ asset($package->image) }}" class="img-fluid" alt="Service Image">
                            </div>

                            <div class="d-flex flex-column h-100 justify-content-between">
                                <div class="text-center">

                                    {{-- TITLE --}}
                                    <h4 class="sub_title mb-3">
                                        @if(app()->getLocale() == 'ar')
                                            {!! $package['title_ar'] ?? '' !!}
                                        @else
                                            {!! $package['title'] ?? '' !!}
                                        @endif
                                    </h4>

                                    {{-- DESCRIPTION --}}
                                    <div class="contain black">
                                        <p class="mb-0">
                                            @if(app()->getLocale() == 'ar')
                                                {!! $package['description_ar'] ?? '' !!}
                                            @else
                                                {!! $package['description'] ?? '' !!}
                                            @endif
                                        </p>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach

            </div>
        </div>

    </div>
</section>

<section class="about_cta">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="box br-30">
                    <div class="container">
                        <div class="row" data-aos="fade-up">
                            <div class="col-md-9">
                                <h4 class="display-6 text-white mb-0 lh-base">
                                    @if(app()->getLocale() == 'ar')
                                        {!! $service->package_title_ar ?? '' !!}
                                    @else
                                        {!! $service->package_title ?? '' !!}
                                    @endif
                                </h4>
                            </div>
                            <div class="col-md-3 d-flex align-items-center justify-content-center">
                                <div class="d-flex justify-content-end">
                                    <a href="{!! $service->package_button_url ?? '' !!}" class="button btn_primary" data-bs-toggle="modal" data-bs-target="#fdp_contactus">
                                        <div class="btn_text">
                                            @if(app()->getLocale() == 'ar')
                                                {!! $service->package_button_text_ar ?? '' !!}
                                            @else
                                                {!! $service->package_button_text ?? '' !!}
                                            @endif
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact_section service_page_form">
    <div class="container">
        <div class="row mx-0">
            <div class="col-xl-6 px-0">
                <!-- <form action="">
                    <div class="row g-4">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Full Name *" data-en="Full Name *" data-ar="الاسم الكامل *" required>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Email *" data-en="Email *" data-ar="البريد الإلكتروني *" required>
                        </div>
                        <div class="col-md-6">
                            <input type="number" class="form-control" placeholder="Phone Number *" data-en="Phone Number *" data-ar="رقم الهاتف *" required>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Brand Name (optional)" data-en="Brand Name (optional)" data-ar="اسم العلامة التجارية (اختياري)">
                        </div>
                        <div class="col-md-12">
                            <textarea class="form-control" placeholder="Message / Additional Notes *" rows="3" data-en="Message / Additional Notes *" data-ar="الرسالة / ملاحظات إضافية *" required></textarea>
                        </div>
                        <div class="col-md-12 d-flex">
                            <a href="javascript:void(0);" class="button btn_secoundry">
                                <div class="btn_text" data-en="Send Message" data-ar="إرسال الرسالة">Send Message</div>
                            </a>
                        </div>
                    </div>
                    <div class="contain black d-none">
                        <p class="mt-3 mb-0 text-success" data-en="Thank you for contacting FranchiseME! Our team will get back to you shortly." data-ar="شكرًا لتواصلك مع FranchiseME! سيتواصل معك فريقنا قريبًا.">Thank you for contacting FranchiseME! Our team will get back to you shortly.</p>
                    </div>
                    <div class="contain black d-none">
                        <p class="mt-3 mb-0 text-danger" data-en="Something went wrong. Please try again." data-ar="حدث خطأ ما. يُرجى المحاولة مرة أخرى.">Something went wrong. Please try again.</p>
                    </div>
                </form> -->
                <img src="{{asset('/assets/image/fts.jpg')}}" alt="" class="img-fluid rounded-4">
            </div>
            <div class="col-xl-6 pe-0 ps-4 d-flex align-items-center">
                <div class="ps-5 ms-5">
                    <div class="d-flex flex-wrap title_wrap mb-4">
                        <h2 class="title mb-0">
                            @if(app()->getLocale() == 'ar')
                                {!! $service->service_title_ar ?? '' !!}
                            @else
                                {!! $service->service_title ?? '' !!}
                            @endif
                        </h2>
                    </div>
                    <div class="contain black">
                        <p>
                            @if(app()->getLocale() == 'ar')
                                {!! $service->service_description_ar ?? '' !!}
                            @else
                                {!! $service->service_description ?? '' !!}
                            @endif
                        </p>
                    </div>
                    <div class="mt-4">
                        <a href="javascript:void(0);" class="button btn_secoundry" data-bs-toggle="modal" data-bs-target="#FranchiseTrainingServices">
                            <div class="btn_text">
                                Fill out the form for more details.
                            </div>
                        </a>
                    </div>
                    <!-- <div class="contain black mt-4">
                        <div class="d-flex align-items-center justify-content-start gap-2 flex-row">
                            <p class="mb-0" data-en="Fill out the form for more details." data-ar="إملأ النموذج للمزيد من التفاصيل.">Fill out the form for more details.</p>
                            <img src="{{ asset('assets/image/arrow-right.png') }}" alt="" width="24px">
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="FranchiseTrainingServices" data-bs-keyboard="false" tabindex="-1" aria-labelledby="FranchiseTrainingServicesTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
        <div class="modal-content br-30 position-relative">
            <button type="button" class="btn-close position-absolute top-0 end-0 me-4 mt-4 z-1" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body px-md-5 py-md-5">
                <div class="d-flex flex-wrap title_wrap mb-3 justify-content-center">
                    <h2 class="title mb-0">Application</h2>
                    <h2 class="title mb-0 yellow">Form</h2>
                </div>
                <div class="contact_section">
                    <form action="">
                        <div class="row g-4">
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Full Name *" data-en="Full Name *" data-ar="الاسم الكامل *" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Email *" data-en="Email *" data-ar="البريد الإلكتروني *" required>
                            </div>
                            <div class="col-md-6">
                                <input type="number" class="form-control" placeholder="Phone Number *" data-en="Phone Number *" data-ar="رقم الهاتف *" required>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Brand Name (optional)" data-en="Brand Name (optional)" data-ar="اسم العلامة التجارية (اختياري)">
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control" placeholder="Message / Additional Notes *" rows="3" data-en="Message / Additional Notes *" data-ar="الرسالة / ملاحظات إضافية *" required></textarea>
                            </div>
                            <div class="col-md-12 d-flex">
                                <a href="javascript:void(0);" class="button btn_secoundry">
                                    <div class="btn_text" data-en="Send Message" data-ar="إرسال الرسالة">Send Message</div>
                                </a>
                            </div>
                        </div>
                        <div class="contain black d-none">
                            <p class="mt-3 mb-0 text-success" data-en="Thank you for contacting FranchiseME! Our team will get back to you shortly." data-ar="شكرًا لتواصلك مع FranchiseME! سيتواصل معك فريقنا قريبًا.">Thank you for contacting FranchiseME! Our team will get back to you shortly.</p>
                        </div>
                        <div class="contain black d-none">
                            <p class="mt-3 mb-0 text-danger" data-en="Something went wrong. Please try again." data-ar="حدث خطأ ما. يُرجى المحاولة مرة أخرى.">Something went wrong. Please try again.</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$('.btn_secoundry').on('click', function() {
    let form = $(this).closest('form');
    let data = {
        _token: "{{ csrf_token() }}",
        full_name: form.find('input[placeholder="Full Name *"]').val(),
        email: form.find('input[placeholder="Email *"]').val(),
        phone_number: form.find('input[placeholder="Phone Number *"]').val(),
        brand_name: form.find('input[placeholder="Brand Name (optional)"]').val(),
        message: form.find('textarea').val()
    };

    $.ajax({
        url: "{{ route('contact.submit') }}",
        method: "POST",
        data: data,
        success: function(response) {
            if (response.success) {
                form.find('.text-success').parent().removeClass('d-none');
                form.find('.text-danger').parent().addClass('d-none');
                form[0].reset();
            }
        },
        error: function() {
            form.find('.text-danger').parent().removeClass('d-none');
            form.find('.text-success').parent().addClass('d-none');
        }
    });
});
</script>
@endsection
