@extends('layouts.master')
@section('content')
<div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">{{ isset($brand) ? 'Edit Brand' : 'Add New Brand' }}</h3>
        <a href="{{ route('admin.brands.index') }}" class="btn btn-secondary">
            Back to List
        </a>
    </div>

    <form action="{{ isset($brand) ? route('admin.brands.update', $brand->id) : route('admin.brands.save') }}" method="POST" enctype="multipart/form-data" class="brand-form">
        @csrf
        @if(isset($brand)) @method('PUT') @endif

        <div class="card mb-4">
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Background Image <span class="text-danger">(Image Size (Pixels) - 1050 x 390 )</span></label>
                        <input type="file" class="form-control" name="slider_background_image">
                        @if(!empty($brand->slider_background_image))
                            <img src="{{ asset('uploads/brands/'.$brand->slider_background_image) }}" class="img-thumbnail mt-2" width="120">
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Brand Image <span class="text-danger">(Image Size (Pixels) - 320 x 320 )</span></label>
                        <input type="file" class="form-control" name="brand_image">
                        @if(!empty($brand->brand_image))
                            <img src="{{ asset('uploads/brands/'.$brand->brand_image) }}" class="img-thumbnail mt-2" width="120">
                        @endif
                    </div>

                    <div class="col-md-6">
                        <div class="row g-3">
                            <div class="col-12">
                                <h6 class="text-primary">English Content</h6>
                                <label class="form-label fw-semibold">Tag (English)</label>
                                <input type="text" class="form-control" name="brand_tag" value="{{ $brand->brand_tag ?? '' }}" placeholder="e.g. Featured Brand">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Title (English)</label>
                                <input type="text" class="form-control" name="brand_title" value="{{ $brand->brand_title ?? '' }}" placeholder="e.g. Pride Motors">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Description (English)</label>
                                <textarea class="form-control summernote" name="brand_description">{{ $brand->brand_description ?? '' }}</textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Button Text (English)</label>
                                <input type="text" class="form-control" name="brand_button" value="{{ $brand->brand_button ?? '' }}" placeholder="e.g. Learn More">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Button URL (English)</label>
                                <input type="text" class="form-control" name="brand_button_url" value="{{ $brand->brand_button_url ?? '' }}" placeholder="https://example.com">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row g-3">
                            <div class="col-12">
                                <h6 class="text-success">Arabic Content</h6>
                                <label class="form-label fw-semibold">Tag (Arabic)</label>
                                <input type="text" class="form-control" name="brand_tag_ar" value="{{ $brand->brand_tag_ar ?? '' }}" placeholder="e.g. Featured Brand">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Title (Arabic)</label>
                                <input type="text" class="form-control" name="brand_title_ar" value="{{ $brand->brand_title_ar ?? '' }}" placeholder="e.g. Pride Motors">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Description (Arabic)</label>
                                <textarea class="form-control summernote" name="brand_description_ar">{{ $brand->brand_description_ar ?? '' }}</textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Button Text (Arabic)</label>
                                <input type="text" class="form-control" name="brand_button_ar" value="{{ $brand->brand_button_ar ?? '' }}" placeholder="e.g. Learn More">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Button URL (Arabic)</label>
                                <input type="text" class="form-control" name="brand_button_url_ar" value="{{ $brand->brand_button_url_ar ?? '' }}" placeholder="https://example.com">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="d-flex justify-content-end gap-3">
            <button type="submit" class="btn btn-success py-2">Save</button>
            <a href="{{ route('admin.brands.index') }}" class="btn btn-secondary py-2">
                Cancel
            </a>
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