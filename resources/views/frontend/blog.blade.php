@extends('frontend.master-new')

@section('content')

<!-- Page Title -->
<div class="topbar">
    <section class="contactus_Section pagetitle" @if($pageBlog && $pageBlog->background_image) style="background-image: url('{{ asset($pageBlog->background_image) }}')" @endif>
        <div class="container-fluid px-5">
            <div class="container container_box position-relative">
                <h1 class="hero-title">
                    @if(app()->getLocale() == 'ar')
                        {!! $pageBlog->title_ar ?? '' !!} 
                    @else
                        {!! $pageBlog->title ?? '' !!}
                    @endif
                </h1>
                <div class="breadcrumbs">
                    <a href="{{ route('index') }}">{{ app()->getLocale() == 'ar' ? 'الرئيسية' : 'Home' }}</a>
                    <p class="mb-0">{{ app()->getLocale() == 'ar' ? 'المدونة' : 'Blog' }}</p>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Blog Section -->
<section class="blog-section">
    <div class="container">
        <div class="row gap-3 gap-md-2 gap-lg-4 justify-content-center">
            <!-- Cards Container -->
            <div class="row col-12 col-md-8 gx-3 gx-md-4" id="blog-cards-container">
                @forelse($blogs as $blog)
                    <!-- Blog Card -->
                    <div class="col-12 col-md-6 blog-card" data-aos="fade-up">
                        <a href="{{ route('singleblog', $blog->id) }}" class="card-link">
                            <img src="{{ asset($blog->feature_image) }}" class="img-fluid" alt="{{ app()->getLocale() == 'ar' ? $blog->title_ar : $blog->title }}" />
                            <div class="blog-card-content">
                                <p class="blog-date">
                                    {{ \Carbon\Carbon::parse($blog->published_at)->format('F d, Y') }}
                                </p>
                                <h3 class="blog-title">
                                    {{ app()->getLocale() == 'ar' ? $blog->title_ar : $blog->title }}
                                </h3>
                                <p class="blog-caption">
                                    {!! html_limit_safe(app()->getLocale() == 'ar' ? $blog->description_ar : $blog->description, 200) !!}
                                </p>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">{{ app()->getLocale() == 'ar' ? 'لا توجد مدونات متاحة حالياً' : 'No blogs available at the moment' }}</p>
                    </div>
                @endforelse
            </div>

            <!-- Actions Container (Sidebar) -->
            <div class="col-12 col-md-4" data-aos="fade-left">
                <!-- Search Bar -->
                <div class="search-container">
                    <i class="fa fa-search"></i>
                    <input type="search" class="search-input" id="blog-search-input" placeholder="{{ app()->getLocale() == 'ar' ? 'ابحث عن المدونات' : 'Search Blogs' }}" data-recent-blogs="{{ json_encode($recentBlogs) }}" />
                </div>

                <!-- Latest Blogs Widget -->
                <div class="latest-blog-container">
                    <h2 class="latest-title">{{ app()->getLocale() == 'ar' ? 'أحدث المدونات' : 'Latest Blogs' }}</h2>
                    <p class="latest-caption">{{ app()->getLocale() == 'ar' ? 'استكشف أحدث مقالات المدونة' : 'Explore latest blog posts' }}</p>

                    <div class="d-flex flex-column latest-blog-content">
                        @forelse($recentBlogs as $recent)
                            <div class="latest-blog-card">
                                <a href="{{ route('singleblog', $recent->id) }}" class="card-link">
                                    <img src="{{ asset($recent->feature_image) }}" class="latest-blog-img" alt="{{ app()->getLocale() == 'ar' ? $recent->title_ar : $recent->title }}" />
                                    <div>
                                        <p class="latest-blog-date">
                                            {{ \Carbon\Carbon::parse($recent->published_at)->format('F d, Y') }}
                                        </p>
                                        <h4 class="latest-blog-title">
                                            {{ app()->getLocale() == 'ar' ? $recent->title_ar : $recent->title }}
                                        </h4>
                                    </div>
                                </a>
                            </div>
                        @empty
                            <p class="text-muted">{{ app()->getLocale() == 'ar' ? 'لا توجد مدونات' : 'No blogs' }}</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        @if($blogs->lastPage() > 1)
            <div class="blog-pagination-container d-flex justify-content-center align-items-center gap-3 mt-5" data-aos="fade-up" id="pagination-container">
                <!-- Previous Button -->
                @if($blogs->onFirstPage())
                    <button class="blog-pagination-btn" disabled>
                        <i class="fa fa-angle-left"></i>
                    </button>
                @else
                    <a href="{{ $blogs->previousPageUrl() }}" class="blog-pagination-btn">
                        <i class="fa fa-angle-left"></i>
                    </a>
                @endif

                <!-- Page Numbers -->
                @foreach($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)
                    @if($page == 1 || $page == $blogs->lastPage() || (abs($page - $blogs->currentPage()) <= 1))
                        @if($page == $blogs->currentPage())
                            <button class="blog-pagination-btn active">
                                <span class="blog-pagination">{{ $page }}</span>
                            </button>
                        @else
                            <a href="{{ $url }}" class="blog-pagination-btn">
                                <span class="blog-pagination">{{ $page }}</span>
                            </a>
                        @endif
                    @elseif($page == 2 && $blogs->currentPage() > 4)
                        <button class="blog-pagination-btn" disabled>
                            <span class="blog-pagination">...</span>
                        </button>
                    @elseif($page == $blogs->lastPage() - 1 && $blogs->currentPage() < $blogs->lastPage() - 3)
                        <button class="blog-pagination-btn" disabled>
                            <span class="blog-pagination">...</span>
                        </button>
                    @endif
                @endforeach

                <!-- Next Button -->
                @if($blogs->hasMorePages())
                    <a href="{{ $blogs->nextPageUrl() }}" class="blog-pagination-btn">
                        <i class="fa fa-angle-right"></i>
                    </a>
                @else
                    <button class="blog-pagination-btn" disabled>
                        <i class="fa fa-angle-right"></i>
                    </button>
                @endif
            </div>
        @endif
    </div>
