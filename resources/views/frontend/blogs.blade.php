@extends('frontend.master')

@section('style')
@endsection
@section('content')

{{-- <section class="page_title position-relative my-0">
    <div class="container text-center d-flex flex-column align-items-center gap-3" data-aos="fade-up">
        <h1 class="text-white mb-0">
            <span data-en="Blog" data-ar="المدونة">
                {{ app()->getLocale() == 'ar' ? 'المدونة' : 'Blog' }}
            </span>
        </h1>
    </div>
</section> --}}

<section class="page_title position-relative my-0"
         style="background-image: url('{{ asset($pageBlog->background_image ?? 'default.jpg') }}');">
    
    <div class="container text-center d-flex flex-column align-items-center gap-3" data-aos="fade-up">
        <span>
            @if(app()->getLocale() == 'ar')
                {!! $pageBlog->title_ar ?? '' !!}
            @else
                {!! $pageBlog->title ?? '' !!}
            @endif
        </span>

    </div>
</section>

<section>
    <div class="container">
        <div class="row">

            <!-- LEFT SIDE BLOG LIST -->
            <div class="col-md-8">
                <div class="blog_list d-flex flex-column gap-4">

                    @foreach($blogs as $blog)
                        <div class="blog_item" data-aos="fade-up">

                            <img src="{{ asset($blog->feature_image) }}" 
                                 alt="" class="img-fluid mb-4 feature_image rounded-4">

                            <!-- DATE -->
                            <div class="contain black mb-1 d-flex align-items-center gap-2">
                                <img src="{{asset('assets/image/calendar.png')}}" alt="" class="img-fluid" width="16px">
                                <p class="mb-0 small">
                                    {{ \Carbon\Carbon::parse($blog->published_at)->format('F d, Y') }}
                                </p>
                            </div>

                            <!-- TITLE -->
                            <h4 class="sub_title mb-2">
                                {{ app()->getLocale() == 'ar' ? $blog->title_ar : $blog->title }}
                            </h4>

                            <!-- SHORT DESCRIPTION -->
                            <div class="contain black">
                                <p class="mb-0">
                                    {!! Str::limit(app()->getLocale() == 'ar' ? $blog->description_ar : $blog->description, 200) !!}
                                </p>
                            </div>

                            <!-- READ MORE -->
                            <div class="d-flex">
                                <a href="{{ route('singleblog', $blog->id) }}" class="button btn_secoundry mt-3">
                                    <div class="btn_text" data-en="Read More" data-ar="اقرأ المزيد">
                                        {{ app()->getLocale() == 'ar' ? 'اقرأ المزيد' : 'Read More' }}
                                    </div>
                                </a>
                            </div>
                             {{-- <div class="d-flex">
                                    <a href="singleblog.html" class="button btn_secoundry mt-3">
                                        <div class="btn_text">Read More</div>
                                    </a>
                            </div> --}}
                            
                        </div>
                    @endforeach

                </div>

                <!-- PAGINATION -->
                <div class="mt-4">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center mb-0">
                            {{ $blogs->links('pagination::bootstrap-4') }}
                        </ul>
                    </nav>
                </div>

            </div>

            <!-- RIGHT SIDE RECENT POSTS -->
            <div class="col-md-4">
                <div class="bg_section rounded-4 p-3">
                    <h4 class="sub_title mb-3" data-en="Recent Posts" data-ar="أحدث المقالات">
                        {{ app()->getLocale() == 'ar' ? 'أحدث المقالات' : 'Recent Posts' }}
                    </h4>

                    <div class="recent_posts d-flex flex-column gap-4">
                        @foreach($recentBlogs as $recent)
                            <div class="blog_item d-flex">

                                <img src="{{ asset($recent->feature_image) }}" 
                                     alt="" class="img-fluid feature_image rounded-4" width="90">

                                <div class="right_contain black ps-2">

                                    <div class="contain black mb-1 d-flex align-items-center gap-2">
                                        <img src="{{asset('assets/image/calendar.png')}}" alt="" class="img-fluid" width="16px">
                                        <p class="mb-0 small">
                                            {{ \Carbon\Carbon::parse($recent->published_at)->format('F d, Y') }}
                                        </p>
                                    </div>

                                    <a href="{{ route('singleblog', $recent->id) }}"
                                       class="sub_title mb-0">
                                        {{ app()->getLocale() == 'ar' ? $recent->title_ar : $recent->title }}
                                    </a>

                                </div>

                            </div>
                        @endforeach
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

@endsection
