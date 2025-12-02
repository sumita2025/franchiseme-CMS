@forelse($franchises as $franchise)
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
                        <h6 class="mb-0 text-muted">@if(app()->getLocale() == 'ar') @else Country: @endif</h6>
                        <h6 class="mb-0 fw-extrabold text-dark text-capitalize">
                            @if(app()->getLocale() == 'ar')
                                {!! $franchise->country_ar ?? '' !!}
                            @else
                                {!! $franchise->country ?? '' !!}
                            @endif
                        </h6>
                    </div>
                    <div class="contain black d-flex align-items-center gap-2">
                        <h6 class="mb-0 text-muted">@if(app()->getLocale() == 'ar') نطاق الاستثمار: @else Investment Range: @endif</h6>
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
                            @php
                                $text = app()->getLocale() == 'ar'
                                    ? strip_tags($franchise->description_ar ?? '')
                                    : strip_tags($franchise->description ?? '');

                                $limited = \Illuminate\Support\Str::words($text, 200, '...');
                            @endphp
                        <p>{!! $limited !!}</p>
                    </div>
                   <a href="{{ route('service-detail', $franchise->franchise_slug) }}" class="button button_text mt-3">
                        <div class="btn_text">
                            @if(app()->getLocale() == 'ar') عرض التفاصيل@else View Details @endif
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@empty
    <div class="col-12 text-center py-5">
        <h4>No franchises found matching your criteria.</h4>
    </div>
@endforelse