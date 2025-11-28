@extends('layouts.master')
@section('content')
<div>
    <form id="franchisePageForm" enctype="multipart/form-data">
        @csrf
        <div class="card mb-4">
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-12">
                        <label>Image <span class="text-danger"></span></label>
                            <input type="file" name="background_image" class="form-control preview-input" data-preview="#background_image_preview">
                            @if(!empty($page->background_image))
                                <img id="background_image_preview" src="{{ asset('storage/'.$page->background_image) }}" class="img-thumbnail mt-2" style="max-width: 200px;">
                            @else
                                <img id="background_image_preview" class="img-thumbnail mt-2 d-none" style="max-width: 200px;">
                            @endif
                        </div>
                    <div class="col-md-6">
                        <div class="row g-3">
                    
                            <div class="col-12">
                                <h6 class="text-primary">English Content</h6>
                                <label class="form-label">Title (English)</label>
                                {{-- <input type="text" class="form-control" name="title" value="{{ $page->title ?? '' }}"> --}}
                                 <textarea class="form-control summernote" name="title">{{ $page->title ?? '' }}</textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Description (English)</label>
                                <textarea class="form-control summernote" name="description">{{ $page->description ?? '' }}</textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Brand Title (English)</label>
                                <textarea class="form-control summernote" name="brand_title">{{ $page->brand_title ?? '' }}</textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Franchise Title (English)</label>
                                <textarea class="form-control summernote" name="franchise_title">{{ $page->franchise_title ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row g-3">
                            <div class="col-12">
                                <h6 class="text-success">Arabic Content</h6>
                                <label class="form-label">Title (Arabic)</label>
                                {{-- <input type="text" class="form-control" name="title_ar" value="{{ $page->title_ar ?? '' }}"> --}}
                                <textarea class="form-control summernote" name="title_ar">{{ $page->title_ar ?? '' }}</textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Description (Arabic)</label>
                                <textarea class="form-control summernote" name="description_ar">{{ $page->description_ar ?? '' }}</textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Brand Title (Arabic)</label>
                                <textarea class="form-control summernote" name="brand_title_ar">{{ $page->brand_title_ar ?? '' }}</textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Franchise Title (Arabic)</label>
                                <textarea class="form-control summernote" name="franchise_title_ar">{{ $page->franchise_title_ar ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-success py-2">Save</button>
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

        $('#franchisePageForm').on('submit', function(e){
            e.preventDefault();

            let formData = new FormData(this);

            $.ajax({
                url: '{{ route("admin.franchise.save") }}',
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(res){
                    // alert(res.message);
                        toastr.success(res.message, "Success", {
                        closeButton: true,
                        progressBar: true,
                        positionClass: "toast-top-right",
                        timeOut: "1000" 
                    });

                },
                error: function(xhr, status, error){
                    // Default error message
                    let errorMessage = "Something went wrong. Please try again!";
                    
                    // If Laravel sends validation errors or custom message
                    if(xhr.responseJSON){
                        if(xhr.responseJSON.message){
                            errorMessage = xhr.responseJSON.message;
                        } else if(xhr.responseJSON.errors){
                            // Collect first validation error
                            errorMessage = Object.values(xhr.responseJSON.errors).flat().join("<br>");
                        }
                    }

                    toastr.error(errorMessage, "Error", {
                        closeButton: true,
                        progressBar: true,
                        positionClass: "toast-top-right",
                        timeOut: "3000" // 3 seconds
                    });
                }
            });
        });

        //   $('#franchisePageForm').on('submit', function(e){
        //     e.preventDefault();
        //     $.post('{{ route("admin.franchise.save") }}', $(this).serialize(), function(res){
        //         alert(res.message);
        //     });
        // });

  });
</script>
@endsection