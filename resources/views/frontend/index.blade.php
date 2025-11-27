@extends('frontend.master')

@section('content')
@php
    $heroImage = isset($content->hero_background_image) && $content->hero_background_image
        ? asset('storage/' . $content->hero_background_image)
        : asset('assets/image/hero.jpg');

    $aboutImage = isset($content->about_image) && $content->about_image
        ? asset('storage/' . $content->about_image)
        : asset('assets/image/testimonial-bg-image.jpg');

    $strategyImage = isset($content->strategy_image) && $content->strategy_image
        ? asset('storage/' . $content->strategy_image)
        : asset('assets/image/logo.png');

    $achivementImage = isset($content->achievement_image) && $content->achievement_image
        ? asset('storage/' . $content->achievement_image)
        : asset('assets/image/ifa.png');
@endphp
<div class="container-fluid px-4 pt-4">
    <section class="hero_section position-relative my-0" style="background-image: url('{{ $heroImage }}');">
        <div class="overlay d-flex align-items-center justify-content-center position-relative">
            <div class="container text-center d-flex flex-column align-items-center gap-3 z-3" data-aos="fade-up">
                <div>
                    <h1 class="text-center text-white mb-0">
                        @if(app()->getLocale() == 'ar')
                            {!! $content->hero_title_ar ?? '' !!}
                        @else
                            {!! $content->hero_title ?? '' !!}
                        @endif
                    </h1>
                </div>
                <a href="{!! $content->hero_button_url ?? '' !!}" class="button btn_primary mt-4">
                    <div class="btn_text">
                        @if(app()->getLocale() == 'ar')
                            {!! $content->hero_button_text_ar ?? '' !!}
                        @else
                            {!! $content->hero_button_text ?? '' !!}
                        @endif
                    </div>
                </a>
            </div>
            <a href="#about_us" class="scroll_down position-absolute">
                <img src="{{ asset('assets/image/business-rev-scroll.png') }}" alt="" class="img-fluid">
            </a>
        </div>
    </section>
</div>

