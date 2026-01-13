@extends('frontend.master-new')

@section('content')

<!-- Page Title -->
<div class="topbar">
    <section class="contactus_Section pagetitle" @if($pageBlog && $pageBlog->background_image) style="background-image: url('{{ asset($pageBlog->background_image) }}')" @endif>
        <div class="container-fluid px-5">
            <div class="container container_box position-relative">
                <a class="back_btn" href="{{ route('blog') }}">
                    <i class="fa fa-angle-left"></i> 
                    {{ app()->getLocale() == 'ar' ? 'رجوع' : 'Back' }}
                </a>
                <h1 class="hero-title">
                     @if(app()->getLocale() == 'ar') تفاصيل المدونة  @else Blog Detail @endif
                </h1>
                <div class="breadcrumbs">
                    <a href="{{ route('index') }}">{{ app()->getLocale() == 'ar' ? 'الرئيسية' : 'Home' }}</a>
                    <p class="mb-0">{{ app()->getLocale() == 'ar' ? 'المدونة' : 'Blog' }}</p>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Blog Detail Section -->
<section class="blog-section">
    <div class="container">
        <div class="text-center content-header">
            <h1 class="title">
                {{ app()->getLocale() == 'ar' ? $blog->title_ar : $blog->title }}
            </h1>
        </div>
        <img src="{{ asset($blog->feature_image) }}" class="blog-cover-img" data-aos="zoom-in" alt="{{ app()->getLocale() == 'ar' ? $blog->title_ar : $blog->title }}" />

        <div class="blog-detail-container" data-aos="fade-up">
            <div class="d-flex gap-1 gap-lg-2 align-items-center">
                        <i class="fa-regular fa-calendar blog-detail-cal-icon"></i>
                        <span class="blog-detail-date">
                            {{ \Carbon\Carbon::parse($blog->published_at)->format('F d, Y') }}
                        </span>
                    </div>

            <!-- Blog Content -->
            <div class="blog-detail-content">
                @if(app()->getLocale() == 'ar')
                    {!! $blog->description_ar ?? '' !!}
                @else
                    {!! $blog->description ?? '' !!}
                @endif
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')
<script>
    // Scroll animations
    document.addEventListener('DOMContentLoaded', function() {
        AOS.refresh();
    });
</script>
@endsection
