@extends('frontend.master-new')

@section('content')

@php
    $heroImage = isset($content->hero_background_image) && $content->hero_background_image
        ? asset('storage/' . $content->hero_background_image)
        : asset('frontend/assest/heroimage.jpg');

    $aboutImage = isset($content->about_image) && $content->about_image
        ? asset('storage/' . $content->about_image)
        : asset('frontend/assest/aboutimage.png');

    $strategyImage = isset($content->strategy_image) && $content->strategy_image
        ? asset('storage/' . $content->strategy_image)
        : asset('frontend/assest/logo.png');

    $strategyImageAr = isset($content->strategy_image_ar) && $content->strategy_image_ar
        ? asset('storage/' . $content->strategy_image_ar)
        : asset('frontend/assest/logo.png');
@endphp

<!-- Hero Section -->
<section class="hero index-hero hero_section_main d-flex align-items-center justify-content-center" style="background-image: url('{{ $heroImage }}');">
    <div class="container hero-container position-relative z-3" data-aos="fade-right">
        <div class="row gap-3 gap-lg-0 text-center d-flex justify-content-center">
            <div class="col-12 col-lg-8">
                <h1 class="hero-title mb-0">
                    @if(app()->getLocale() == 'ar')
                        {!! $content->hero_title_ar ?? 'Empowering Brands for Sustainable Franchise Growth.' !!}
                    @else
                        {!! $content->hero_title ?? 'Empowering Brands for Sustainable Franchise Growth.' !!}
                    @endif
                </h1>
                <a href="{{ $content->hero_button_url ?? route('contact') }}" class="button mt-lg-4 mt-3">
                    @if(app()->getLocale() == 'ar')
                        {!! $content->hero_button_text_ar ?? 'احصل على استشارتك المجانية' !!}
                    @else
                        {!! $content->hero_button_text ?? 'Get Your Free Consultation' !!}
                    @endif
                </a>
            </div>
        </div>
    </div>

    <!-- <img src="{{ $heroImage }}" data-aos="fade-up" class="hero-img" /> -->
</section>

<!-- About Section -->
<section class="d-flex flex-column flex-lg-row align-items-center about-section" data-aos="fade-up">
    <div class="container-fluid">
        <img src="{{ $aboutImage }}" class="about-img" />
    </div>
    <div class="container">
        <div class="col-12">
            <h2 class="title">
                @if(app()->getLocale() == 'ar')
                    {!! $content->about_title_ar ?? 'عن' !!}
                @else
                    {!! $content->about_title ?? 'About' !!}
                @endif
            </h2>
            <div class="decription">
                <p>
                    @if(app()->getLocale() == 'ar')
                        {!! $content->about_description_ar ?? '' !!}
                    @else
                        {!! $content->about_description ?? '' !!}
                    @endif
                </p>
            </div>
            <!-- <a href="{{ $content->about_button_url ?? route('franchise') }}" class="button button_secoundary mt-4">
                @if(app()->getLocale() == 'ar')
                    {!! $content->about_button_text_ar ?? 'اقرأ المزيد' !!}
                @else
                    {!! $content->about_button_text ?? 'Read More' !!}
                @endif
            </a> -->
        </div>
    </div>
</section>


