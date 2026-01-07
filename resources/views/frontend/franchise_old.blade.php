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
         style="background-image: url('{{ asset('storage/'.$content->background_image ?? 'default.jpg') }}');">

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

@if($franchises->where('status', 1)->count() > 0)
<section class="opportunities_feature">
    <div class="container-fluid">
        <div class="row g-0 justify-content-center">
            <div class="col-xxl-11 col-xl-12 col-12">
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
                        <div class="row justify-content-center g-0" data-aos="fade-up">
                            <div class="col-md-11">
                                <ul id="featuredSlider">
                                    @foreach($franchises as $franchise)
                                        @if($franchise->status==1)
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
@endif

<section class="franchise_listing_section_container">
    <div class="container-fluid mb-4">
        <div class="row g-0 justify-content-center">
            <div class="col-xxl-11 col-xl-12 col-12">
                <div class="bg_color">
                    <div class="px-5 py-4">
                        <form id="franchise-filter-form"> 
                            <div class="row mx-0 g-0 opportunities_filter">
                                <div class="col-md-4 of_block">
                                    <div class="search position-relative">
                                        <img src="{{asset('/assets/image/osearch.png')}}" alt="" class="icon">
                                        <input type="text" class="form-control" id="search-input" name="search"  placeholder="@if(app()->getLocale() == 'ar') البحث حسب اسم العلامة التجارية أو القطاع @else Search by brand name or sector @endif" data-en="Search by brand name or sector" data-ar="ابحث حسب اسم العلامة التجارية أو القطاع">
                                    </div>
                                </div>
                                <div class="col-md of_block">
                                    <select name="country" id="country-select" class="form-control form-select ps-2" onchange="applyFilters()">
                                    
                                        @if(app()->getLocale() == 'ar')
                                        <option value="" data-en="Country" data-ar="الدولة">دولة</option>
                                            @foreach ($countries_ar as $country_ar)
                                                <option value="{{$country_ar}}">{{$country_ar}}</option>
                                            @endforeach
                                        @else
                                        <option value="" data-en="Country" data-ar="الدولة">Country</option>
                                        @foreach ($countries as $country)
                                                <option value="{{$country}}" data-en="Country" data-ar="الدولة">{{$country}}</option>
                                        @endforeach
                                        @endif
                                    
                                    </select>
                                </div>
                                <div class="col-md of_block">
                                    <select name="sector" id="sector-select" class="form-control form-select ps-2" onchange="applyFilters()">
                                        @if(app()->getLocale() == 'ar')
                                        <option value="" data-en="Sector" data-ar="القطاع">قطاع</option>
                                            @foreach ($sector_ar as $sec_ar)
                                                <option value="{{$sec_ar}}">{{$sec_ar}}</option>
                                            @endforeach
                                        @else
                                        <option value="" >Sector</option>
                                        @foreach ($sector as $sector)
                                                <option value="{{$sector}}" >{{$sector}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md of_block">
                                    <select name="investment_level" id="investment-level-select"  class="form-control form-select ps-2" onchange="applyFilters()">
                                        
                                        @if(app()->getLocale() == 'ar')
                                        <option value="">نطاق الاستثمار</option>
                                            @foreach ($investment_level_ar as $inv_ar)
                                                <option value="{{$inv_ar}}">{{$inv_ar}}</option>
                                            @endforeach
                                        @else
                                        <option value="">Investment Range</option>
                                        @foreach ($investment_level as $investment)
                                                <option value="{{$investment}}" >{{$investment}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                {{-- <div class="col-md of_block d-flex align-items-center justify-content-end gap-3">
                                    <button type="button" class="button btn_secoundry p-0 bg-transparent border-0" onclick="resetFilters()">
                                        <div class="btn_text"> @if(app()->getLocale() == 'ar') إعادة ضبط @else Reset @endif</div>
                                    </button>
                                    <button type="button" class="button btn_primary p-0 bg-transparent border-0" onclick="applyFilters()">
                                        <div class="btn_text"> @if(app()->getLocale() == 'ar') يتقدم @else Apply @endif</div>
                                    </button>

                                </div> --}}
                                <div class="col-md of_block d-flex align-items-center gap-3">
                                    <button type="button" class="button btn_primary p-0 bg-transparent border-0" onclick="resetFilters()">
                                        <div class="btn_text"> @if(app()->getLocale() == 'ar') يتقدم @else Reset @endif</div>
                                    </button>
                                </div>
                            </div>
                        </form>
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

        <div class="row g-4 our_services franchise_listing_section_new" id="franchise-listings">
            @include('frontend.franchise_listings', ['franchises' => $franchises])
              {{-- @foreach($franchises as $franchise)
                <div class="col-md-4">
                    <div class="card os_item p-0">
                        <div class="card-body p-3">
                            <div class="icon rounded-4 position-relative">
                                @if(!empty($franchise->logo))
                                <img src="{{ asset($franchise->logo) }}" alt="{{ $franchise->name }}" class="img-fluid w-100 ">
                                @else
                                  <img src="{{asset('/assets/image/blog.jpg')}}" alt="" class="img-fluid w-100">
                                @endif
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
             @endforeach --}}
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
    // Debounce function to limit how often a function is called (wait until user stops typing)
    function debounce(func, timeout = 300) {
        let timer;
        return (...args) => {
            clearTimeout(timer);
            timer = setTimeout(() => {
                func.apply(this, args);
            }, timeout);
        };
    }

    // Function to collect filter data and send an AJAX request
    function applyFilters() {
        const url = '{{ route("franchise.filter") }}'; // Ensure this route exists and points to your controller method

        // Collect all form data
        const search = document.getElementById('search-input').value;
        const country = document.getElementById('country-select').value;
        const sector = document.getElementById('sector-select').value;
        const investment_level = document.getElementById('investment-level-select').value;
        const locale = '{{ app()->getLocale() }}'; // Pass current locale

        $.ajax({
            url: url,
            type: 'GET', // Or 'POST' if preferred, but GET is common for filters
            data: {
                search: search,
                country: country,
                sector: sector,
                investment_level: investment_level,
                locale: locale,
            },
            success: function(response) {
                // Update the franchise listings section with the new HTML returned from the server
                $('#franchise-listings').html(response.html);
            },
            error: function(xhr) {
                console.log('An error occurred during filtering:', xhr);
            }
        });
    }

    // Reset filters and re-apply
    function resetFilters() {
        document.getElementById('search-input').value = '';
        document.getElementById('country-select').value = '';
        document.getElementById('sector-select').value = '';
        document.getElementById('investment-level-select').value = '';
        applyFilters();
    }

    // Apply debounce to the search input so it doesn't fire on every keypress
    document.getElementById('search-input').addEventListener('keyup', debounce(applyFilters, 500));
    
    // Initial call to apply filters/load data (optional, but good practice if page loads with initial filters)
    // $(document).ready(function() {
    //     applyFilters(); 
    // });
</script>
@endsection