<section class="about_section section_padding my-0" id="about_us">
    <div class="container">
        <div class="row">
            <div class="col-xl-7">
                <img src="{{ $aboutImage }}" alt="" class="img-fluid rounded-4" data-aos="fade-up">
            </div>
            <div class="col-xl-5 d-flex align-items-center">
                <div class="ps-3">
                    <div class="d-flex flex-wrap title_wrap mb-md-4 mb-3">
                        <h2 class="title mb-0">
                            @if(app()->getLocale() == 'ar')
                                {!! $content->about_title_ar ?? '' !!}
                            @else
                                {!! $content->about_title ?? '' !!}
                            @endif
                        </h2>
                    </div>
                    <div class="contain black">
                        <p class="mb-0">
                            @if(app()->getLocale() == 'ar')
                                {!! $content->about_description_ar ?? '' !!}
                            @else
                                {!! $content->about_description ?? '' !!}
                            @endif
                        </p>
                    </div>
                    <div class="d-flex mt-4">
                        <a href="{!! $content->about_button_url ?? '' !!}" class="button btn_secoundry">
                            <div class="btn_text">
                                @if(app()->getLocale() == 'ar')
                                    {!! $content->about_button_text_ar ?? '' !!}
                                @else
                                    {!! $content->about_button_text ?? '' !!}
                                @endif
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="circel_data mt-0">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 d-flex flex-column gap-3 position-relative">
                <div class="row first_row">
                    <div class="col-md-6 d-flex card_left" style="justify-content: end;">
                        <div class="me-5 pe-5">
                            <div class="card" data-aos="fade-right">
                                <div class="card-body p-0">
                                    <div>
                                        <h4 class="sub_title">
                                            @if(app()->getLocale() == 'ar')
                                                {!! $content->strategy_title1_ar ?? '' !!}
                                            @else
                                                {!! $content->strategy_title1 ?? '' !!}
                                            @endif    
                                        </h4>
                                        <div class="contain black">
                                            @if(app()->getLocale() == 'ar')
                                                {!! $content->strategy_description1_ar ?? '' !!}
                                            @else
                                                {!! $content->strategy_description1 ?? '' !!}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="count">
                                        <h1>01</h1>
                                    </div>
                                </div>
                                <canvas id="canvas_one" width="80" height="94.53"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex card_right" style="justify-content: start;">
                        <div class="ms-5 ps-5">
                            <div class="card" data-aos="fade-left">
                                <div class="card-body p-0">
                                    <div class="count">
                                        <h1>06</h1>
                                    </div>
                                    <div>
                                        <h4 class="sub_title">
                                            @if(app()->getLocale() == 'ar')
                                                {!! $content->strategy_title6_ar ?? '' !!}
                                            @else
                                                {!! $content->strategy_title6 ?? '' !!}
                                            @endif
                                        </h4>
                                        <div class="contain black">
                                            @if(app()->getLocale() == 'ar')
                                                {!! $content->strategy_description6_ar ?? '' !!}
                                            @else
                                                {!! $content->strategy_description6 ?? '' !!}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <canvas id="canvas_two" width="80" height="94.53"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row middle_row">
                    <div class="col-md d-flex flex-column align-items-end gap-3 card_left">
                        <div class="card_first">
                            <div class="card" data-aos="fade-right">
                                <div class="card-body p-0">
                                    <div>
                                        <h4 class="sub_title">
                                            @if(app()->getLocale() == 'ar')
                                                {!! $content->strategy_title2_ar ?? '' !!}
                                            @else
                                                {!! $content->strategy_title2 ?? '' !!}
                                            @endif
                                        </h4>
                                        <div class="contain black">
                                            @if(app()->getLocale() == 'ar')
                                                {!! $content->strategy_description2_ar ?? '' !!}
                                            @else
                                                {!! $content->strategy_description2 ?? '' !!}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="count">
                                        <h1>02</h1>
                                    </div>
                                </div>
                                <canvas id="canvas_three" width="168" height="80"></canvas>
                            </div>
                        </div>
                        <div class="me-5 card_secound">
                            <div class="card" data-aos="fade-right">
                                <div class="card-body p-0">
                                    <div>
                                        <h4 class="sub_title">
                                            @if(app()->getLocale() == 'ar')
                                                {!! $content->strategy_title3_ar ?? '' !!}
                                            @else
                                                {!! $content->strategy_title3 ?? '' !!}
                                            @endif
                                        </h4>
                                        <div class="contain black">
                                            @if(app()->getLocale() == 'ar')
                                                {!! $content->strategy_description3_ar ?? '' !!}
                                            @else
                                                {!! $content->strategy_description3 ?? '' !!}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="count">
                                        <h1>03</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card_third">
                            <div class="card" data-aos="fade-right">
                                <div class="card-body p-0">
                                    <div>
                                        <h4 class="sub_title">
                                            @if(app()->getLocale() == 'ar')
                                                {!! $content->strategy_title4_ar ?? '' !!}
                                            @else
                                                {!! $content->strategy_title4 ?? '' !!}
                                            @endif
                                        </h4>
                                        <div class="contain black">
                                            @if(app()->getLocale() == 'ar')
                                                {!! $content->strategy_description4_ar ?? '' !!}
                                            @else
                                                {!! $content->strategy_description4 ?? '' !!}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="count">
                                        <h1>04</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex align-items-center">
                        <div class="px-xxl-5 px-xl-3 center_circle_pedding">
                            <div class="center_cicel z-2 position-relative bg-white">
                                <img src="{{ $strategyImage }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="col-md d-flex flex-column align-items-start gap-3 card_right">
                        <div class="card_first">
                            <div class="card" data-aos="fade-left">
                                <div class="card-body p-0">
                                    <div class="count">
                                        <h1>07</h1>
                                    </div>
                                    <div>
                                        <h4 class="sub_title">
                                            @if(app()->getLocale() == 'ar')
                                                {!! $content->strategy_title7_ar ?? '' !!}
                                            @else
                                                {!! $content->strategy_title7 ?? '' !!}
                                            @endif
                                        </h4>
                                        <div class="contain black">
                                            @if(app()->getLocale() == 'ar')
                                                {!! $content->strategy_description7_ar ?? '' !!}
                                            @else
                                                {!! $content->strategy_description7 ?? '' !!}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <canvas id="canvas_four" width="167" height="80"></canvas>
                            </div>
                        </div>
                        <div class="ms-5 card_secound">
                            <div class="card" data-aos="fade-left">
                                <div class="card-body p-0">
                                    <div class="count">
                                        <h1>08</h1>
                                    </div>
                                    <div>
                                        <h4 class="sub_title">
                                            @if(app()->getLocale() == 'ar')
                                                {!! $content->strategy_title8_ar ?? '' !!}
                                            @else
                                                {!! $content->strategy_title8 ?? '' !!}
                                            @endif    
                                        </h4>
                                        <div class="contain black">
                                            @if(app()->getLocale() == 'ar')
                                                {!! $content->strategy_description8_ar ?? '' !!}
                                            @else
                                                {!! $content->strategy_description8 ?? '' !!}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card_third">
                            <div class="card" data-aos="fade-left">
                                <div class="card-body p-0">
                                    <div class="count">
                                        <h1>09</h1>
                                    </div>
                                    <div>
                                        <h4 class="sub_title">
                                            @if(app()->getLocale() == 'ar')
                                                {!! $content->strategy_title9_ar ?? '' !!}
                                            @else
                                                {!! $content->strategy_title9 ?? '' !!}
                                            @endif
                                        </h4>
                                        <div class="contain black">
                                            @if(app()->getLocale() == 'ar')
                                                {!! $content->strategy_description9_ar ?? '' !!}
                                            @else
                                                {!! $content->strategy_description9 ?? '' !!}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row last_row">
                    <div class="col-md-6 d-flex card_left" style="justify-content: end;">
                        <div class="me-5 pe-5">
                            <div class="card" data-aos="fade-right">
                                <div class="card-body p-0">
                                    <div>
                                        <h4 class="sub_title">
                                            @if(app()->getLocale() == 'ar')
                                                {!! $content->strategy_title5_ar ?? '' !!}
                                            @else
                                                {!! $content->strategy_title5 ?? '' !!}
                                            @endif
                                        </h4>
                                        <div class="contain black">
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
                    </div>
                    <div class="col-md-6 d-flex card_right" style="justify-content: start;">
                        <div class="ms-5 ps-5">
                            <div class="card" data-aos="fade-left">
                                <div class="card-body p-0">
                                    <div class="count">
                                        <h1>10</h1>
                                    </div>
                                    <div>
                                        <h4 class="sub_title">
                                            @if(app()->getLocale() == 'ar')
                                                {!! $content->strategy_title10_ar ?? '' !!}
                                            @else
                                                {!! $content->strategy_title10 ?? '' !!}
                                            @endif
                                        </h4>
                                        <div class="contain black">
                                            @if(app()->getLocale() == 'ar')
                                                {!! $content->strategy_description10_ar ?? '' !!}
                                            @else
                                                {!! $content->strategy_description10 ?? '' !!}
                                            @endif
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

