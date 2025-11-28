@extends('layouts.master')

@section('content')
<div>
    <!-- <h3 class="mb-4">🛠 Service Page Editor</h3> -->

    <form action="{{ route('admin.service.save') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a href="#tab_page_description" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                    <span>Page Description</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#tab_consultant_section" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                    <span>Consultant Section</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#tab_package_section" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                    <span>Package Section</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#tab_package_details" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                    <span>Package Details</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#tab_service_bottom_section" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                    <span>Service Bottom Section</span>
                </a>
            </li>
        </ul>
        <div class="tab-content text-muted mb-4">
            <div class="tab-pane show active" id="tab_page_description">
                {{-- Description --}}
                <div class="card mb-3">
                    <div class="card-header bg-primary text-white">Page Description</div>
                    <div class="card-body">
                        <div class="row g-4">
                            <div class="col-12">
                                <label>Image <span class="text-danger"></span></label>
                            
                                <input type="file" name="background_image" class="form-control preview-input" data-preview="#background_image_preview">
                                @if(!empty($service->background_image))
                                    <img id="background_image_preview" src="{{ asset('storage/'.$service->background_image) }}" class="img-thumbnail mt-2" style="max-width: 200px;">
                                @else
                                    <img id="background_image_preview" class="img-thumbnail mt-2 d-none" style="max-width: 200px;">
                                @endif
                          
                            </div>
                            <div class="col-md-6">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <h6 class="text-primary">English Content</h6>
                                        <label>Page Title (English)</label>
                                        <input type="text" name="title" value="{{ $service->title ?? '' }}" class="form-control">
                                    </div>
                                    <div class="col-12">
                                        <label>Page Description (English)</label>
                                        <textarea name="description" class="form-control summernote">{!! $service->description ?? '' !!}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <h6 class="text-success">Arabic Content</h6>
                                        <label>Page Title (Arabic)</label>
                                        <input type="text" name="title_ar" value="{{ $service->title_ar ?? '' }}" class="form-control">
                                    </div>
                                    <div class="col-12">
                                        <label>Page Description (Arabic)</label>
                                        <textarea name="description_ar" class="form-control summernote">{!! $service->description_ar ?? '' !!}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab_consultant_section">
                {{-- Consultant Section --}}
                <div class="card mb-3">
                    <div class="card-header bg-success text-white">Consultant Section</div>
                    <div class="card-body">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <h6 class="text-primary">English Content</h6>
                                        <label>Consultant Title (English)</label>
                                        <textarea name="consultant_title" class="form-control summernote">{!! $service->consultant_title ?? '' !!}</textarea>
                                    </div>
                                    <div class="col-12">
                                        <label>Consultant Description (English)</label>
                                        <input type="text" name="consultant_description" value="{{ $service->consultant_description ?? '' }}" class="form-control">
                                    </div>
                                    <div class="col-6">
                                        <label>Button Text (English)</label>
                                        <input type="text" name="button_text" value="{{ $service->button_text ?? '' }}" class="form-control">
                                    </div>
                                    <div class="col-6">
                                        <label>Button URL (English)</label>
                                        <input type="text" name="button_url" value="{{ $service->button_url ?? '' }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <h6 class="text-success">Arabic Content</h6>
                                        <label>Consultant Title (Arabic)</label>
                                        <textarea name="consultant_title_ar" class="form-control summernote">{!! $service->consultant_title_ar ?? '' !!}</textarea>
                                    </div>
                                    <div class="col-12">
                                        <label>Consultant Description (Arabic)</label>
                                        <input type="text" name="consultant_description_ar" value="{{ $service->consultant_description_ar ?? '' }}" class="form-control">
                                    </div>
                                    <div class="col-6">
                                        <label>Button Text (Arabic)</label>
                                        <input type="text" name="button_text_ar" value="{{ $service->button_text_ar ?? '' }}" class="form-control">
                                    </div>
                                    <div class="col-6">
                                        <label>Button URL (Arabic)</label>
                                        <input type="text" name="button_url_ar" value="{{ $service->button_url_ar ?? '' }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab_package_section">
                {{-- Package Section --}}
                <div class="card mb-3">
                    <div class="card-header bg-warning text-dark">Package Section</div>
                    <div class="card-body">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <h6 class="text-primary">English Content</h6>
                                        <label>Package Title (English)</label>
                                        <textarea name="package_section_title" class="form-control title_control">{!! $service->package_section_title ?? '' !!}</textarea>
                                    </div>
                                    <div class="col-12">
                                        <label>Description (English)</label>
                                        <input type="text" name="package_section_description" value="{{ $service->package_section_description ?? '' }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <h6 class="text-success">Arabic Content</h6>
                                        <label>Package Title (Arabic)</label>
                                        <textarea name="package_section_title_ar" class="form-control title_control">{!! $service->package_section_title_ar ?? '' !!}</textarea>
                                    </div>
                                    <div class="col-12">
                                        <label>Description (Arabic)</label>
                                        <input type="text" name="package_section_description_ar" value="{{ $service->package_section_description_ar ?? '' }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex flex-column gap-3">
                                    @for($i=1; $i<=5; $i++)
                                        <div class="card">
                                            <div class="card-header">
                                                <h6 class="mb-0">Service {{ $i }}</h6>
                                            </div>
                                            <div class="card-body">
                                                <label>Image <span class="text-danger">(Image Size (Pixels) - 70 x 70 )</span></label>
                                                <input type="file" name="service_image{{ $i }}" class="form-control preview-input" data-preview="#img_preview_{{ $i }}">
                                                @if(!empty($service->{'service_image'.$i}))
                                                    <img id="img_preview_{{ $i }}" src="{{ asset('storage/'.$service->{'service_image'.$i}) }}" class="img-thumbnail mt-2" style="max-width:150px;">
                                                @else
                                                    <img id="img_preview_{{ $i }}" class="img-thumbnail mt-2 d-none" style="max-width:150px;">
                                                @endif
                                                <div class="mt-3">
                                                    <div class="row g-4">
                                                        <div class="col-md-6">
                                                            <h6 class="text-primary">English Content</h6>
                                                            <div class="mb-3">
                                                                <label>Title (English)</label>
                                                                <input type="text" name="service_title{{ $i }}" value="{{ $service->{'service_title'.$i} ?? '' }}" class="form-control">
                                                            </div>
                                                            <div>
                                                                <label>Description (English)</label>
                                                                <input type="text" name="service_description{{ $i }}" value="{{ $service->{'service_description'.$i} ?? '' }}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h6 class="text-success">Arabic Content</h6>
                                                            <div class="mb-3">
                                                                <label>Title (Arabic)</label>
                                                                <input type="text" name="service_title{{ $i }}" value="{{ $service->{'service_title'.$i} ?? '' }}" class="form-control">
                                                            </div>
                                                            <div>
                                                                <label>Description (Arabic)</label>
                                                                <input type="text" name="service_description{{ $i }}" value="{{ $service->{'service_description'.$i} ?? '' }}" class="form-control">
                                                            </div>
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
                </div>
            </div>
            <div class="tab-pane" id="tab_package_details">
                {{-- Package Details --}}
                <div class="card mb-3">
                    <div class="card-header bg-secondary text-white">Package Details</div>
                    <div class="card-body">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <h6 class="text-primary">English Content</h6>
                                        <label>Package Title (English)</label>
                                        <input type="text" name="package_title" value="{{ $service->package_title ?? '' }}" class="form-control">
                                    </div>
                                    <div class="col-12">
                                        <label>Button Text (English)</label>
                                        <input type="text" name="package_button_text" value="{{ $service->package_button_text ?? '' }}" class="form-control">
                                    </div>
                                    <div class="col-12">
                                        <label>Button URL (English)</label>
                                        <input type="text" name="package_button_url" value="{{ $service->package_button_url ?? '' }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <h6 class="text-success">Arabic Content</h6>
                                        <label>Package Title (Arabic)</label>
                                        <input type="text" name="package_title_ar" value="{{ $service->package_title ?? '' }}" class="form-control">
                                    </div>
                                    <div class="col-12">
                                        <label>Button Text (Arabic)</label>
                                        <input type="text" name="package_button_text_ar" value="{{ $service->package_button_text ?? '' }}" class="form-control">
                                    </div>
                                    <div class="col-12">
                                        <label>Button URL (Arabic)</label>
                                        <input type="text" name="package_button_url_ar" value="{{ $service->package_button_url ?? '' }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab_service_bottom_section">
                {{-- Service Bottom Section --}}
                <div class="card mb-3">
                    <div class="card-header bg-dark text-white">Service Bottom Section</div>
                    <div class="card-body">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <h6 class="text-primary">English Content</h6>
                                        <label>Service Title (English)</label>
                                        <textarea name="service_title" class="form-control title_control">{!! $service->service_title ?? '' !!}</textarea>
                                    </div>
                                    <div class="col-12">
                                        <label>Service Description (English)</label>
                                        <textarea name="service_description" class="form-control summernote">{!! $service->service_description ?? '' !!}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <h6 class="text-success">Arabic Content</h6>
                                        <label>Service Title (Arabic)</label>
                                        <textarea name="service_title_ar" class="form-control title_control">{!! $service->service_title ?? '' !!}</textarea>
                                    </div>
                                    <div class="col-12">
                                        <label>Service Description (Arabic)</label>
                                        <textarea name="service_description_ar" class="form-control summernote">{!! $service->service_description ?? '' !!}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <button class="btn btn-success py-2">Save Service Page</button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
<script>
    $(document).ready(function(){
        $('.summernote').summernote({
            height: 100,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['fontname', 'fontsize']],
                ['color', ['forecolor']],
                ['para', ['paragraph']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
        $('.title_control').summernote({
            height: 60,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['fontname', 'fontsize']],
                ['color', ['forecolor']],
                ['para', ['paragraph']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });

        $('.preview-input').on('change', function(e){
            const preview = $(this).data('preview');
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(ev){
                    $(preview).attr('src', ev.target.result).removeClass('d-none');
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>
@endsection