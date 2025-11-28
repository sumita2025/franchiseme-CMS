@extends('layouts.master')

@section('content')
    <div>
        <!-- <h3 class="mb-4">Home Page Editor</h3> -->

        <form action="{{ route('admin.home.save') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="#tab_hero_section" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                        <span>Hero Section</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#tab_about_section" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                        <span>About Section</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#tab_strategy_section" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                        <span>Strategy Section</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#tab_mission_section" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                        <span>Mission Section</span>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="#tab_team_section" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                        <span>Team Section</span>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="#tab_achievement_section" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                        <span>Achievement Section</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#tab_client_section" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                        <span>Client Section</span>
                    </a>
                </li>
            </ul>
            <div class="tab-content text-muted mb-4">
                <div class="tab-pane show active" id="tab_hero_section">
                    {{-- HERO SECTION --}}
                    <div class="card mb-3">
                        <div class="card-header bg-primary text-white">Hero Section</div>
                        <div class="card-body">
                            <div class="row g-4">
                                <div class="col-12">
                                    <label>Background Image <span class="text-danger">(Image Size (Pixels) - 1805 x 662
                                            )</span></label>
                                    <input type="file" name="hero_background_image" class="form-control preview-input"
                                        data-preview="#hero_bg_preview">
                                    @if (!empty($home->hero_background_image))
                                        <img id="hero_bg_preview" src="{{ asset('storage/' . $home->hero_background_image) }}"
                                            class="img-thumbnail mt-2" style="max-width: 200px;">
                                    @else
                                        <img id="hero_bg_preview" class="img-thumbnail mt-2 d-none"
                                            style="max-width: 200px;">
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="row g-3">
                                        {{-- English Fields --}}
                                        <div class="col-12">
                                            <h6 class="text-primary">English Content</h6>
                                            <label>Title (English)</label>
                                            <textarea name="hero_title" class="form-control summernote">{!! $home->hero_title ?? '' !!}</textarea>
                                        </div>

                                        <div class="col-6">
                                            <label>Button Text (English)</label>
                                            <input type="text" name="hero_button_text"
                                                value="{{ $home->hero_button_text ?? '' }}" class="form-control">
                                        </div>
                                        <div class="col-6">
                                            <label>Button URL</label>
                                            <input type="text" name="hero_button_url"
                                                value="{{ $home->hero_button_url ?? '' }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    {{-- Arabic Fields --}}
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <h6 class="text-success">Arabic Content</h6>
                                            <label>Title (Arabic)</label>
                                            <textarea name="hero_title_ar" class="form-control summernote">{!! $home->hero_title_ar ?? '' !!}</textarea>
                                        </div>
                                        <div class="col-6">
                                            <label>Button Text (Arabic)</label>
                                            <input type="text" name="hero_button_text_ar"
                                                value="{{ $home->hero_button_text_ar ?? '' }}" class="form-control">
                                        </div>
                                        <div class="col-6">
                                            <label>Button URL (Arabic)</label>
                                            <input type="text" name="hero_button_url_ar"
                                                value="{{ $home->hero_button_url_ar ?? '' }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab_about_section">
                    {{-- ABOUT SECTION --}}
                    <div class="card mb-3">
                        <div class="card-header bg-primary text-white">About Section</div>
                        <div class="card-body">
                            <div class="row g-4">
                                <div class="col-12">
                                    <label>Background Image <span class="text-danger">(Image Size (Pixels) - 659 x 370
                                            )</span></label>
                                    <input type="file" name="about_image" class="form-control preview-input"
                                        data-preview="#about_img_preview">
                                    @if (!empty($home->about_image))
                                        <img id="about_img_preview" src="{{ asset('storage/' . $home->about_image) }}"
                                            class="img-thumbnail mt-2" style="max-width: 200px;">
                                    @else
                                        <img id="about_img_preview" class="img-thumbnail mt-2 d-none"
                                            style="max-width: 200px;">
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="row g-3">
                                        {{-- English --}}
                                        <div class="col-12">
                                            <h6 class="text-primary">English Content</h6>
                                            <label>Title (English)</label>
                                            <textarea name="about_title" class="form-control summernote">{!! $home->about_title ?? '' !!}</textarea>
                                        </div>
                                        <div class="col-12">
                                            <label>Description (English)</label>
                                            <textarea name="about_description" class="form-control summernote">{!! $home->about_description ?? '' !!}</textarea>
                                        </div>

                                        <div class="col-6">
                                            <label>Button Text (English)</label>
                                            <input type="text" name="about_button_text"
                                                value="{{ $home->about_button_text ?? '' }}" class="form-control">
                                        </div>
                                        <div class="col-6">
                                            <label>Button URL</label>
                                            <input type="text" name="about_button_url"
                                                value="{{ $home->about_button_url ?? '' }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row g-3">
                                        {{-- Arabic --}}
                                        <div class="col-12">
                                            <h6 class="text-success">Arabic Content</h6>
                                            <label>Title (Arabic)</label>
                                            <textarea name="about_title_ar" class="form-control summernote">{!! $home->about_title_ar ?? '' !!}</textarea>
                                        </div>
                                        <div class="col-12">
                                            <label>Description (Arabic)</label>
                                            <textarea name="about_description_ar" class="form-control summernote">{!! $home->about_description_ar ?? '' !!}</textarea>
                                        </div>
                                        <div class="col-6">
                                            <label>Button Text (Arabic)</label>
                                            <input type="text" name="about_button_text_ar"
                                                value="{{ $home->about_button_text_ar ?? '' }}" class="form-control">
                                        </div>
                                        <div class="col-6">
                                            <label>Button URL (Arabic)</label>
                                            <input type="text" name="about_button_url_ar"
                                                value="{{ $home->about_button_url_ar ?? '' }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab_strategy_section">
                    {{-- STRATEGY SECTION --}}
                    <div class="card mb-3">
                        <div class="card-header bg-primary text-white">Strategy Section</div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-6">
                                    <label>Image <span class="text-danger">(Image Size (Pixels) - 220 x 130
                                            )</span></label>
                                    <div class="border rounded m-1 p-2 ">
                                        <input type="file" name="strategy_image" class="form-control preview-input"
                                            data-preview="#strategy_img_preview">
                                        @if (!empty($home->strategy_image))
                                            <img id="strategy_img_preview"
                                                src="{{ asset('storage/' . $home->strategy_image) }}"
                                                class="img-thumbnail mt-2" style="max-width: 200px;">
                                        @else
                                            <img id="strategy_img_preview" class="img-thumbnail mt-2 d-none"
                                                style="max-width: 200px;">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label>Image (Arabic) <span class="text-danger">(Image Size (Pixels) - 220 x 130
                                            )</span></label>
                                    <div class="border rounded m-1 p-2 ">
                                        <input type="file" name="strategy_image_ar" class="form-control preview-input"
                                            data-preview="#strategy_img_preview_ar">
                                        @if (!empty($home->strategy_image_ar))
                                            <img id="strategy_img_preview_ar"
                                                src="{{ asset('storage/' . $home->strategy_image_ar) }}"
                                                class="img-thumbnail mt-2" style="max-width: 200px;">
                                        @else
                                            <img id="strategy_img_preview_ar" class="img-thumbnail mt-2 d-none"
                                                style="max-width: 200px;">
                                        @endif
                                    </div>
                                </div>
                                @for ($i = 1; $i <= 10; $i++)
                                    <div class="col-12">
                                        <h6>Strategy Item {{ $i }}</h6>
                                        <div class="row g-4">
                                            <div class="col-md-6">
                                                <div class="row g-3">
                                                    <div class="col-12">
                                                        <h6 class="text-primary">English Content</h6>
                                                        <label>Title (English)</label>
                                                        <input type="text" name="strategy_title{{ $i }}"
                                                            class="form-control"
                                                            placeholder="Enter Strategy Title in English"
                                                            value="{!! $home->{'strategy_title' . $i} ?? '' !!}">
                                                    </div>
                                                    <div class="col-12">
                                                        <label>Description (English)</label>
                                                        <textarea name="strategy_description{{ $i }}" class="form-control summernote"
                                                            placeholder="Enter English Description">{!! $home->{'strategy_description' . $i} ?? '' !!}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row g-3">
                                                    <div class="col-12">
                                                        <h6 class="text-success">Arabic Content</h6>
                                                        <label>Title (Arabic)</label>
                                                        <input type="text" name="strategy_title{{ $i }}_ar"
                                                            class="form-control"
                                                            placeholder="Enter Strategy Title in Arabic"
                                                            value="{!! $home->{'strategy_title' . $i . '_ar'} ?? '' !!}">
                                                    </div>
                                                    <div class="col-12">
                                                        <label>Description (Arabic)</label>
                                                        <textarea name="strategy_description{{ $i }}_ar" class="form-control summernote"
                                                            placeholder="Enter Arabic Description">{!! $home->{'strategy_description' . $i . '_ar'} ?? '' !!}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab_mission_section">
                    {{-- MISSION SECTION (Vision + Mission) --}}
                    <div class="card mb-3">
                        <div class="card-header bg-primary text-white">Mission Section</div>
                        <div class="card-body">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            {{-- English --}}
                                            <h6 class="text-primary">English Content</h6>
                                            <label>Vision Title (English)</label>
                                            <textarea name="vision_title" class="form-control summernote">{!! $home->vision_title ?? '' !!}</textarea>
                                        </div>
                                        <div class="col-12">
                                            <label>Vision Description (English)</label>
                                            <textarea name="vision_description" class="form-control summernote">{!! $home->vision_description ?? '' !!}</textarea>
                                        </div>
                                        <div class="col-12">
                                            <label>Mission Title (English)</label>
                                            <textarea name="mission_title" class="form-control summernote">{!! $home->mission_title ?? '' !!}</textarea>
                                        </div>
                                        <div class="col-12">
                                            <label>Mission Description (English)</label>
                                            <textarea name="mission_description" class="form-control summernote">{!! $home->mission_description ?? '' !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            {{-- Arabic --}}
                                            <h6 class="text-success">Arabic Content</h6>
                                            <label>Vision Title (Arabic)</label>
                                            <textarea name="vision_title_ar" class="form-control summernote">{!! $home->vision_title_ar ?? '' !!}</textarea>
                                        </div>
                                        <div class="col-12">
                                            <label>Vision Description (Arabic)</label>
                                            <textarea name="vision_description_ar" class="form-control summernote">{!! $home->vision_description_ar ?? '' !!}</textarea>
                                        </div>
                                        <div class="col-12">
                                            <label>Mission Title (Arabic)</label>
                                            <textarea name="mission_title_ar" class="form-control summernote">{!! $home->mission_title_ar ?? '' !!}</textarea>
                                        </div>
                                        <div class="col-12">
                                            <label>Mission Description (Arabic)</label>
                                            <textarea name="mission_description_ar" class="form-control summernote">{!! $home->mission_description_ar ?? '' !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab_team_section">
                    {{-- TEAM SECTION --}}
                    <div class="card mb-3">
                        <div class="card-header bg-primary text-white">Team Section</div>
                        <div class="card-body">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            {{-- English --}}
                                            <h6 class="text-primary">English Content</h6>
                                            <label>Title (English)</label>
                                            <textarea name="team_title" class="form-control summernote">{!! $home->team_title ?? '' !!}</textarea>
                                        </div>
                                        <div class="col-12">
                                            <label>Description (English)</label>
                                            <textarea name="team_description" class="form-control summernote">{!! $home->team_description ?? '' !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            {{-- Arabic --}}
                                            <h6 class="text-success">Arabic Content</h6>
                                            <label>Title (Arabic)</label>
                                            <textarea name="team_title_ar" class="form-control summernote">{!! $home->team_title_ar ?? '' !!}</textarea>
                                        </div>
                                        <div class="col-12">
                                            <label>Description (Arabic)</label>
                                            <textarea name="team_description_ar" class="form-control summernote">{!! $home->team_description_ar ?? '' !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                                {{-- Members --}}
                                <div class="col-12">
                                    <div class="row g-3">
                                        @for ($i = 1; $i <= 6; $i++)
                                            <div class="col-md-4">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h6 class="mb-0">Team Member {{ $i }}</h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <label><span class="text-danger">(Image Size (Pixels) - 70 x 70
                                                                )</span></label>
                                                        <input type="file" name="team_image{{ $i }}"
                                                            class="form-control preview-input"
                                                            data-preview="#team_img_preview_{{ $i }}">
                                                        @if (!empty($home->{'team_image' . $i}))
                                                            <img id="team_img_preview_{{ $i }}"
                                                                src="{{ asset('storage/' . $home->{'team_image' . $i}) }}"
                                                                class="img-thumbnail mt-2" style="max-width: 200px;">
                                                        @else
                                                            <img id="team_img_preview_{{ $i }}"
                                                                class="img-thumbnail mt-2 d-none"
                                                                style="max-width: 200px;">
                                                        @endif

                                                      
                                                        <input type="text" name="team_title{{ $i }}"
                                                            value="{{ $home->{'team_title' . $i} ?? '' }}"
                                                            class="form-control mt-3 mb-2" placeholder="Title (English)">
                                                        <textarea name="team_description{{ $i }}" class="form-control mb-3" placeholder="Description (English)">{!! $home->{'team_description' . $i} ?? '' !!}</textarea>

                                                     
                                                        <input type="text" name="team_title{{ $i }}_ar"
                                                            value="{{ $home->{'team_title' . $i . '_ar'} ?? '' }}"
                                                            class="form-control mb-2" placeholder="Title (Arabic)">
                                                        <textarea name="team_description{{ $i }}_ar" class="form-control mb-0"
                                                            placeholder="Description (Arabic)">{!! $home->{'team_description' . $i . '_ar'} ?? '' !!}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab_achievement_section">
                    {{-- ACHIEVEMENT SECTION --}}
                    <div class="card mb-3">
                        <div class="card-header bg-primary text-white">Achievement Section</div>
                        <div class="card-body">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            {{-- English --}}
                                            <h6 class="text-primary">English Content</h6>
                                            <label>Title</label>
                                            <textarea name="achievement_title" class="form-control summernote">{!! $home->achievement_title ?? '' !!}</textarea>
                                        </div>
                                        <div class="col-12">
                                            <label>Subtitle</label>
                                            <textarea name="achievement_tag_line" class="form-control summernote">{!! $home->achievement_tag_line ?? '' !!}</textarea>
                                        </div>
                                        {{-- <div class="col-12">
                                        <label>Description</label>
                                        <textarea name="achievement_description" class="form-control summernote">{!! $home->achievement_description ?? '' !!}</textarea>
                                    </div> --}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            {{-- Arabic --}}
                                            <h6 class="text-success">Arabic Content</h6>
                                            <label>Title</label>
                                            <textarea name="achievement_title_ar" class="form-control summernote">{!! $home->achievement_title_ar ?? '' !!}</textarea>
                                        </div>
                                        <div class="col-12">
                                            <label>Subtitle</label>
                                            <textarea name="achievement_tag_line_ar" class="form-control summernote">{!! $home->achievement_tag_line_ar ?? '' !!}</textarea>
                                        </div>
                                        {{-- <div class="col-12">
                                        <label>Description</label>
                                        <textarea name="achievement_description_ar" class="form-control summernote">{!! $home->achievement_description_ar ?? '' !!}</textarea>
                                    </div> --}}
                                        {{-- <div class="col-12">
                                        <label>Counter Numbers</label>
                                            <input name="counter_number" class="form-control" value="{{  $home->counter}}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label>Counter Text</label>
                                        <textarea name="achievement_description_ar" class="form-control summernote">{!! $home->achievement_description_ar ?? '' !!}</textarea>
                                        </div>
                                    </div> --}}
                                    </div>
                                    <div class="col-12">
                                        <label>Achievement Image <span class="text-danger">(Image Size (Pixels) - 200 x 60
                                                )</span></label>
                                        <input type="file" name="achievement_image" class="form-control preview-input"
                                            data-preview="#ach_img_preview">
                                        @if (!empty($home->achievement_image))
                                            <img id="ach_img_preview"
                                                src="{{ asset('storage/' . $home->achievement_image) }}"
                                                class="img-thumbnail mt-2" style="max-width: 200px;">
                                        @else
                                            <img id="ach_img_preview" class="img-thumbnail mt-2 d-none"
                                                style="max-width: 200px;">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
                  <div class="tab-pane" id="tab_client_section">
                        {{-- CLIENT SECTION --}}
                        <div class="card mb-3">
                            <div class="card-header bg-primary text-white">Client Section</div>
                            <div class="card-body">
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                {{-- English --}}
                                                <h6 class="text-primary">English Content</h6>
                                                <label>Title</label>
                                                <textarea name="client_title" class="form-control summernote">{!! $home->client_title ?? '' !!}</textarea>
                                            </div>
                                            <div class="col-12">
                                                <label>Description</label>
                                                <textarea name="client_description" class="form-control summernote">{!! $home->client_description ?? '' !!}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                {{-- Arabic --}}
                                                <h6 class="text-success">Arabic Content</h6>
                                                <label>Title</label>
                                                <textarea name="client_title_ar" class="form-control summernote">{!! $home->client_title_ar ?? '' !!}</textarea>
                                            </div>
                                            <div class="col-12">
                                                <label>Description</label>
                                                <textarea name="client_description_ar" class="form-control summernote">{!! $home->client_description_ar ?? '' !!}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-4">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div>
                                                <h6 class="fw-bold mb-0">Client Logos</h6>
                                                <label class="mb-0"><span class="text-danger">(Image Size (Pixels) - 240
                                                        x 96 )</span></label>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-success" id="addLogoBtn">
                                                Add Logo
                                            </button>
                                        </div>

                                        <div id="clientLogosContainer" class="row g-3">
                                            @if (isset($clientImages) && $clientImages->count() > 0)
                                                @foreach ($clientImages as $client)
                                                    <div class="col-md-3 logo-item" data-id="{{ $client->id }}">
                                                        <div class="position-relative">
                                                            <img src="{{ asset('storage/' . $client->logo_path) }}"
                                                                class="img-thumbnail w-100 logo-preview"
                                                                style="max-height:150px;">
                                                            <button type="button"
                                                                class="btn btn-danger btn-sm position-absolute top-0 end-0 mt-1 me-1 remove-logo-btn delete_btn">
                                                                <img src="{{ asset('/assets/admin/image/delete-w.png') }}"
                                                                    alt="" width="20px">
                                                            </button>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="col-12 text-muted text-center">
                                                    <em>No client logos uploaded yet.</em>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-success py-2">Save All Sections</button>
                </div>
        </form>
    </div>
@endsection

@section('scripts')
    {{-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script> --}}
    <script>
        $(document).ready(function() {
            // $('.summernote').summernote({
            //     height: 100,
            //     toolbar: [
            //         ['style', ['bold', 'italic', 'underline']],
            //         ['font', ['fontname', 'fontsize']],
            //         ['color', ['forecolor']],
            //         ['para', ['paragraph']],
            //         ['view', ['fullscreen', 'codeview']]
            //     ]
            // });
            // $('.title_control').summernote({
            //     height: 60,
            //     toolbar: [
            //         ['style', ['bold', 'italic', 'underline']],
            //         ['font', ['fontname', 'fontsize']],
            //         ['color', ['forecolor']],
            //         ['para', ['paragraph']],
            //         ['view', ['fullscreen', 'codeview']]
            //     ]
            // });

            $('.preview-input').on('change', function(e) {
                const previewTarget = $(this).data('preview');
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        $(previewTarget).attr('src', event.target.result).removeClass('d-none');
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Add new logo input
            $('#addLogoBtn').on('click', function() {
                let logoItem = `
            <div class="col-3 logo-item">
                <div class="position-relative">
                    <input type="file" name="client_logo_image[]" class="form-control logo-input mb-2" accept="image/*">
                    <img class="img-thumbnail w-100 mb-2 logo-preview d-none" style="max-height:150px;">
                    <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 mt-1 me-1 remove-logo delete_btn">
                        <img src="{{ asset('/assets/admin/image/delete-w.png') }}" alt="" width="20px">
                    </button>
                </div>
            </div>
        `;
                $('#clientLogosContainer').append(logoItem);
            });

            // Preview selected image
            $(document).on('change', '.logo-input', function() {
                const file = this.files[0];
                const preview = $(this).siblings('.logo-preview');
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.attr('src', e.target.result).removeClass('d-none');
                    };
                    reader.readAsDataURL(file);
                } else {
                    preview.addClass('d-none').attr('src', '');
                }
            });

            // Remove logo item
            $(document).on('click', '.remove-logo-btn', function() {
                const button = $(this);
                const logoItem = button.closest('.logo-item');
                const logoId = logoItem.data('id');

                if (confirm('Are you sure you want to delete this logo?')) {
                    $.ajax({
                        url: `/admin/client-logos/${logoId}`, // ✅ Use string interpolation instead of route()
                        type: 'DELETE',
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            if (response.success) {
                                logoItem.fadeOut(300, function() {
                                    $(this).remove();
                                });
                                if ($('#clientLogosContainer .logo-item').length === 0) {
                                    $('#clientLogosContainer').html(
                                        '<div class="col-12 text-muted text-center"><em>No client logos uploaded yet.</em></div>'
                                    );
                                }
                                toastr.success('Client Logo Remove Successfully.', "Success", {
                                    closeButton: true,
                                    progressBar: true,
                                    positionClass: "toast-top-right",
                                    timeOut: "1000" 
                                });

                            } else {
                                // alert('Something went wrong. Please try again.');
                                  toastr.error('Something went wrong. Please try again.', "Error", {
                                    closeButton: true,
                                    progressBar: true,
                                    positionClass: "toast-top-right",
                                    timeOut: "2000" 
                                });
                            }
                        },
                        error: function() {
                            alert('Failed to delete logo.');
                        }
                    });
                }
            });
        });

        $(document).on('click', '.remove-logo', function() {
            $(this).closest('.logo-item').remove();
        });
    </script>
@endsection