</section>

@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('blog-search-input');
        const latestBlogContent = document.querySelector('.latest-blog-content');
        const recentBlogsData = JSON.parse(searchInput.getAttribute('data-recent-blogs'));
        const isArabic = document.documentElement.lang === 'ar';
        
        // Store original HTML
        const originalHTML = latestBlogContent.innerHTML;
        
        searchInput.addEventListener('input', function() {
            const searchQuery = this.value.toLowerCase().trim();
            
            if (searchQuery === '') {
                // Restore original recent blogs
                latestBlogContent.innerHTML = originalHTML;
            } else {
                // Filter recent blogs
                const filteredBlogs = recentBlogsData.filter(blog => {
                    const title = isArabic ? (blog.title_ar || '').toLowerCase() : (blog.title || '').toLowerCase();
                    const description = isArabic ? (blog.description_ar || '').toLowerCase() : (blog.description || '').toLowerCase();
                    return title.includes(searchQuery) || description.includes(searchQuery);
                });
                
                // Display filtered results in sidebar
                if (filteredBlogs.length > 0) {
                    let html = '';
                    filteredBlogs.forEach(blog => {
                        const title = isArabic ? blog.title_ar : blog.title;
                        const publishedDate = new Date(blog.published_at).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });
                        
                        html += `
                            <div class="latest-blog-card">
                                <a href="/singleblog/${blog.id}" class="card-link">
                                    <img src="${blog.feature_image}" class="latest-blog-img" alt="${title}" />
                                    <div>
                                        <p class="latest-blog-date">${publishedDate}</p>
                                        <h4 class="latest-blog-title">${title}</h4>
                                    </div>
                                </a>
                            </div>
                        `;
                    });
                    
                    latestBlogContent.innerHTML = html;
                } else {
                    latestBlogContent.innerHTML = `<p class="text-muted">${isArabic ? 'لم يتم العثور على نتائج' : 'No results found'}</p>`;
                }
            }
        });
    });
</script>
@endsection

