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
    <div class="col-12 text-center py-5">
        <h4>@if(app()->getLocale() == 'ar') لا توجد امتيازات تطابق معاييرك @else No franchises found matching your criteria @endif</h4>
    </div>
@endforelse