@extends('layouts.master')

@section('content')
<div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">{{ isset($blog) ? 'Edit Blog' : 'Add New Blog' }}</h3>
        <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">
            Back to List
        </a>
    </div>

    {{-- Display Validation Errors Alert --}}
    {{-- @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Validation Errors!</strong>
            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif --}}

    <form action="{{ isset($blog) ? route('admin.blogs.update', $blog->id) : route('admin.blogs.store') }}" 
          method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($blog)) @method('PUT') @endif

        <div class="card mb-4">
            <div class="card-body">
                <div class="row g-4">

                    <!-- Thumb Image -->
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">
                            Thumb Image 
                            <span class="text-danger"> (Image Size (Pixels) - W-452 x H-250)</span>
                        </label>
                        <input type="file" class="form-control preview-input @error('thumb_image') is-invalid @enderror" name="thumb_image" data-preview="#thumb_image_preview">
                        
                        @error('thumb_image')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror

                        @if(isset($blog) && !empty($blog->thumb_image))
                            <img id="thumb_image_preview" src="{{ asset($blog->thumb_image) }}" class="img-thumbnail mt-2" style="max-width: 200px;">
                        @else
                            <img id="thumb_image_preview" class="img-thumbnail mt-2 d-none" style="max-width: 200px;">
                        @endif
                    </div>

                    <!-- Feature Image -->
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">
                            Feature Image 
                            <span class="text-danger"> (Image Size (Pixels) - W-1440 x H-420)</span>
                            {{-- Thumb image  (Image Size (Pixels) - W-452 x H-250) --}}
                        </label>
                        <input type="file" class="form-control preview-input @error('feature_image') is-invalid @enderror" name="feature_image" data-preview="#feature_image_preview">
                        
                        @error('feature_image')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror

                        @if(isset($blog) && !empty($blog->feature_image))
                            <img id="feature_image_preview" src="{{ asset($blog->feature_image) }}" class="img-thumbnail mt-2" style="max-width: 200px;">
                        @else
                            <img id="feature_image_preview" class="img-thumbnail mt-2 d-none" style="max-width: 200px;">
                        @endif
                    </div>

                    <!-- Published At -->
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Publish Date</label>
                        <input type="date" class="form-control @error('published_at') is-invalid @enderror" name="published_at"
                               value="{{ old('published_at', isset($blog) ? $blog->published_at : '') }}">
                        
                        @error('published_at')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- English Content -->
                    <div class="col-md-6">
                        <div class="row g-3">
                            <div class="col-12">
                                <h6 class="text-primary">English Content</h6>
                                <label class="form-label fw-semibold">Title (English)</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                       placeholder="Enter blog title"
                                       value="{{ old('title', isset($blog) ? $blog->title : '') }}">
                                
                                @error('title')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-semibold">Description (English)</label>
                                <textarea class="form-control summernote @error('description') is-invalid @enderror" name="description">{{ old('description', isset($blog) ? $blog->description : '') }}</textarea>
                                
                                @error('description')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Arabic Content -->
                    <div class="col-md-6">
                        <div class="row g-3">
                            <div class="col-12">
                                <h6 class="text-success">Arabic Content</h6>
                                <label class="form-label fw-semibold">Title (Arabic)</label>
                                <input type="text" class="form-control @error('title_ar') is-invalid @enderror" name="title_ar"
                                       placeholder="Enter Arabic blog title"
                                       value="{{ old('title_ar', isset($blog) ? $blog->title_ar : '') }}">
                                
                                @error('title_ar')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-semibold">Description (Arabic)</label>
                                <textarea class="form-control summernote @error('description_ar') is-invalid @enderror" name="description_ar">{{ old('description_ar', isset($blog) ? $blog->description_ar : '') }}</textarea>
                                
                                @error('description_ar')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Buttons -->
        <div class="d-flex justify-content-end gap-3">
            <button type="submit" class="btn btn-success py-2">Save</button>
            <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary py-2">
                Cancel
            </a>
        </div>

    </form>
</div>
@endsection

@section('scripts')

{{-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>

<script>
    $('.summernote').summernote({
        height: 120,
        toolbar: [
            ['style', ['bold', 'italic', 'underline']],
            ['font', ['fontname', 'fontsize']],
            ['color', ['forecolor']],
            ['para', ['paragraph']],
            ['view', ['fullscreen', 'codeview']]
        ]
    });
</script> --}}
@endsection