<section class="my-0 diagram_section overflow-x-hidden">
    <div class="container-fluid hs_container_fluid px-xl-0 px-lg-5 px-md-4 px-3">
        <div class="circel_data mt-0 section_padding">
            <div class="row justify-content-center g-0">
                <div class="col-xl-10 col-12 d-flex flex-column gap-xxl-3 gap-xl-2 gap-3 position-relative">
                    <div class="row first_row">
                        <div class="col-xl-6 col-12 d-flex card_left justify-content-end">
                            <div class="me-xl-5 pe-xl-5 card_wrapper">
                                <div class="card" data-aos="fade-right">
                                    <div class="card-body p-0">
                                        <div class="count">
                                            <h1>01</h1>
                                        </div>
                                        <div class="cb_text">
                                            <h4 class="sub_title">
                                                @if(app()->getLocale() == 'ar')
                                                    {!! $content->strategy_title1_ar ?? 'استراتيجية الامتياز' !!}
                                                @else
                                                    {!! $content->strategy_title1 ?? 'Franchise Strategy' !!}
                                                @endif
                                            </h4>
                                            @php
                                                $desc1 = app()->getLocale() == 'ar' ? ($content->strategy_description1_ar ?? '') : ($content->strategy_description1 ?? '');
                                            @endphp
                                            <div class="contain black" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="{{ $desc1 }}">
                                                @if(app()->getLocale() == 'ar')
                                                    {!! $content->strategy_description1_ar ?? '' !!}
                                                @else
                                                    {!! $content->strategy_description1 ?? '' !!}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-12 d-flex card_right justify-content-xl-start justify-content-end d-xl-flex d-none">
                            <div class="ms-xl-5 ps-xl-5 card_wrapper">
                                <div class="card" data-aos="fade-left">
                                    <div class="card-body p-0">
                                        <div class="cb_text">
                                            <h4 class="sub_title">
                                                @if(app()->getLocale() == 'ar')
                                                    {!! $content->strategy_title6_ar ?? 'استراتيجية الامتياز' !!}
                                                @else
                                                    {!! $content->strategy_title6 ?? 'Franchise Strategy' !!}
                                                @endif
                                            </h4>
                                            @php
                                                $desc6 = app()->getLocale() == 'ar' ? ($content->strategy_description6_ar ?? '') : ($content->strategy_description6 ?? '');
                                            @endphp
                                            <div class="contain black" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="{{ $desc6 }}">
                                                @if(app()->getLocale() == 'ar')
                                                    {!! $content->strategy_description6_ar ?? '' !!}
                                                @else
                                                    {!! $content->strategy_description6 ?? '' !!}
                                                @endif
                                            </div>
                                        </div>
                                        <div class="count">
                                            <h1>06</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
 
                    <div class="row middle_row">
                        <div class="col-xl col-12 d-flex flex-column align-items-end gap-xxl-3 gap-xl-2 gap-3 card_left">
                            <div class="card_first card_wrapper">
                                <div class="card" data-aos="fade-right">
                                    <div class="card-body p-0">
                                        <div class="count">
                                            <h1>02</h1>
                                        </div>
                                        <div class="cb_text">
                                            <h4 class="sub_title">
                                                @if(app()->getLocale() == 'ar')
                                                    {!! $content->strategy_title2_ar ?? 'استراتيجية الامتياز' !!}
                                                @else
                                                    {!! $content->strategy_title2 ?? 'Franchise Strategy' !!}
                                                @endif
                                            </h4>
                                            @php
                                                $desc2 = app()->getLocale() == 'ar' ? ($content->strategy_description2_ar ?? '') : ($content->strategy_description2 ?? '');
                                            @endphp
                                            <div class="contain black" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="{{ $desc2 }}">
                                                @if(app()->getLocale() == 'ar')
                                                    {!! $content->strategy_description2_ar ?? '' !!}
                                                @else
                                                    {!! $content->strategy_description2 ?? '' !!}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="me-xl-5 card_secound card_wrapper">
                                <div class="card" data-aos="fade-right">
                                    <div class="card-body p-0">
                                        <div class="count">
                                            <h1>03</h1>
                                        </div>
                                        <div class="cb_text">
                                            <h4 class="sub_title">
                                                @if(app()->getLocale() == 'ar')
                                                    {!! $content->strategy_title3_ar ?? 'استراتيجية الامتياز' !!}
                                                @else
                                                    {!! $content->strategy_title3 ?? 'Franchise Strategy' !!}
                                                @endif
                                            </h4>
                                            @php
                                                $desc3 = app()->getLocale() == 'ar' ? ($content->strategy_description3_ar ?? '') : ($content->strategy_description3 ?? '');
                                            @endphp
                                            <div class="contain black" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="{{ $desc3 }}">
                                                @if(app()->getLocale() == 'ar')
                                                    {!! $content->strategy_description3_ar ?? '' !!}
                                                @else
                                                    {!! $content->strategy_description3 ?? '' !!}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card_third card_wrapper">
                                <div class="card" data-aos="fade-right">
                                    <div class="card-body p-0">
                                        <div class="count">
                                            <h1>04</h1>
                                        </div>
                                        <div class="cb_text">
                                            <h4 class="sub_title">
                                                @if(app()->getLocale() == 'ar')
                                                    {!! $content->strategy_title4_ar ?? 'استراتيجية الامتياز' !!}
                                                @else
                                                    {!! $content->strategy_title4 ?? 'Franchise Strategy' !!}
                                                @endif
                                            </h4>
                                            @php
                                                $desc4 = app()->getLocale() == 'ar' ? ($content->strategy_description4_ar ?? '') : ($content->strategy_description4 ?? '');
                                            @endphp
                                            <div class="contain black" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="{{ $desc4 }}">
                                                @if(app()->getLocale() == 'ar')
                                                    {!! $content->strategy_description4_ar ?? '' !!}
                                                @else
                                                    {!! $content->strategy_description4 ?? '' !!}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 align-items-center justify-content-center logo_circel d-md-flex d-none">
                            <div class="px-xxl-4 px-xl-3 center_circle_pedding">
                                <div class="center_cicel z-2 position-relative">
                                    @if(app()->getLocale() == 'ar')
                                        <img src="{{ isset($content->strategy_image_ar) && $content->strategy_image_ar ? asset('storage/' . $content->strategy_image_ar) : asset('frontend/assest/logo.png') }}" alt="" class="img-fluid strategy-img">
                                    @else
                                        <img src="{{ isset($content->strategy_image) && $content->strategy_image ? asset('storage/' . $content->strategy_image) : asset('frontend/assest/logo.png') }}" alt="" class="img-fluid strategy-img">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-xl d-flex flex-column align-items-xl-start align-items-end gap-xxl-3 gap-xl-2 gap-3 card_right pt-xl-0 pt-3">
                            <div class="card_wrapper card_first d-xl-none d-block">
                                <div class="card" data-aos="fade-left">
                                    <div class="card-body p-0">
                                        <div class="cb_text">
                                            <h4 class="sub_title">
                                                @if(app()->getLocale() == 'ar')
                                                    {!! $content->strategy_title5_ar ?? 'استراتيجية الامتياز' !!}
                                                @else
                                                    {!! $content->strategy_title5 ?? 'Franchise Strategy' !!}
                                                @endif
                                            </h4>
                                            @php
                                                $desc5 = app()->getLocale() == 'ar' ? ($content->strategy_description5_ar ?? '') : ($content->strategy_description5 ?? '');
                                            @endphp
                                            <div class="contain black" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="{{ $desc5 }}">
                                                @if(app()->getLocale() == 'ar')
                                                    {!! $content->strategy_description5_ar ?? '' !!}
                                                @else
                                                    {!! $content->strategy_description5 ?? '' !!}
                                                @endif
                                            </div>
                                        </div>
                                        <div class="count">
                                            <h1>05</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-md-none d-flex justify-content-center w-100 logo_in_mobile">
                                @if(app()->getLocale() == 'ar')
                                    <img src="{{ isset($content->strategy_image_ar) && $content->strategy_image_ar ? asset('storage/' . $content->strategy_image_ar) : asset('frontend/assest/logo.png') }}" alt="" class="img-fluid strategy-img">
                                @else
                                    <img src="{{ isset($content->strategy_image) && $content->strategy_image ? asset('storage/' . $content->strategy_image) : asset('frontend/assest/logo.png') }}" alt="" class="img-fluid strategy-img">
                                @endif
                            </div>
                            <div class="card_wrapper card_first d-xl-none d-block">
                                <div class="card" data-aos="fade-left">
                                    <div class="card-body p-0">
                                        <div class="cb_text">
                                            <h4 class="sub_title">
                                                @if(app()->getLocale() == 'ar')
                                                    {!! $content->strategy_title6_ar ?? 'استراتيجية الامتياز' !!}
                                                @else
                                                    {!! $content->strategy_title6 ?? 'Franchise Strategy' !!}
                                                @endif
                                            </h4>
                                            @php
                                                $desc6mobile = app()->getLocale() == 'ar' ? ($content->strategy_description6_ar ?? '') : ($content->strategy_description6 ?? '');
                                            @endphp
                                            <div class="contain black" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="{{ $desc6mobile }}">
                                                @if(app()->getLocale() == 'ar')
                                                    {!! $content->strategy_description6_ar ?? '' !!}
                                                @else
                                                    {!! $content->strategy_description6 ?? '' !!}
                                                @endif
                                            </div>
                                        </div>
                                        <div class="count">
                                            <h1>06</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card_wrapper card_first">
                                <div class="card" data-aos="fade-left">
                                    <div class="card-body p-0">
                                        <div class="cb_text">
                                            <h4 class="sub_title">
                                                @if(app()->getLocale() == 'ar')
                                                    {!! $content->strategy_title7_ar ?? 'استراتيجية الامتياز' !!}
                                                @else
                                                    {!! $content->strategy_title7 ?? 'Franchise Strategy' !!}
                                                @endif
                                            </h4>
                                            @php
                                                $desc7 = app()->getLocale() == 'ar' ? ($content->strategy_description7_ar ?? '') : ($content->strategy_description7 ?? '');
                                            @endphp
                                            <div class="contain black" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="{{ $desc7 }}">
                                                @if(app()->getLocale() == 'ar')
                                                    {!! $content->strategy_description7_ar ?? '' !!}
                                                @else
                                                    {!! $content->strategy_description7 ?? '' !!}
                                                @endif
                                            </div>
                                        </div>
                                        <div class="count">
                                            <h1>07</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card_wrapper ms-xl-5 card_secound">
                                <div class="card" data-aos="fade-left">
                                    <div class="card-body p-0">
                                        <div class="cb_text">
                                            <h4 class="sub_title">
                                                @if(app()->getLocale() == 'ar')
                                                    {!! $content->strategy_title8_ar ?? 'استراتيجية الامتياز' !!}
                                                @else
                                                    {!! $content->strategy_title8 ?? 'Franchise Strategy' !!}
                                                @endif
                                            </h4>
                                            @php
                                                $desc8 = app()->getLocale() == 'ar' ? ($content->strategy_description8_ar ?? '') : ($content->strategy_description8 ?? '');
                                            @endphp
                                            <div class="contain black" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="{{ $desc8 }}">
                                                @if(app()->getLocale() == 'ar')
                                                    {!! $content->strategy_description8_ar ?? '' !!}
                                                @else
                                                    {!! $content->strategy_description8 ?? '' !!}
                                                @endif
                                            </div>
                                        </div>
                                        <div class="count">
                                            <h1>08</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card_wrapper card_third">
                                <div class="card" data-aos="fade-left">
                                    <div class="card-body p-0">
                                        <div class="cb_text">
                                            <h4 class="sub_title">
                                                @if(app()->getLocale() == 'ar')
                                                    {!! $content->strategy_title9_ar ?? 'استراتيجية الامتياز' !!}
                                                @else
                                                    {!! $content->strategy_title9 ?? 'Franchise Strategy' !!}
                                                @endif
                                            </h4>
                                            @php
                                                $desc9 = app()->getLocale() == 'ar' ? ($content->strategy_description9_ar ?? '') : ($content->strategy_description9 ?? '');
                                            @endphp
                                            <div class="contain black" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="{{ $desc9 }}">
                                                @if(app()->getLocale() == 'ar')
                                                    {!! $content->strategy_description9_ar ?? '' !!}
                                                @else
                                                    {!! $content->strategy_description9 ?? '' !!}
                                                @endif
                                            </div>
                                        </div>
                                        <div class="count">
                                            <h1>09</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
 
                    <div class="row last_row">
                        <div class="col-xl-6 col-12 d-flex card_left justify-content-end d-xl-flex d-none">
                            <div class="me-xl-5 pe-xl-5 card_wrapper">
                                <div class="card" data-aos="fade-right">
                                    <div class="card-body p-0">
                                        <div class="count">
                                            <h1>05</h1>
                                        </div>
                                        <div class="cb_text">
                                            <h4 class="sub_title">
                                                @if(app()->getLocale() == 'ar')
                                                    {!! $content->strategy_title5_ar ?? 'استراتيجية الامتياز' !!}
                                                @else
                                                    {!! $content->strategy_title5 ?? 'Franchise Strategy' !!}
                                                @endif
                                            </h4>
                                            @php
                                                $desc5last = app()->getLocale() == 'ar' ? ($content->strategy_description5_ar ?? '') : ($content->strategy_description5 ?? '');
                                            @endphp
                                            <div class="contain black" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="{{ $desc5last }}">
                                                @if(app()->getLocale() == 'ar')
                                                    {!! $content->strategy_description5_ar ?? '' !!}
                                                @else
                                                    {!! $content->strategy_description5 ?? '' !!}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-12 d-flex card_right justify-content-xl-start justify-content-end">
                            <div class="ms-xl-5 ps-xl-5 card_wrapper">
                                <div class="card" data-aos="fade-left">
                                    <div class="card-body p-0">
                                        <div class="cb_text">
                                            <h4 class="sub_title">
                                                @if(app()->getLocale() == 'ar')
                                                    {!! $content->strategy_title10_ar ?? 'استراتيجية الامتياز' !!}
                                                @else
                                                    {!! $content->strategy_title10 ?? 'Franchise Strategy' !!}
                                                @endif
                                            </h4>
                                            @php
                                                $desc10 = app()->getLocale() == 'ar' ? ($content->strategy_description10_ar ?? '') : ($content->strategy_description10 ?? '');
                                            @endphp
                                            <div class="contain black" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="{{ $desc10 }}">
                                                @if(app()->getLocale() == 'ar')
                                                    {!! $content->strategy_description10_ar ?? '' !!}
                                                @else
                                                    {!! $content->strategy_description10 ?? '' !!}
                                                @endif
                                            </div>
                                        </div>
                                        <div class="count">
                                            <h1>10</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission & Vision Section -->
