@extends('frontend.master')

@section('content')
{{-- <section class="page_title position-relative my-0">
    <div class="container text-center d-flex flex-column align-items-center gap-3" data-aos="fade-up">
        <h1 class="text-white mb-0">
            <span>
                @if(app()->getLocale() == 'ar')
                    {!! $content->title_ar ?? '' !!}
                @else
                    {!! $content->title ?? '' !!}
                @endif
            </span>
        </h1>
    </div>
</section> --}}

<section class="page_title position-relative my-0"
         style="background-image: url('{{ asset('storage/'.$content->background_image ?? 'default.jpg') }}'); 
                background-size: cover; 
                background-position: center; 
                background-repeat: no-repeat;">
    
    <div class="container text-center d-flex flex-column align-items-center gap-3" data-aos="fade-up">
        <h1 class="text-white mb-0">
            <span>
                @if(app()->getLocale() == 'ar')
                    {!! $content->title_ar ?? '' !!}
                @else
                    {!! $content->title ?? '' !!}
                @endif
            </span>
        </h1>
    </div>
</section>

<section>
    <div class="container">
        <h4 class="mb-0 title text-center">
            @if(app()->getLocale() == 'ar')
                {!! $content->description_ar ?? '' !!}
            @else
                {!! $content->description ?? '' !!}
            @endif
        </h4>
    </div>
</section>

