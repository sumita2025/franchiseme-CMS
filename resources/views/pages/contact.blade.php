@extends('layouts.master')

@section('content')
<div>
    {{-- Page Title --}}
    <div class="mb-4">
        <h3 class="fw-bold text-dark">
            <i class="bi bi-envelope me-2 text-primary"></i>Contact Page Management
        </h3>
        <p class="text-muted mb-0">Manage your contact page sections and information</p>
    </div>

    <form id="contactPageForm" enctype="multipart/form-data">
        @csrf
        <div class="card mb-3">
            <div class="card-header bg-primary text-white">Contact Section</div>
            <div class="card-body">
                <div class="row g-4">
                      <div class="col-12">
                            <label>Background Image <span class="text-danger">(Image Size (Pixels) - W-1845 x H-367)</span></label>
                        
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
                                <label>Page Title (English)</label>
                                {{-- <input type="text" name="page_title" class="form-control" value="{{ $page->page_title ?? '' }}"> --}}
                                <textarea name="page_title" class="summernote">{{ $page->page_title ?? '' }}</textarea>
                            </div>
                            <div class="col-12">
                                <label>Sub Title (English)</label>
                                <textarea name="title" class="summernote">{{ $page->title ?? '' }}</textarea>

                            </div>
                            <div class="col-12">
                                <label>Description (English)</label>
                                <textarea name="description" class="summernote">{{ $page->description ?? '' }}</textarea>
                            </div>
                            <div class="col-12">
                                <div class="mb-1">
                                    <label>Phone Text (English)</label>
                                    <input type="text" name="phone_text" class="form-control" value="{{ $page->phone_text ?? '' }}">
                                </div>
                                <div>
                                    <label>Phone Value (English)</label>
                                    <input type="text" name="phone_value" class="form-control" value="{{ $page->phone_value ?? '' }}">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1">
                                    <label>WhatsApp Text (English)</label>
                                    <input type="text" name="whatsapp_text" class="form-control" value="{{ $page->whatsapp_text ?? '' }}">
                                </div>
                                <div>
                                    <label>WhatsApp Value (English)</label>
                                    <input type="text" name="whatsapp_value" class="form-control" value="{{ $page->whatsapp_value ?? '' }}">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1">
                                    <label>Email Text (English)</label>
                                    <input type="text" name="email_text" class="form-control" value="{{ $page->email_text ?? '' }}">
                                </div>
                                <div>
                                    <label>Email Value (English)</label>
                                    <input type="text" name="email_value" class="form-control" value="{{ $page->email_value ?? '' }}">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <label>Social Media Text (English)</label>
                                            <input type="text" name="social_media_text" class="form-control" value="{{ $page->social_media_text ?? '' }}">
                                        </div>
                                        <div class="row">
                                            @for ($i = 1; $i <= 5; $i++)
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label>Social Icon {{ $i }} (English) <span class="text-danger">(Image Size (Pixels) - W-60 x H-60)</span> </label>
                                                    <input type="file" name="social_icon_image_{{ $i }}" class="form-control preview-input" data-preview="#social_icon_image_{{ $i }}_preview">
                                                    @if(!empty($page->{'social_icon_image_'.$i}))
                                                        <img id="social_icon_image_{{ $i }}_preview" src="{{ asset('storage/'.$page->{'social_icon_image_'.$i}) }}" class="img-thumbnail mt-2" style="max-width: 80px; max-height: 80px;">
                                                    @else
                                                        <img id="social_icon_image_{{ $i }}_preview" class="img-thumbnail mt-2 d-none" style="max-width: 80px; max-height: 80px;">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label>Social Text {{ $i }} (English)</label>
                                                    <input type="text" name="social_link_{{ $i }}" class="form-control" value="{{ $page->{'social_link_'.$i} ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label>Social Url {{ $i }} (English)</label>
                                                    <input type="text" name="social_url_{{ $i }}" class="form-control" value="{{ $page->{'social_url_'.$i} ?? '' }}">
                                                </div>
                                            </div>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row g-3">
                            <div class="col-12">
                                <h6 class="text-primary">Arabic Content</h6>
                                <label>Page Title (Arabic)</label>
                                {{-- <input type="text" name="page_title_ar" class="form-control" value="{{ $page->page_title_ar ?? '' }}"> --}}
                                 <textarea name="page_title_ar" class="summernote">{{ $page->page_title_ar ?? '' }}</textarea>
                            </div>
                            <div class="col-12">
                                <label>Sub Title (Arabic)</label>
                                <textarea name="title_ar" class="summernote">{{ $page->title_ar ?? '' }}</textarea>
                            </div>
                            <div class="col-12">
                                <label>Description (Arabic)</label>
                                <textarea name="description_ar" class="summernote">{{ $page->description_ar ?? '' }}</textarea>
                            </div>
                            <div class="col-12">
                                <div class="mb-1">
                                    <label>Phone Text (Arabic)</label>
                                    <input type="text" name="phone_text_ar" class="form-control" value="{{ $page->phone_text_ar ?? '' }}">
                                </div>
                                <div>
                                    <label>Phone Value (Arabic)</label>
                                    <input type="text" name="phone_value_ar" class="form-control" value="{{ $page->phone_value_ar ?? '' }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1">
                                    <label>WhatsApp Text (Arabic)</label>
                                    <input type="text" name="whatsapp_text_ar" class="form-control" value="{{ $page->whatsapp_text_ar ?? '' }}">
                                </div>
                                <div>
                                    <label>WhatsApp Value (Arabic)</label>
                                    <input type="text" name="whatsapp_value_ar" class="form-control" value="{{ $page->whatsapp_value_ar ?? '' }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1">
                                    <label>Email Text (Arabic)</label>
                                    <input type="text" name="email_text_ar" class="form-control" value="{{ $page->email_text_ar ?? '' }}">
                                </div>
                                <div>
                                    <label>Email Value (Arabic)</label>
                                    <input type="text" name="email_value_ar" class="form-control" value="{{ $page->email_value_ar ?? '' }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <label>Social Media Text (Arabic)</label>
                                            <input type="text" name="social_media_text_ar" class="form-control" value="{{ $page->social_media_text_ar ?? '' }}">
                                        </div>
                                        <div class="row">
                                            @for ($i = 1; $i <= 5; $i++)
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label>Social Icon  {{ $i }} (Arabic) <span class="text-danger">(Image Size (Pixels) - W-60 x H-60)</span></label>
                                                    <input type="file" name="social_icon_image_{{ $i }}_ar" class="form-control preview-input" data-preview="#social_icon_image_{{ $i }}_ar_preview">
                                                    @if(!empty($page->{'social_icon_image_'.$i.'_ar'}))
                                                        <img id="social_icon_image_{{ $i }}_ar_preview" src="{{ asset('storage/'.$page->{'social_icon_image_'.$i.'_ar'}) }}" class="img-thumbnail mt-2" style="max-width: 80px; max-height: 80px;">
                                                    @else
                                                        <img id="social_icon_image_{{ $i }}_ar_preview" class="img-thumbnail mt-2 d-none" style="max-width: 80px; max-height: 80px;">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label>Social Text {{ $i }} (Arabic)</label>
                                                    <input type="text" name="social_link_{{ $i }}_ar" class="form-control" value="{{ $page->{'social_link_'.$i.'_ar'} ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label>Social Url {{ $i }} (Arabic)</label>
                                                    <input type="text" name="social_url_{{ $i }}_ar" class="form-control" value="{{ $page->{'social_url_'.$i.'_ar'} ?? '' }}">
                                                </div>
                                            </div>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                   
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header bg-success text-white">Map Section</div>
            <div class="card-body">
                <label>Map Embed Code (Google Map iframe)</label>
                <textarea name="map_embed" class="form-control" rows="5">{{ $page->map_embed ?? '' }}</textarea>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-success py-2">Save All Changes</button>
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
    //         height: 60,
    //         toolbar: [
    //             ['style', ['bold', 'italic', 'underline']],
    //             ['font', ['fontname', 'fontsize']],
    //             ['color', ['forecolor']],
    //             ['para', ['paragraph']],
    //             ['view', ['fullscreen', 'codeview']]
    //         ]
    //     });

    $('#contactPageForm').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        
        $.ajax({
            url: "{{ route('admin.contact.save') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(res) {
                // alert(res.message);
                 // Display success toastr
                toastr.success(res.message, "Success", {
                    closeButton: true,
                    progressBar: true,
                    positionClass: "toast-top-right",
                    timeOut: "1000" 
                });
            },
            error: function(err) {
                // alert('Error updating contact page.');
                 // Display error toastr
                toastr.error('Error updating contact page.', "Error", {
                    closeButton: true,
                    progressBar: true,
                    positionClass: "toast-top-right",
                    timeOut: "2000" 
                });
            }
        });
    });
});
</script>
@endsection