<section class="mission-container">
    <div class="container container_small mission_vision_container position-relative">
        <div class="row g-3 g-lg-4 z-3 position-relative">
            <div class="col-12 col-md-6">
                <div class="mv_box" data-aos="fade-right">
                    <div class="d-flex align-items-center justify-content-between gap-2 mb-3 pb-1">
                        <h2 class="title mb-0">
                            @if(app()->getLocale() == 'ar')
                                {!! $content->vision_title_ar ?? 'رؤيتنا' !!}
                            @else
                                {!! $content->vision_title ?? 'Our Vision' !!}
                            @endif
                        </h2>
                        @if($content && $content->vision_icon_image)
                            <img src="{{ asset('storage/' . $content->vision_icon_image) }}" class="mv_img" style="max-width: 50px; height: auto;" alt="Vision Icon" />
                        @else
                            <img src="{{ asset('frontend/assest/vision-icon.png') }}" class="mv_img" style="max-width: 50px; height: auto;" alt="Vision Icon" />
                        @endif
                    </div>
                    <div class="decription">
                        @if(app()->getLocale() == 'ar')
                            {!! $content->vision_description_ar ?? '' !!}
                        @else
                            {!! $content->vision_description ?? '' !!}
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="mv_box" data-aos="fade-down">
                    <div class="d-flex align-items-center justify-content-between gap-2 mb-3 pb-1">
                        <h2 class="title mb-0">
                            @if(app()->getLocale() == 'ar')
                                {!! $content->mission_title_ar ?? 'مهمتنا' !!}
                            @else
                                {!! $content->mission_title ?? 'Our Mission' !!}
                            @endif
                        </h2>
                        @if($content && $content->mission_icon_image)
                            <img src="{{ asset('storage/' . $content->mission_icon_image) }}" class="mv_img" style="max-width: 50px; height: auto;" alt="Mission Icon" />
                        @else
                            <img src="{{ asset('frontend/assest/mission-icon.png') }}" class="mv_img" style="max-width: 50px; height: auto;" alt="Mission Icon" />
                        @endif
                    </div>
                    <div class="decription">
                        @if(app()->getLocale() == 'ar')
                            {!! $content->mission_description_ar ?? '' !!}
                        @else
                            {!! $content->mission_description ?? '' !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="team-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="team-content" data-aos="fade-right">
                    <h2 class="title">
                        @if(app()->getLocale() == 'ar')
                            {!! $content->team_title_ar ?? 'فريقنا' !!}
                        @else
                            {!! $content->team_title ?? 'The FranchiseME Teams' !!}
                        @endif
                    </h2>
                    <div class="decription">
                        @if(app()->getLocale() == 'ar')
                            {!! $content->team_description_ar ?? '' !!}
                        @else
                            {!! $content->team_description ?? '' !!}
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                {{-- <div class="franchiseme_teams">
                    <div class="d-flex gap-3 team-card-section" id="lightSlider">
                        @forelse($teams as $team)
                            <div class="team-card">
                                <div class="team-icon-container">
                                    <img src="{{ asset($team->image) }}" height="50" alt="{{ app()->getLocale() == 'ar' ? $team->title_ar : $team->title }}" />
                                </div>
                                <div>
                                    <h4 class="sub_title">
                                        @if(app()->getLocale() == 'ar')
                                            {!! $team->title_ar ?? '' !!}
                                        @else
                                            {!! $team->title ?? '' !!}
                                        @endif
                                    </h4>
                                    <div class="decription">
                                        <p>
                                            @if(app()->getLocale() == 'ar')
                                                {!! $team->description_ar ?? '' !!}
                                            @else
                                                {!! $team->description ?? '' !!}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-muted">{{ app()->getLocale() == 'ar' ? 'لا توجد فريق' : 'No team members' }}</p>
                        @endforelse
                    </div>
                </div> --}}
                <div class="franchiseme_teams">
                    <div id="teamSplide" class="splide team-card-section">
                        <div class="splide__track slider-track">
                            <ul class="splide__list">
                                @forelse($teams as $team)
                                    <li class="splide__slide">
                                        <div class="team-card">
                                            <div class="team-icon-container">
                                                <img src="{{ asset($team->image) }}"
                                                    height="50"
                                                    alt="{{ app()->getLocale() == 'ar' ? $team->title_ar : $team->title }}">
                                            </div>

                                            <div>
                                                <h4 class="sub_title">
                                                    {{ app()->getLocale() == 'ar' ? $team->title_ar : $team->title }}
                                                </h4>

                                                <div class="decription">
                                                    <p>
                                                        {{ app()->getLocale() == 'ar' ? $team->description_ar : $team->description }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                    <li class="splide__slide">
                                        <p class="text-center text-muted">
                                            {{ app()->getLocale() == 'ar' ? 'لا توجد فريق' : 'No team members' }}
                                        </p>
                                    </li>
                                @endforelse

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Achievements Section -->
<section class="achievement-section">
    <div class="container">
        <div class="text-center content-header" data-aos="fade-up">
            <h2 class="title">
                @if(app()->getLocale() == 'ar')
                    {!! $content->achievement_title_ar ?? 'إنجازاتنا' !!}
                @else
                    {!! $content->achievement_title ?? 'Our Achievements' !!}
                @endif
            </h2>
            <div class="decription">
                <p>
                    @if(app()->getLocale() == 'ar')
                        {!! $content->achievement_tag_line_ar ?? '' !!}
                    @else
                        {!! $content->achievement_tag_line ?? '' !!}
                    @endif
                </p>
            </div>
        </div>

        <div class="row row-cols-md-4 row-cols-2 align-items-center justify-content-center g-3 text-center" data-aos="fade-up">
            <div>
                <h3 class="achievement-title achievement-title-counter" data-target="{{ $content->achievement_counter_one ?? 88 }}">0+</h3>
                <div class="decription">
                    <p>
                        @if(app()->getLocale() == 'ar')
                            {!! $content->achievement_counter_one_ar ?? '' !!}
                        @else
                            {!! $content->achievement_counter_one_en ?? '' !!}
                        @endif
                    </p>
                </div>
            </div>
            <div>
                <h3 class="achievement-title achievement-title-counter" data-target="{{ $content->achievement_counter_two ?? 300 }}">0+</h3>
                <div class="decription">
                    <p>
                        @if(app()->getLocale() == 'ar')
                            {!! $content->achievement_counter_two_ar ?? '' !!}
                        @else
                            {!! $content->achievement_counter_two_en ?? '' !!}
                        @endif
                    </p>
                </div>
            </div>
            <div>
                <h3 class="achievement-title achievement-title-counter" data-target="{{ $content->achievement_counter_three ?? 50 }}">0+</h3>
                <div class="decription">
                    <p>
                        @if(app()->getLocale() == 'ar')
                            {!! $content->achievement_counter_three_ar ?? '' !!}
                        @else
                            {!! $content->achievement_counter_three_en ?? '' !!}
                        @endif
                    </p>
                </div>
            </div>
            <div>
                <h3 class="achievement-title achievement-title-counter-deg" data-target="{{ $content->achievement_counter_four ?? 999 }}">0°</h3>
                <div class="decription">
                    <p>
                        @if(app()->getLocale() == 'ar')
                            {!! $content->achievement_counter_four_ar ?? '' !!}
                        @else
                            {!! $content->achievement_counter_four_en ?? '' !!}
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Clients Section -->
<section class="client-section" data-aos="fade-up">
    <div class="container">
        <div class="text-center content-header">
            <h2 class="title">
                @if(app()->getLocale() == 'ar')
                    {!! $content->client_title_ar ?? 'عملاؤنا' !!}
                @else
                    {!! $content->client_title ?? 'Our Clients' !!}
                @endif
            </h2>
            <div class="decription">
                <p>
                    @if(app()->getLocale() == 'ar')
                        {!! $content->client_description_ar ?? '' !!}
                    @else
                        {!! $content->client_description ?? '' !!}
                    @endif
                </p>
            </div>
        </div>
    </div>
    @php
        $clientImagesArray = $clientImages->toArray();
    @endphp

    <div class="slider-container">
        <!-- Single Slider for all Clients -->
        <div class="splide splide-clients" data-aos="fade-left">
            <div class="splide__track">
                <ul class="splide__list">
                    @forelse($clientImagesArray as $logo)
                        <li class="splide__slide">
                            <img src="{{ asset('storage/' . $logo['logo_path']) }}" alt="Client Logo" class="img-fluid client-logo" />
                        </li>
                    @empty
                        <li class="splide__slide">
                            <p class="text-center">{{ app()->getLocale() == 'ar' ? 'لا توجد عملاء' : 'No clients' }}</p>
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const counters = document.querySelectorAll(".achievement-title-counter");

        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = +counter.dataset.target;
                    let count = 0;
                    const step = Math.ceil(target / 150);

                    const interval = setInterval(() => {
                        count += step;
                        if (count > target) {
                            count = target;
                            clearInterval(interval);
                        }
                        counter.textContent = count + '+';
                    }, 20);

                    observer.unobserve(counter);
                }
            });
        }, { threshold: 0.5 });

        counters.forEach(counter => observer.observe(counter));
    });

    document.addEventListener("DOMContentLoaded", () => {
        const counters = document.querySelectorAll(".achievement-title-counter-deg");

        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = +counter.dataset.target;
                    let count = 0;
                    const step = Math.ceil(target / 150);

                    const interval = setInterval(() => {
                        count += step;
                        if (count > target) {
                            count = target;
                            clearInterval(interval);
                        }
                        counter.textContent = count + '°';
                    }, 20);

                    observer.unobserve(counter);
                }
            });
        }, { threshold: 0.5 });

        counters.forEach(counter => observer.observe(counter));
    });


