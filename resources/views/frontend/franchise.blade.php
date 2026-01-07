@extends('frontend.master-new')

@section('content')

<!-- Page Title -->
<div class="topbar">
    <section class="contactus_Section pagetitle" @if($content && $content->background_image) style="background-image: url('{{ asset('storage/'.$content->background_image) }}')" @endif>
        <div class="container-fluid px-5">
            <div class="container container_box position-relative">
                <h1 class="hero-title mb-3">
                    {{ app()->getLocale() == 'ar' ? 'استكشف فرص الامتياز' : 'Explore Franchise Opportunities' }}
                </h1>
                <div class="breadcrumbs">
                    <a href="{{ route('index') }}">{{ app()->getLocale() == 'ar' ? 'الرئيسية' : 'Home' }}</a>
                    <p class="mb-0">{{ app()->getLocale() == 'ar' ? 'الامتياز' : 'Franchise' }}</p>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Franchise Listing Section -->
<section class="franchise-listing-container">
    <div class="container">
        <div class="fl_container_box">
            <!-- Filter Section -->
            <div class="filter_box d-flex flex-column flex-md-row mb-4 gap-3">
                <input type="text" class="form-control search_input" id="search-input" placeholder="{{ app()->getLocale() == 'ar' ? 'ابحث حسب الكلمة المفتاحية' : 'Search by keyword' }}">
                
                <select name="country" id="country-select" class="form-control form-select ps-2" onchange="applyFilters()">
                    <option value="">{{ app()->getLocale() == 'ar' ? 'الدولة' : 'Country' }}</option>
                    @if(app()->getLocale() == 'ar')
                        @foreach ($countries_ar as $country)
                            <option value="{{ $country }}">{{ $country }}</option>
                        @endforeach
                    @else
                        @foreach ($countries as $country)
                            <option value="{{ $country }}">{{ $country }}</option>
                        @endforeach
                    @endif
                </select>

                <select name="sector" id="sector-select" class="form-control form-select ps-2" onchange="applyFilters()">
                    <option value="">{{ app()->getLocale() == 'ar' ? 'القطاع' : 'Sector' }}</option>
                    @if(app()->getLocale() == 'ar')
                        @foreach ($sector_ar as $sec)
                            <option value="{{ $sec }}">{{ $sec }}</option>
                        @endforeach
                    @else
                        @foreach ($sector as $sec)
                            <option value="{{ $sec }}">{{ $sec }}</option>
                        @endforeach
                    @endif
                </select>

                <select name="investment_level" id="investment-level-select" class="form-control form-select ps-2" onchange="applyFilters()">
                    <option value="">{{ app()->getLocale() == 'ar' ? 'نطاق الاستثمار' : 'Investment Level' }}</option>
                    @if(app()->getLocale() == 'ar')
                        @foreach ($investment_level_ar as $level)
                            <option value="{{ $level }}">{{ $level }}</option>
                        @endforeach
                    @else
                        @foreach ($investment_level as $level)
                            <option value="{{ $level }}">{{ $level }}</option>
                        @endforeach
                    @endif
                </select>

                <button type="button" class="button button_secoundary d-block" onclick="resetFilters()">
                    {{ app()->getLocale() == 'ar' ? 'إعادة تعيين' : 'Reset' }}
                </button>
            </div>

            <!-- Franchise Listings Grid -->
            <div class="row gy-4 gx-5 franchise_list" id="franchise-listings">
                @forelse($franchises as $franchise)
                    <div class="col-md-6 fl_item" data-aos="fade-up">
                        <a href="{{ route('service-detail', $franchise->franchise_slug ?? '#') }}" class="text-decoration-none">
                            <div class="row g-0 fanchise_item">
                                <div class="col-md-4 position-relative">
                                    <img src="@if($franchise->logo) {{ asset($franchise->logo) }} @else {{ asset('frontend/assest/Image_not_available.png') }} @endif" alt="{{ $franchise->title ?? 'Franchise' }}" class="img-fluid franchise_img">
                                    <p class="sector_tag mb-0">
                                        {{ app()->getLocale() == 'ar' ? ($franchise->sector_ar ?? 'Sector') : ($franchise->sector ?? 'Sector') }}
                                    </p>
                                </div>
                                <div class="col-md-8">
                                    <div class="franchise_content d-flex flex-column justify-content-between gap-3 h-100">
                                        <div class="fc_info">
                                            <h4 class="sub_title mb-2">
                                                {{ app()->getLocale() == 'ar' ? ($franchise->title_ar ?? 'Franchise Title') : ($franchise->title ?? 'Franchise Title') }}
                                            </h4>
                                            <div class="decription">
                                                <p>
                                                    @php
                                                        $description = app()->getLocale() == 'ar' 
                                                            ? ($franchise->description_ar ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.')
                                                            : ($franchise->description ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
                                                        echo html_limit_safe($description, 150);
                                                    @endphp
                                                </p>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between fc_meta decription">
                                            <p class="mb-0">
                                                @if(app()->getLocale() == 'ar')
                                                    الدولة: {{ $franchise->country_ar ?? 'India' }}
                                                @else
                                                    Country: {{ $franchise->country ?? 'India' }}
                                                @endif
                                            </p>
                                            <p class="mb-0">
                                                @if(app()->getLocale() == 'ar')
                                                    نطاق الاستثمار: {{ $franchise->investment_level_ar ?? 'Mid' }}
                                                @else
                                                    Investment Range: {{ $franchise->investment_level ?? 'Mid' }}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">No franchise opportunities available at the moment</p>
                    </div>
                @endforelse
            </div>

            <!-- Load More Button -->
            <div class="mt-4 d-flex justify-content-center">
                <button type="button" class="button" id="load-more-btn" onclick="loadMoreFranchises()">
                    {{ app()->getLocale() == 'ar' ? 'تحميل المزيد' : 'Load More' }}
                </button>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    let currentOffset = 6; // Start at 6 since we show 6 initially
    let currentFilters = {
        search: '',
        country: '',
        sector: '',
        investment_level: '',
        locale: '{{ app()->getLocale() }}'
    };

    // Debounce function to limit how often a function is called
    function debounce(func, timeout = 300) {
        let timer;
        return (...args) => {
            clearTimeout(timer);
            timer = setTimeout(() => {
                func.apply(this, args);
            }, timeout);
        };
    }

    // Function to collect filter data and send AJAX request
    function applyFilters() {
        const url = '{{ route("franchise.filter") }}';
        
        const search = document.getElementById('search-input').value;
        const country = document.getElementById('country-select').value;
        const sector = document.getElementById('sector-select').value;
        const investment_level = document.getElementById('investment-level-select').value;
        const locale = '{{ app()->getLocale() }}';

        // Store current filters
        currentFilters = {
            search: search,
            country: country,
            sector: sector,
            investment_level: investment_level,
            locale: locale
        };

        // Reset offset when filtering
        currentOffset = 6;

        $.ajax({
            url: url,
            type: 'GET',
            data: currentFilters,
            success: function(response) {
                $('#franchise-listings').html(response.html);
                // Show Load More button
                $('#load-more-btn').show();
            },
            error: function(xhr) {
                console.log('An error occurred during filtering:', xhr);
            }
        });
    }

    // Load More Franchises
    function loadMoreFranchises() {
        const url = '{{ route("franchise.loadMore") }}';

        $.ajax({
            url: url,
            type: 'GET',
            data: {
                offset: currentOffset,
                search: currentFilters.search,
                country: currentFilters.country,
                sector: currentFilters.sector,
                investment_level: currentFilters.investment_level,
                locale: currentFilters.locale
            },
            success: function(response) {
                // Append new franchises to listing
                $('#franchise-listings').append(response.html);
                
                // Update offset for next load
                currentOffset = response.nextOffset;

                // Hide Load More button if no more records
                if (!response.hasMore) {
                    $('#load-more-btn').hide();
                }
            },
            error: function(xhr) {
                console.log('An error occurred during load more:', xhr);
            }
        });
    }

    // Reset filters and re-apply
    function resetFilters() {
        document.getElementById('search-input').value = '';
        document.getElementById('country-select').value = '';
        document.getElementById('sector-select').value = '';
        document.getElementById('investment-level-select').value = '';
        currentOffset = 6; // Reset offset
        applyFilters();
    }

    // Apply debounce to search input
    document.getElementById('search-input').addEventListener('keyup', debounce(applyFilters, 500));
</script>
@endsection
