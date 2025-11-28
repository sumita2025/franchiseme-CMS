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
                <div class="position-sticky top-0">
                    <div class="feature_img rounded-4">
                        <img src="{{ asset($franchise->logo) }}" alt="" class="img-fluid">
                    </div>
                    <div class="contain black small fw-semibold text-center mt-3">
                        <h6 class="mb-0">
                            @if(app()->getLocale() == 'ar')
                                {!! $franchise->country_ar ?? '' !!}
                            @else
                                {!! $franchise->country ?? '' !!}
                            @endif
                        </h6>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
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
                            <p class="mb-0 fw-bold" data-en="Sector:" data-ar="القطاع:">Sector:</p>
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
                            <p class="mb-0 fw-bold">Investment level:</p>
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
                <div class="contain black mt-2">
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
                <h2 class="title mb-0" data-en="Application" data-ar="نموذج">Application</h2>  
                <h2 class="title mb-0 yellow" data-en="Form" data-ar="التقديم">Form</h2>  
            </div>
            <div class="contain black text-center">
                <p class="mb-0" data-en="Allows investors to apply for a franchise opportunity directly." data-ar="يتيح للمستثمرين التقدم مباشرة للحصول على فرصة امتياز تجاري.">Allows investors to apply for a franchise opportunity directly.</p>
            </div>
        </div>
        <div class="row mx-0 justify-content-center" data-aos="fade-up">
            <div class="col-xl-8 px-0">
                <form action="">
                    <div class="row g-4"> 
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Full Name" data-en="Full Name" data-ar="الاسم الكامل">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Email" data-en="Email" data-ar="البريد الإلكتروني">
                        </div>
                        <div class="col-md-6">
                            <input type="number" class="form-control" placeholder="Phone Number" data-en="Phone Number" data-ar="رقم الهاتف">
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Country" data-en="Country" data-ar="الدولة">
                        </div>
                        {{-- <div class="col-md-6">
                            <select name="" id="" class="form-control form-select ps-2">
                                <option value="" data-en="Select Brand" data-ar="اختر العلامة التجارية">Select Brand</option>
                            </select>
                        </div> --}}
                         <div class="col-md-6">
                            <input type="text" class="form-control" value="{{ $franchise->title ?? null }}" data-en="Brand" data-ar="ماركة" readonly>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Investment Range" data-en="Investment Range" data-ar="نطاق الاستثمار">
                        </div>
                        <div class="col-md-12">
                            <textarea class="form-control" placeholder="Message" rows="3" data-en="Message" data-ar="الرسالة"></textarea>
                        </div>
                        <div class="col-md-12 d-flex">
                            <a href="javascript:void(0);" class="button btn_secoundry">
                                <div class="btn_text" data-en="Submit" data-ar="إرسال">Submit</div>
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