@extends('frontend.master')

@section('content')
<section class="page_title position-relative my-0">
    <div class="container text-center d-flex flex-column align-items-center gap-3" data-aos="fade-up">
        <h1 class="text-white mb-0">
            <span>
                @if(app()->getLocale() == 'ar')
                    {!! $franchise->title_ar ?? '' !!}
                @else
                    {!! $franchise->title ?? '' !!}
                @endif
            </span>
        </h1>
    </div>
</section>

<section class="brand_deatils_modal">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="">
                    <div class="feature_img">
                        <img src="{{ asset($franchise->logo) }}" alt="" class="img-fluid">
                    </div>
                    <div class="contain black fw-semibold text-center mt-3">
                        <p class="mb-0">
                            @if(app()->getLocale() == 'ar')
                                {!! $franchise->country_ar ?? '' !!}
                            @else
                                {!! $franchise->country ?? '' !!}
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="header_box mb-3">
                    <h4 class="sub_title mb-3">
                        @if(app()->getLocale() == 'ar')
                            {!! $franchise->title_ar ?? '' !!}
                        @else
                            {!! $franchise->title ?? '' !!}
                        @endif
                    </h4>
                    <div class="row gx-3 gy-2">
                        <div class="col-md-6">
                            <div class="contain black d-flex align-items-center gap-2">
                                <p class="mb-0 fw-bold" data-en="Sector:" data-ar="القطاع:">@if(app()->getLocale() == 'ar')  قطاع: @else Sector: @endif </p>
                                <p>
                                    @if(app()->getLocale() == 'ar')
                                        {!! $franchise->sector_ar ?? '' !!}
                                    @else
                                        {!! $franchise->sector ?? '' !!}
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="contain black d-flex align-items-center gap-2">
                                <p class="mb-0 fw-bold">  @if(app()->getLocale() == 'ar') مستوى الاستثمار: @else Investment level: @endif</p>
                                <p>
                                    @if(app()->getLocale() == 'ar')
                                        {!! $franchise->investment_level_ar ?? '' !!}
                                    @else
                                        {!! $franchise->investment_level ?? '' !!}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contain black description_box">
                    <p>
                        @if(app()->getLocale() == 'ar')
                            {!! $franchise->description_ar ?? '' !!}
                        @else
                            {!! $franchise->description ?? '' !!}
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact_section" id="application_Form">
    <div class="container">
        <div class="text-center mb-5">
            <div class="d-flex flex-wrap title_wrap mb-3 justify-content-center">
                <h2 class="title mb-0" data-en="Application" data-ar="نموذج">@if(app()->getLocale() == 'ar') طلب @else Application @endif </h2>  
                <h2 class="title mb-0 yellow" data-en="Form" data-ar="التقديم">@if(app()->getLocale() == 'ar') استمارة @else Form @endif</h2>  
            </div>
            <div class="contain black text-center">
                <p class="mb-0" data-en="Allows investors to apply for a franchise opportunity directly." data-ar="يتيح للمستثمرين التقدم مباشرة للحصول على فرصة امتياز تجاري.">  @if(app()->getLocale() == 'ar') يتيح للمستثمرين التقدم بطلب للحصول على فرصة الامتياز بشكل مباشر. @else Allows investors to apply for a franchise opportunity directly. @endif</p>
            </div>
        </div>
        <div class="row mx-0 justify-content-center" data-aos="fade-up">
            <div class="col-xl-8 px-0">
                <form action="">
                    <div class="row g-4"> 
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="@if(app()->getLocale() == 'ar') الاسم الكامل @else Full Name @endif" data-en="Full Name" data-ar="الاسم الكامل">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="@if(app()->getLocale() == 'ar') بريد إلكتروني @else Email  @endif" data-en="Email" data-ar="البريد الإلكتروني">
                        </div>
                        <div class="col-md-6">
                            <input type="number" class="form-control" placeholder="@if(app()->getLocale() == 'ar') رقم التليفون @else Phone Number  @endif" data-en="Phone Number" data-ar="رقم الهاتف">
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="@if(app()->getLocale() == 'ar') دولة @else Country @endif" data-en="Country" data-ar="الدولة">
                        </div>
                        {{-- <div class="col-md-6">
                            <select name="" id="" class="form-control form-select ps-2">
                                <option value="" data-en="Select Brand" data-ar="اختر العلامة التجارية">Select Brand</option>
                            </select>
                        </div> --}}
                         <div class="col-md-6">
                            <input type="text" class="form-control" value="@if(app()->getLocale() == 'ar') {{ $franchise->title_ar ?? null }} @else {{ $franchise->title ?? null }} @endif" data-en="Brand" data-ar="ماركة" readonly>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="@if(app()->getLocale() == 'ar')  نطاق الاستثمار @else Investment Range @endif " data-en="Investment Range" data-ar="نطاق الاستثمار">
                        </div>
                        <div class="col-md-12">
                            <textarea class="form-control" placeholder="@if(app()->getLocale() == 'ar') رسالة @else Message @endif " rows="3" data-en="Message" data-ar="الرسالة"></textarea>
                        </div>
                        <div class="col-md-12 d-flex">
                            <a href="javascript:void(0);" class="button btn_secoundry">
                                <div class="btn_text" data-en="Submit" data-ar="إرسال">@if(app()->getLocale() == 'ar') يُقدِّم @else Submit @endif</div>
                            </a>
                        </div>
                    </div>
                    <div class="contain black d-none">
                        <p class="mt-3 mb-0 text-success" data-en="Thank you for your interest. Our team will contact you soon." data-ar="شكرًا لاهتمامك. سيتواصل معك فريقنا قريبًا.">Thank you for your interest. Our team will contact you soon.</p>
                    </div>
                    <div class="contain black d-none">
                        <p class="mt-3 mb-0 text-danger" data-en="Something went wrong. Please try again." data-ar="حدث خطأ ما. يُرجى المحاولة مرة أخرى.">Something went wrong. Please try again.</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$('.btn_secoundry').on('click', function() {
    let form = $(this).closest('form');
    let data = {
        _token: "{{ csrf_token() }}",
        full_name: form.find('input[placeholder="Full Name"]').val(),
        email: form.find('input[placeholder="Email"]').val(),
        phone_number: form.find('input[placeholder="Phone Number"]').val(),
        country: form.find('input[placeholder="Country"]').val(),
        brand: form.find('select').val(),
        investment_range: form.find('input[placeholder="Investment Range"]').val(),
        message: form.find('textarea').val(),
    };

    $.ajax({
        url: "{{ route('application.submit') }}",
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