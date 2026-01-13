@extends('layouts.master')
@section('content')
<div>
    <h3 class="mb-3">{{ isset($franchise) ? 'Edit Franchise' : 'Add Franchise' }}</h3>

    <form action="{{ isset($franchise) ? route('admin.franchises.update', $franchise->id) : route('admin.franchises.save') }}"
          method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($franchise)) @method('PUT') @endif

        <div class="card mb-4">
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-4">
                        <label class="form-label fw-semibold">Background Image <span class="text-danger">(Image Size (Pixels) - W-1845 x H-367)</span></label>
                        <input type="file" class="form-control" name="slider_background_image">
                        @if(!empty($franchise->slider_background_image))
                            <img src="{{ asset($franchise->slider_background_image) }}" class="img-thumbnail mt-2" width="120">
                        @endif
                    </div>
                    <div class="col-4">
                        <label>Thumb Image <span class="text-danger">(Image Size (Pixels) - W-235 x H-235)</span></label>
                        {{-- Feature image (Image Size (Pixels) - W-1440 x H-420) --}}
                        <input type="file" name="logo" class="form-control">
                        @if(isset($franchise->logo))
                            <img src="{{ asset($franchise->logo) }}" width="100" class="mt-2 rounded">
                        @endif
                    </div>
                    <div class="col-4">
                        <label class="form-label fw-semibold">Feature Image <span class="text-danger">(Image Size (Pixels) - W-1440 x H-420)</span></label>
                        <input type="file" class="form-control" name="feature_image">
                        @if(!empty($franchise->feature_image))
                            <img src="{{ asset($franchise->feature_image) }}" class="img-thumbnail mt-2" width="120">
                        @endif
                    </div>
                   
                    <div class="col-md-6">
                        <div class="row g-3">
                             <div class="col-12">
                                <h6 class="text-primary">English Content</h6>
                                <label class="form-label fw-semibold">Tag (English)</label>
                                <input type="text" class="form-control" name="tag" value="{{ $franchise->tag ?? '' }}" placeholder="e.g. Tag">
                            </div>
                            <div class="col-12">
                                {{-- <h6 class="text-primary">English Content</h6> --}}
                                <label>Franchise Sector (English)</label>
                                <input type="text" name="sector" class="form-control" value="{{ $franchise->sector ?? '' }}">
                            </div>
                            <div class="col-12">
                                <label>Franchise Country (English)</label>
                                <input type="text" name="country" class="form-control" value="{{ $franchise->country ?? '' }}">
                            </div>
                            <div class="col-12">
                                <label>Investment Level (English)</label>
                                <input type="text" name="investment_level" class="form-control" value="{{ $franchise->investment_level ?? '' }}">
                            </div>
                            <div class="col-12">
                                <label>Franchise Title (English)</label>
                                <input type="text" name="title" class="form-control" value="{{ $franchise->title ?? '' }}">
                            </div>
                            <div class="col-12">
                                <label>Franchise Description (English)</label>
                                <textarea class="form-control summernote" name="description">{{ $franchise->description ?? '' }}</textarea>
                            </div>
                            <div class="col-12">
                                <label>Link Text (English)</label>
                                <input type="text" name="link_text" class="form-control" value="{{ $franchise->link_text ?? '' }}">
                            </div>
                            {{-- <div class="col-12">
                                <label>Link URL (English)</label>
                                <input type="text" name="link_url" class="form-control" value="{{ $franchise->link_url ?? '' }}">
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row g-3">
                              <div class="col-12">
                                <h6 class="text-success">Arabic Content</h6>
                                <label class="form-label fw-semibold">Tag (Arabic)</label>
                                <input type="text" class="form-control" name="tag_ar" value="{{ $franchise->tag_ar ?? '' }}" placeholder="e.g. Tag">
                            </div>
                            <div class="col-12">
                                {{-- <h6 class="text-success">Arabic Content</h6> --}}
                                <label>Franchise Sector (Arabic)</label>
                                <input type="text" name="sector_ar" class="form-control" value="{{ $franchise->sector_ar ?? '' }}">
                            </div>
                            <div class="col-12">
                                <label>Franchise Country (Arabic)</label>
                                <input type="text" name="country_ar" class="form-control" value="{{ $franchise->country_ar ?? '' }}">
                            </div>
                            <div class="col-12">
                                <label>Investment Level (Arabic)</label>
                                <input type="text" name="investment_level_ar" class="form-control" value="{{ $franchise->investment_level_ar ?? '' }}">
                            </div>
                            <div class="col-12">
                                <label>Franchise Title (Arabic)</label>
                                <input type="text" name="title_ar" class="form-control" value="{{ $franchise->title_ar ?? '' }}">
                            </div>
                            <div class="col-12">
                                <label>Franchise Description (Arabic)</label>
                                <textarea class="form-control summernote" name="description_ar">{{ $franchise->description_ar ?? '' }}</textarea>
                            </div>
                            <div class="col-12">
                                <label>Link Text (Arabic)</label>
                                <input type="text" name="link_text_ar" class="form-control" value="{{ $franchise->link_text_ar ?? '' }}">
                            </div>
                            {{-- <div class="col-12">
                                <label>Link URL (Arabic)</label>
                                <input type="text" name="link_url_ar" class="form-control" value="{{ $franchise->link_url_ar ?? '' }}">
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end gap-3">
            <button class="btn btn-success py-2">Save</button>
            <a href="{{ route('admin.franchises.index') }}" class="btn btn-secondary py-2">Cancel</a>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
<script>
    $('.summernote').summernote({
        height: 100,
        toolbar: [
            ['style', ['bold', 'italic', 'underline']],
            ['font', ['fontname', 'fontsize']],
            ['color', ['forecolor']],
            ['para', ['paragraph']],
            ['view', ['fullscreen', 'codeview']]
        ]
    });
</script>
@endsection