<section class="our_mission_vission my-0 bg_section section_padding">
    <div class="container">
        <div class="row g-5">
            <div class="col-xl-6">
                <div data-aos="fade-up">
                    <div class="d-flex flex-wrap title_wrap mb-md-4 mb-3">
                        <h2 class="title mb-0">
                            @if(app()->getLocale() == 'ar')
                                {!! $content->vision_title_ar ?? '' !!}
                            @else
                                {!! $content->vision_title ?? '' !!}
                            @endif
                        </h2>
                    </div>
                    <div class="contain black">
                        <p class="mb-0">
                            @if(app()->getLocale() == 'ar')
                                {!! $content->vision_description_ar ?? '' !!}
                            @else
                                {!! $content->vision_description ?? '' !!}
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 mv_right">
                <div data-aos="fade-up">
                    <div class="d-flex flex-wrap title_wrap mb-md-4 mb-3">
                        <h2 class="title mb-0">
                            @if(app()->getLocale() == 'ar')
                                {!! $content->mission_title_ar ?? '' !!}
                            @else
                                {!! $content->mission_title ?? '' !!}
                            @endif
                        </h2> 
                    </div>
                    <div class="contain black">
                        <p class="mb-0">
                            @if(app()->getLocale() == 'ar')
                                {!! $content->mission_description_ar ?? '' !!}
                            @else
                                {!! $content->mission_description ?? '' !!}
                            @endif</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="">
    <div class="container">
        <div class="text-center">
            <div class="d-flex flex-wrap title_wrap mb-3 justify-content-center">
                <h2 class="title mb-0">
                    @if(app()->getLocale() == 'ar')
                        {!! $content->team_title_ar ?? '' !!}
                    @else
                        {!! $content->team_title ?? '' !!}
                    @endif
                </h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="contain black text-center">
                        <p class="mb-0">
                            @if(app()->getLocale() == 'ar')
                                {!! $content->team_description_ar ?? '' !!}
                            @else
                                {!! $content->team_description ?? '' !!}
                            @endif    
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="as_section_new mt-5">
            <div class="card as_main_card text-center">
                <div class="card-body p-0">
                    <ul id="our_team_slider">
                        <li>
                            <img src="{{ asset('assets/image/master-plan-integrate.png') }}" alt="" class="img-fluid mb-2 team_section_icon">
                            <h4 class="sub_title mb-2 text-center">
                                @if(app()->getLocale() == 'ar')
                                    {!! $content->team_title1_ar ?? '' !!}
                                @else
                                    {!! $content->team_title1 ?? '' !!}
                                @endif
                            </h4>
                            <div class="contain black">
                                <p class="text-center">
                                    @if(app()->getLocale() == 'ar')
                                        {!! $content->team_description1_ar ?? '' !!}
                                    @else
                                        {!! $content->team_description1 ?? '' !!}
                                    @endif
                                </p>
                            </div>
                        </li>
                        <li>
                            <img src="{{ asset('assets/image/codewindow.png') }}" alt="" class="img-fluid mb-2 team_section_icon">
                            <h4 class="sub_title mb-2 text-center">
                                @if(app()->getLocale() == 'ar')
                                    {!! $content->team_title2_ar ?? '' !!}
                                @else
                                    {!! $content->team_title2 ?? '' !!}
                                @endif
                            </h4>
                            <div class="contain black">
                                <p class="text-center">
                                    @if(app()->getLocale() == 'ar')
                                        {!! $content->team_description2_ar ?? '' !!}
                                    @else
                                        {!! $content->team_description2 ?? '' !!}
                                    @endif
                                </p>
                            </div>
                        </li>
                        <li>
                            <img src="{{ asset('assets/image/user-headset.png') }}" alt="" class="img-fluid mb-2 team_section_icon">
                            <h4 class="sub_title mb-2 text-center">
                                @if(app()->getLocale() == 'ar')
                                    {!! $content->team_title3_ar ?? '' !!}
                                @else
                                    {!! $content->team_title3 ?? '' !!}
                                @endif
                            </h4>
                            <div class="contain black">
                                <p class="text-center">
                                    @if(app()->getLocale() == 'ar')
                                        {!! $content->team_description3_ar ?? '' !!}
                                    @else
                                        {!! $content->team_description3 ?? '' !!}
                                    @endif
                                </p>
                            </div>
                        </li>
                        <li>
                            <img src="{{ asset('assets/image/web-design.png') }}" alt="" class="img-fluid mb-2 team_section_icon">
                            <h4 class="sub_title mb-2 text-center">
                                @if(app()->getLocale() == 'ar')
                                    {!! $content->team_title4_ar ?? '' !!}
                                @else
                                    {!! $content->team_title4 ?? '' !!}
                                @endif
                            </h4>
                            <div class="contain black">
                                <p class="text-center">
                                    @if(app()->getLocale() == 'ar')
                                        {!! $content->team_description4_ar ?? '' !!}
                                    @else
                                        {!! $content->team_description4 ?? '' !!}
                                    @endif
                                </p>
                            </div>
                        </li>
                        <li>
                            <img src="{{ asset('assets/image/website-speed.png') }}" alt="" class="img-fluid mb-2 team_section_icon">
                            <h4 class="sub_title mb-2 text-center">
                                @if(app()->getLocale() == 'ar')
                                    {!! $content->team_title5_ar ?? '' !!}
                                @else
                                    {!! $content->team_title5 ?? '' !!}
                                @endif
                            </h4>
                            <div class="contain black">
                                <p class="text-center">
                                    @if(app()->getLocale() == 'ar')
                                        {!! $content->team_description5_ar ?? '' !!}
                                    @else
                                        {!! $content->team_description5 ?? '' !!}
                                    @endif
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg_section section_padding as_section_new">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-center title_wrap mb-md-4">
            <h2 class="title mb-0">
                @if(app()->getLocale() == 'ar')
                    {!! $content->achievement_title_ar ?? '' !!}
                @else
                    {!! $content->achievement_title ?? '' !!}
                @endif
            </h2>
        </div>
        <div class="d-flex gap-2 justify-content-center mb-3">
            <p class="sub_title mb-0">
                @if(app()->getLocale() == 'ar')
                    {!! $content->achievement_tag_line_ar ?? '' !!}
                @else
                    {!! $content->achievement_tag_line ?? '' !!}
                @endif
            </p>
            <p class="sub_title counter_info mb-0 fw-bold" data-target="400">0</p>
        </div>
        <div class="contain black text-center mx-md-5">
            <p>
                @if(app()->getLocale() == 'ar')
                    {!! $content->achievement_description_ar ?? '' !!}
                @else
                    {!! $content->achievement_description ?? '' !!}
                @endif
            </p>
        </div>
        <img src="{{ asset('assets/image/ifa.png') }}" alt="" class="img-fluid mt-4 d-block mx-auto achievements_img">
    </div>
</section>

<section class="our_franchise bg-transparent text-center mt-0">
    <div class="container">
        <div class="text-center mb-5">
            <div class="d-flex flex-wrap title_wrap mb-3 justify-content-center">
                <h2 class="title mb-0">
                    @if(app()->getLocale() == 'ar')
                        {!! $content->client_title_ar ?? '' !!}
                    @else
                        {!! $content->client_title ?? '' !!}
                    @endif    
                </h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="contain black text-center">
                        <p class="mb-0">
                            @if(app()->getLocale() == 'ar')
                                {!! $content->client_description_ar ?? '' !!}
                            @else
                                {!! $content->client_description ?? '' !!}
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="brand_logos">
                    <div class="splide brand_logo_slider">
                        <div class="splide__track">
                            <ul class="splide__list">
                                @foreach($clientImages as $logo)
                                    <li class="splide__slide">
                                        <img src="{{ asset('storage/' . $logo->logo_path) }}" alt="Client Logo" class="img-fluid client_logo">
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection