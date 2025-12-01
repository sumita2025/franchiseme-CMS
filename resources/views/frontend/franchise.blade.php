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
    <div class="container-fluid">
        <div class="row g-0 justify-content-center">
            <div class="col-md-11">
                <div class="bg_section">
                    <div class="container">
                        <div class="d-flex flex-wrap title_wrap mb-5 justify-content-center">
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
                                        @if($franchise->status ==1)
                                            <li>
                                                <div class="card rounded-0" style="background-image: url('{{ asset($franchise->slider_background_image) }}');">
                                                    <div class="card-body p-0">
                                                        <div class="row z-1 position-relative g-0">
        
                                                            <div class="col-md-5">
                                                                <div class="feature_img 1rounded-4">
                                                                    <img src="{{ asset($franchise->logo) }}" alt="" class="img-fluid">
                                                                </div>
                                                            </div>
        
                                                            <div class="col-md-7 card_right">
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
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="franchise_listing_section_container">
    <div class="container-fluid mb-4">
        <div class="row g-0 justify-content-center">
            <div class="col-md-11">
                <div class="bg_color">
                    <div class="px-5 py-4">
                        <div class="row mx-0 g-0 opportunities_filter">
                            <div class="col-md-4 of_block">
                                <div class="search position-relative">
                                    <img src="{{asset('/assets/image/osearch.png')}}" alt="" class="icon">
                                    <input type="text" class="form-control" placeholder="Search by brand name or sector" data-en="Search by brand name or sector" data-ar="ابحث حسب اسم العلامة التجارية أو القطاع">
                                </div>
                            </div>
                            <div class="col-md of_block">
                                <select name="" id="" class="form-control form-select ps-2">
                                    <option value="" data-en="Country" data-ar="الدولة">Country</option>
                                    @foreach ($countries as $key=>$country)
                                            <option value="{{$key}}" data-en="Country" data-ar="الدولة">{{$key}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="col-md of_block">
                                <select name="" id="" class="form-control form-select ps-2">
                                    <option value="" data-en="Sector" data-ar="القطاع">Sector</option>
                                </select>
                            </div>
                            <div class="col-md of_block">
                                <select name="" id="" class="form-control form-select ps-2">
                                    <option value="" data-en="Investment Range" data-ar="نطاق الاستثمار">Investment Range</option>
                                </select>
                            </div>
                            <div class="col-md of_block d-flex align-items-center justify-content-end gap-3">
                                <button type="button" class="button btn_secoundry p-0 bg-transparent border-0">
                                    <div class="btn_text">Reset</div>
                                </button>
                                <button type="button" class="button btn_primary p-0 bg-transparent border-0">
                                    <div class="btn_text">Apply</div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <!-- <div class="d-flex flex-wrap title_wrap mb-4 justify-content-center">
            <h2 class="title mb-0">
                @if(app()->getLocale() == 'ar')
                    {!! $brand->franchise_title_ar ?? '' !!}
                @else
                    {!! $brand->franchise_title_ar ?? '' !!}
                @endif
            </h2>
        </div> -->
        {{-- Static --}}
        {{-- <div class="row g-4 our_services franchise_listing_section_new">
            <div class="col-md-4">
                <div class="card os_item p-0">
                    <div class="card-body p-3">
                        <div class="icon rounded-4 position-relative">
                            <img src="{{asset('/assets/image/blog.jpg')}}" alt="" class="img-fluid w-100">
                            <div class="contain small fw-semibold text-center mt-2 ms-2 position-absolute top-0 start-0 px-2 py-1 bg-dark rounded-5">
                                <h6 class="mb-0">sector</h6>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between py-3 my-3 mx-4 investment_level">
                            <div class="contain black">
                                <h6 class="mb-0">India</h6>
                            </div>
                            <div class="contain black">
                                <h6 class="mb-0">Investment level - Mid</h6>
                            </div>
                        </div>
                        <div>
                            <h4 class="sub_title mb-3" data-en="Lorem ipsum dolor sit amet consectetur adipiscing" data-ar="لوريم إيبسوم دولار سيت أميت كونسيكتيتور أديبيسكنغ">Lorem ipsum dolor sit amet consectetur adipiscing</h4>
                            <div class="short_dec contain black">
                                <p data-en="Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae placeat odio porro veniam qui, illo accusantium ab quisquam vero ex necessitatibus aspernatur aut earum incidunt hic? Architecto tenetur vero quisquam." data-ar="لوريم إيبسوم دولار سيت أميت كونسيكتيتور أديبيسكنغ إليت. كوي بلاسيت أوديو بورّو فينيام كوي، إيلو أكوسانتيم أب كيسكوام فيرو إكس نيسيسيتاتيبوس أسبيرناتور أوت إيروم إنسيدنت هيك؟ أركيتكتو تينيتور فيرو كيسكوام.">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae placeat odio porro veniam qui, illo accusantium ab quisquam vero ex necessitatibus aspernatur aut earum incidunt hic? Architecto tenetur vero quisquam.</p>
                            </div>
                            <a href="#" class="button button_text mt-2">
                                <div class="btn_text">
                                    View Details
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="row g-4 our_services franchise_listing_section_new">
              @foreach($franchises as $franchise)
                <div class="col-md-4">
                    <div class="card os_item p-0">
                        <div class="card-body p-3">
                            <div class="icon rounded-4 position-relative">
                                @if(!empty($franchise->logo))
                                <img src="{{ asset($franchise->logo) }}" alt="{{ $franchise->name }}" class="img-fluid w-100 ">
                                @else
                                  <img src="{{asset('/assets/image/blog.jpg')}}" alt="" class="img-fluid w-100">
                                @endif
                                <!-- <div class="contain small fw-semibold text-center mt-2 ms-2 position-absolute top-0 start-0 px-2 py-1 bg-dark rounded-5">
                                    <h6 class="mb-0">
                                         @if(app()->getLocale() == 'ar')
                                                {!! $franchise->sector_ar ?? '' !!}
                                            @else
                                                {!! $franchise->sector ?? '' !!}
                                            @endif
                                    </h6>
                                </div> -->
                            </div>
                            <div class="d-flex justify-content-between py-3 my-3 mx-4 investment_level">
                                <div class="contain black d-flex align-items-center gap-2">
                                    <h6 class="mb-0 text-muted">Country: </h6>
                                    <h6 class="mb-0 fw-extrabold text-dark text-capitalize">
                                        @if(app()->getLocale() == 'ar')
                                            {!! $franchise->country_ar ?? '' !!}
                                        @else
                                            {!! $franchise->country ?? '' !!}
                                        @endif
                                    </h6>
                                </div>
                                <div class="contain black d-flex align-items-center gap-2">
                                    <h6 class="mb-0 text-muted">Investment Range: </h6>
                                    <h6 class="mb-0 fw-extrabold text-dark text-capitalize">
                                        @if(app()->getLocale() == 'ar')
                                                {!! $franchise->investment_level_ar ?? '' !!}
                                        @else
                                            {!! $franchise->investment_level ?? '' !!}
                                        @endif
                                        </h6>
                                </div>
                            </div>
                            <div>
                                <h4 class="sub_title mb-3" data-en="Lorem ipsum dolor sit amet consectetur adipiscing" data-ar="لوريم إيبسوم دولار سيت أميت كونسيكتيتور أديبيسكنغ">
                                    @if(app()->getLocale() == 'ar')
                                        {!! $franchise->title_ar ?? '' !!}
                                    @else
                                        {!! $franchise->title ?? '' !!}
                                    @endif
                                </h4>
                                <div class="short_dec contain black d-flex align-items-center gap-2 mb-2">
                                    <p class="mb-0 text-muted" style="min-height: unset;">
                                        Sector:
                                    </p>
                                    <p class="mb-0 text-dark" style="min-height: unset;">
                                         @if(app()->getLocale() == 'ar')
                                                {!! $franchise->sector_ar ?? '' !!}
                                            @else
                                                {!! $franchise->sector ?? '' !!}
                                            @endif
                                    </p>
                                </div>
                                <div class="short_dec contain black">
                                    <p data-en="Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae placeat odio porro veniam qui, illo accusantium ab quisquam vero ex necessitatibus aspernatur aut earum incidunt hic? Architecto tenetur vero quisquam." data-ar="لوريم إيبسوم دولار سيت أميت كونسيكتيتور أديبيسكنغ إليت. كوي بلاسيت أوديو بورّو فينيام كوي، إيلو أكوسانتيم أب كيسكوام فيرو إكس نيسيسيتاتيبوس أسبيرناتور أوت إيروم إنسيدنت هيك؟ أركيتكتو تينيتور فيرو كيسكوام.">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae placeat odio porro veniam qui, illo accusantium ab quisquam vero ex necessitatibus aspernatur aut earum incidunt hic? Architecto tenetur vero quisquam.</p>
                                </div>
                               <a href="{{ route('service-detail', $franchise->franchise_slug) }}" class="button button_text mt-3">
                                    <div class="btn_text">
                                        View Details
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
             @endforeach
        </div>
    </div>
</section>
@endsection
