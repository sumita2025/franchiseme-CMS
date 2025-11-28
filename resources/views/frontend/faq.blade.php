@extends('frontend.master')

@section('content')
{{-- <section class="page_title position-relative my-0">
    <div class="container text-center d-flex flex-column align-items-center gap-3" data-aos="fade-up">
        <h1 class="text-white mb-0">
            <span>
                @if(app()->getLocale() == 'ar')
                    {!! $faq->title_ar ?? '' !!}
                @else
                    {!! $faq->title ?? '' !!}
                @endif
            </span>
        </h1>
    </div>
</section> --}}
<section class="page_title position-relative my-0"
         style="background-image: url('{{ asset('storage/'.$faq->background_image ?? 'default.jpg') }}'); 
                background-size: cover; 
                background-position: center; 
                background-repeat: no-repeat;">
    
    <div class="container text-center d-flex flex-column align-items-center gap-3" data-aos="fade-up">
        <h1 class="text-white mb-0">
            <span>
                @if(app()->getLocale() == 'ar')
                    {!! $faq->title_ar ?? '' !!}
                @else
                    {!! $faq->title ?? '' !!}
                @endif
            </span>
        </h1>
    </div>
</section>

<section class="faq_section">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-md-7">
                <div class="contain black">
                    <p class="mb-0">
                        @if(app()->getLocale() == 'ar')
                            {!! $faq->description_ar ?? '' !!}
                        @else
                            {!! $faq->description ?? '' !!}
                        @endif
                    </p>
                </div>
            </div>
        </div>
        <div class="accordion faq_list d-flex flex-column gap-4 w-100" id="accordionExample">        
            @foreach($faqItems as $index => $item)
                @php
                    $headingId = 'heading'.$index;
                    $collapseId = 'collapse'.$index;
                @endphp

                <div class="accordion-item" data-aos="fade-up">
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
                                {{ strip_tags($item->answer_ar) }}
                            @else
                                {{ strip_tags($item->answer) }}
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection