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
                                        <img id="hero_bg_preview"
                                            src="{{ asset('storage/' . $home->hero_background_image) }}"
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
    
      
                <div class="d-flex justify-content-end">
                    <button class="btn btn-success py-2">Save All Sections</button>
                </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            
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
                                toastr.error('Something went wrong. Please try again.',
                                "Error", {
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