<section class="opportunities_feature">
    <div class="container">
        <div class="d-flex flex-wrap title_wrap mb-4 justify-content-center">
            <h2 class="title mb-0">
                @if(app()->getLocale() == 'ar')
                    {!! $content->brand_title_ar ?? '' !!}
                @else
                    {!! $content->brand_title ?? '' !!}
                @endif
            </h2>
        </div>
        {{-- old Featured Brands section start --}}
        {{-- <div class="row justify-content-center g-0" data-aos="fade-up">
            <div class="col-md-11">
                <ul id="featuredSlider">
                    @foreach($brands as $brand)
                        <li>
                            <div class="card" style="background-image: url('{{ asset('uploads/brands/background_image/'.$brand->slider_background_image) }}');">
                                <div class="card-body p-0">
                                    <div class="row z-1 position-relative">

                                        <div class="col-md-4">
                                            <div class="feature_img rounded-4">
                                                <img src="{{ asset('uploads/brands/'.$brand->brand_image) }}" alt="" class="img-fluid">
                                            </div>
                                        </div>

                                        <div class="col-md-8">
                                            <div class="d-flex">
                                                <p class="mb-0 bg-white px-2 small py-1 rounded-5 fw-bold">
                                                    @if(app()->getLocale() == 'ar')
                                                        {!! $brand->brand_tag_ar ?? '' !!}
                                                    @else
                                                        {!! $brand->brand_tag ?? '' !!}
                                                    @endif
                                                </p>
                                            </div>

                                            <h4 class="mt-2 mb-3 sub_title yellow">
                                                @if(app()->getLocale() == 'ar')
                                                    {!! $brand->brand_title_ar ?? '' !!}
                                                @else
                                                    {!! $brand->brand_title ?? '' !!}
                                                @endif
                                            </h4>

                                            <div class="contain">
                                                <p class="mb-0">
                                                    {{ strip_tags($brand->description) }}
                                                    @if(app()->getLocale() == 'ar')
                                                        {{ strip_tags($brand->brand_description_ar) }}
                                                    @else
                                                        {{ strip_tags($brand->brand_description) }}
                                                    @endif
                                                </p>
                                            </div>

                                            <div class="d-flex">
                                                <a href="{{ url('brand/'.$brand->brand_slug) }}" class="button btn_primary mt-4">
                                                    <div class="btn_text">
                                                        @if(app()->getLocale() == 'ar')
                                                            {!! $brand->brand_button_ar ?? '' !!}
                                                        @else
                                                            {!! $brand->brand_button ?? '' !!}
                                                        @endif
                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div> --}}
        {{-- old Featured Brands section end --}}
        <div class="row justify-content-center g-0" data-aos="fade-up">
            <div class="col-md-11">
                <ul id="featuredSlider">
                    @foreach($franchises as $franchise)
                        <li>
                            <div class="card" style="background-image: url('{{ asset($franchise->slider_background_image) }}');">
                                <div class="card-body p-0">
                                    <div class="row z-1 position-relative">

                                        <div class="col-md-4">
                                            <div class="feature_img rounded-4">
                                                <img src="{{ asset($franchise->logo) }}" alt="" class="img-fluid">
                                            </div>
                                        </div>

                                        <div class="col-md-8">
                                            @if(!empty($$franchise->tag_ar) ||  !empty($franchise->tag))
                                            <div class="d-flex">
                                                <p class="mb-0 bg-white px-2 small py-1 rounded-5 fw-bold">
                                                    @if(app()->getLocale() == 'ar')
                                                        {!! $franchise->tag_ar ?? '' !!}
                                                    @else
                                                        {!! $franchise->tag ?? '' !!}
                                                    @endif
                                                </p>
                                            </div>
                                            @endif

                                            <h4 class="mt-2 mb-3 sub_title yellow">
                                                @if(app()->getLocale() == 'ar')
                                                    {!! $franchise->title_ar ?? '' !!}
                                                @else
                                                    {!! $franchise->title ?? '' !!}
                                                @endif
                                            </h4>

                                            <div class="contain">
                                                <p class="mb-0">
                                                    {{ strip_tags($franchise->description) }}
                                                    @if(app()->getLocale() == 'ar')
                                                        {{ strip_tags($franchise->description_ar) }}
                                                    @else
                                                        {{ strip_tags($franchise->description) }}
                                                    @endif
                                                </p>
                                            </div>

                                            <div class="d-flex">
                                                <a href="{{ route('service-detail', $franchise->franchise_slug) }}" class="button btn_primary mt-4">
                                                    <div class="btn_text">
                                                        @if(app()->getLocale() == 'ar')
                                                            {!! $franchise->link_text_ar ?? '' !!}
                                                        @else
                                                            {!! $franchise->link_text ?? '' !!}
                                                        @endif
                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="bg_section section_padding mb-0">
    <div class="container">
        <div class="d-flex flex-wrap title_wrap mb-4 justify-content-center">
            <h2 class="title mb-0">
                @if(app()->getLocale() == 'ar')
                    {!! $brand->franchise_title_ar ?? '' !!}
                @else
                    {!! $brand->bfranchise_titlerand_button ?? '' !!}
                @endif
            </h2> 
        </div>
        <div class="row mb-4 opportunities_filter">
            <div class="col-md-4">
                <div class="search position-relative">
                    <img src="./assets/search.png" alt="" class="icon">
                    <input type="text" class="form-control" placeholder="Search by brand name or sector" data-en="Search by brand name or sector" data-ar="ابحث حسب اسم العلامة التجارية أو القطاع">
                </div>
            </div>
            <div class="col-md">
                <select name="" id="" class="form-control form-select ps-2">
                    <option value="" data-en="Country" data-ar="الدولة">Country</option>
                </select>
            </div>
            <div class="col-md">
                <select name="" id="" class="form-control form-select ps-2">
                    <option value="" data-en="Sector" data-ar="القطاع">Sector</option>
                </select>
            </div>
            <div class="col-md">
                <select name="" id="" class="form-control form-select ps-2">
                    <option value="" data-en="Investment Range" data-ar="نطاق الاستثمار">Investment Range</option>
                </select>
            </div>
        </div>

        <div class="row g-4 our_services franchise_listing_section">
            @foreach($franchises as $franchise)
                <div class="col-md-6">
                    <div class="card os_item p-0 h-100">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="icon rounded-4 position-relative">
                                        <span class="badge rounded-pill text-bg-dark mt-2 ms-2 position-absolute top-0 left-0">
                                            @if(app()->getLocale() == 'ar')
                                                {!! $franchise->sector_ar ?? '' !!}
                                            @else
                                                {!! $franchise->sector ?? '' !!}
                                            @endif
                                        </span>

                                        {{-- Dynamic Image --}}
                                        <img src="{{ asset($franchise->logo) }}" alt="{{ $franchise->name }}" class="img-fluid">
                                    </div>

                                    <div class="contain black small fw-semibold text-center mt-2">
                                        <h6 class="mb-0">
                                            @if(app()->getLocale() == 'ar')
                                                {!! $franchise->country_ar ?? '' !!}
                                            @else
                                                {!! $franchise->country ?? '' !!}
                                            @endif
                                        </h6>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    {{-- Title --}}
                                    <h4 class="sub_title mb-0">
                                        @if(app()->getLocale() == 'ar')
                                            {!! $franchise->title_ar ?? '' !!}
                                        @else
                                            {!! $franchise->title ?? '' !!}
                                        @endif
                                    </h4>

                                    {{-- Investment Level --}}
                                    <div class="contain black d-flex align-items-center gap-2 my-2">
                                        <p class="mb-0 fw-bold">Investment level:</p>
                                        <p>
                                            @if(app()->getLocale() == 'ar')
                                                {!! $franchise->investment_level_ar ?? '' !!}
                                            @else
                                                {!! $franchise->investment_level ?? '' !!}
                                            @endif
                                        </p>
                                    </div>

                                    {{-- Short Description --}}
                                    <div class="short_dec contain black">
                                        <p>
                                            @if(app()->getLocale() == 'ar')
                                                {{ strip_tags($franchise->description_ar) }}
                                            @else
                                                {{ strip_tags($franchise->description) }}
                                            @endif
                                        </p>
                                    </div>

                                    {{-- View Details Button --}}
                                    <div class="d-flex">
                                        <a href="{{ route('service-detail', $franchise->franchise_slug) }}" class="button button_text mt-3">
                                            <div class="btn_text">
                                                View Details
                                            </div>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <!-- <div class="col-md-6">
                <div class="card os_item p-0">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="icon rounded-4 position-relative">
                                    <span class="badge rounded-pill text-bg-dark mt-2 ms-2 position-absolute top-0 left-0" data-en="Sector" data-ar="القطاع">Sector</span>
                                    <img src="./assets/client/brand-1.png" alt="" class="img-fluid">
                                </div>
                                <div class="contain black small fw-semibold text-center mt-2">
                                    <h6 class="mb-0" data-en="India" data-ar="الهند">India</h6>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h4 class="sub_title mb-0" data-en="Lorem ipsum dolor sit amet consectetur adipiscing" data-ar="لوريم إيبسوم دولار سيت أميت كونسيكتيتور أديبيسكنغ">Lorem ipsum dolor sit amet consectetur adipiscing</h4>
                                <div class="contain black d-flex align-items-center gap-2 my-2">
                                    <p class="mb-0 fw-bold" data-en="Investment level:" data-ar="مستوى الاستثمار:">Investment level:</p>
                                    <p data-en="Investment level" data-ar="مستوى الاستثمار">Investment level</p>
                                </div>
                                <div class="short_dec contain black">
                                    <p data-en="Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae placeat odio porro veniam qui, illo accusantium ab quisquam vero ex necessitatibus aspernatur aut earum incidunt hic? Architecto tenetur vero quisquam." data-ar="لوريم إيبسوم دولار سيت أميت كونسيكتيتور أديبيسكنغ إليت. كوي بلاسيت أوديو بورّو فينيام كوي، إيلو أكوسانتيم أب كيسكوام فيرو إكس نيسيسيتاتيبوس أسبيرناتور أوت إيروم إنسيدنت هيك؟ أركيتكتو تينيتور فيرو كيسكوام.">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae placeat odio porro veniam qui, illo accusantium ab quisquam vero ex necessitatibus aspernatur aut earum incidunt hic? Architecto tenetur vero quisquam.</p>
                                </div>
                                <div class="d-flex">
                                    <a href="singleopportunities.html" class="button button_text mt-3">
                                        <div class="btn_text" data-en="View Details" data-ar="عرض التفاصيل">
                                            View Details
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</section>
@endsection