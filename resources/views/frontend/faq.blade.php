@extends('frontend.master-new')

@section('content')

<!-- Page Title -->
<div class="topbar">
    <section class="contactus_Section pagetitle" @if($faq && $faq->background_image) style="background-image: url('{{ asset('storage/'.$faq->background_image) }}')" @endif>
        <div class="container-fluid px-5">
            <div class="container container_box position-relative">
                <h1 class="hero-title mb-3">
                    {{-- {{ app()->getLocale() == 'ar' ? 'الأسئلة الشائعة' : 'FAQs' }} --}}
                     @if(app()->getLocale() == 'ar')
                    {!! $faq->title_ar ?? '' !!}
                    @else
                        {!! $faq->title ?? '' !!}
                    @endif
                </h1>
                <div class="breadcrumbs">
                    <a href="{{ route('index') }}">{{ app()->getLocale() == 'ar' ? 'الرئيسية' : 'Home' }}</a>
                    <p class="mb-0">{{ app()->getLocale() == 'ar' ? 'الأسئلة الشائعة' : 'FAQs' }}</p>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- FAQs Section -->
<section class="faq-section">
    <div class="container container_small">
        <!-- Content Header -->
        <div class="content-header mx-auto text-center" data-aos="fade">
            <p class="sub_title">
                @if(app()->getLocale() == 'ar')
                    {!! $faq->description_ar ?? '' !!}
                @else
                    {!! $faq->description ?? '' !!}
                @endif
            </p>
        </div>

        <!-- FAQs Container - Accordion -->
        <div class="accordion faq_list d-flex flex-column gap-3 gap-lg-4 w-100" id="accordionExample" data-aos="fade-up">
            @forelse($faqItems as $index => $item)
                @php
                    $headingId = 'heading' . $index;
                    $collapseId = 'collapse' . $index;
                @endphp

                <div class="accordion-item aos-init aos-animate">
                    <h2 class="accordion-header" id="{{ $headingId }}">
                        <button class="accordion-button {{ $index == 0 ? '' : 'collapsed' }}" 
                                type="button" 
                                data-bs-toggle="collapse" 
                                data-bs-target="#{{ $collapseId }}" 
                                aria-expanded="{{ $index == 0 ? 'true' : 'false' }}" 
                                aria-controls="{{ $collapseId }}">
                            @if(app()->getLocale() == 'ar')
                                {!! $item->question_ar ?? '' !!}
                            @else
                                {!! $item->question ?? '' !!}
                            @endif
                        </button>
                    </h2>
                    <div id="{{ $collapseId }}" 
                         class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}" 
                         aria-labelledby="{{ $headingId }}" 
                         data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            @if(app()->getLocale() == 'ar')
                                {!! $item->answer_ar ?? '' !!}
                            @else
                                {!! $item->answer ?? '' !!}
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted">{{ app()->getLocale() == 'ar' ? 'لا توجد أسئلة شائعة متاحة' : 'No FAQs available' }}</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

@endsection