// Initialize Team Slider with lightSlider - MUST run after jQuery and lightSlider are loaded
jQuery(document).ready(function() {
    if (jQuery.fn.lightSlider) {
        jQuery('#lightSlider').lightSlider({
            gallery: false,
            item: 3,
            auto: true,
            loop: true,
            slideMargin: 0,
            thumbItem: 0,
            rtl: {{ app()->getLocale() == 'ar' ? 'true' : 'false' }},
            responsive: [
                {
                    breakpoint: 1440,
                    settings: {
                        item: 3,
                        slideMove: 1
                    }
                },
                {
                    breakpoint: 1024,
                    settings: {
                        item: 2,
                        slideMove: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        item: 1,
                        slideMove: 1
                    }
                }
            ]
        });
    }
});

document.addEventListener('DOMContentLoaded', function () {
    new Splide('.splide-clients', {
        type: 'loop',
        drag: 'free',
        focus: 'center',
        perPage: 8,
        gap: '50px',
        arrows: false,
        pagination: false,
        direction: 'rtl',
        autoScroll: {
            speed: 0.5,
            pauseOnHover: true,
            pauseOnFocus: false,
        },
        breakpoints: {
            1400: {
                perPage: 6,
                gap: '40px',
            },
            1280: {
                perPage: 5,
                gap: '30px',
            },
            768: {
                perPage: 4,
                gap: '20px',
            },
            480: {
                perPage: 3,
                gap: '10px',
            },
        },
    }).mount(window.splide.Extensions);
});
</script>

{{-- --------------------------------- --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    new Splide('#teamSplide', {
        type       : 'loop',
        perPage    : 3,
        perMove    : 1,
        gap        : '20px',
        arrows     : false,
        pagination : false,
        autoplay  : true,
        interval  : 3000,
        pauseOnHover: true,
        direction  : '{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}',

        breakpoints: {
            1024: {
                perPage: 2,
            },
            576: {
                perPage: 1,
            },
        },
    }).mount();

});
</script>

@endsection
