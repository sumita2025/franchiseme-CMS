@extends('layouts.master')

@section('content')
<div>
    {{-- Page Title --}}
    <div class="mb-4">
        <h3 class="fw-bold text-dark">
            <i class="bi bi-tools me-2 text-primary"></i>Service Page Management
        </h3>
        <p class="text-muted mb-0">Manage your service page sections and packages</p>
    </div>

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
                <a href="#tab_package_details" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                    <span>Package Details</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#tab_service_bottom_section" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                    <span>Service Bottom Section</span>
                </a>
            </li>
              <li class="nav-item">
                <a href="#tab_package_section" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                    <span>Package Section</span>
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
                                <label>Background Image <span class="text-danger">(Image Size (Pixels) - W-1845 x H-367)</span></label>
                            
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
                                        {{-- <input type="text" name="title" value="{{ $service->title ?? '' }}" class="form-control"> --}}
                                        <textarea name="title" class="form-control summernote">{!! $service->title ?? '' !!}</textarea>
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
                                        {{-- <input type="text" name="title_ar" value="{{ $service->title_ar ?? '' }}" class="form-control"> --}}
                                        <textarea name="title_ar" class="form-control summernote">{!! $service->title_ar ?? '' !!}</textarea>
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
                                    <div class="col-12">
                                        <label>Button Text (English)</label>
                                        <input type="text" name="button_text" value="{{ $service->button_text ?? '' }}" class="form-control">
                                    </div>
                                    {{-- <div class="col-6">
                                        <label>Button URL (English)</label>
                                        <input type="text" name="button_url" value="{{ $service->button_url ?? '' }}" class="form-control">
                                    </div> --}}
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
                                    <div class="col-12">
                                        <label>Button Text (Arabic)</label>
                                        <input type="text" name="button_text_ar" value="{{ $service->button_text_ar ?? '' }}" class="form-control">
                                    </div>
                                    {{-- <div class="col-6">
                                        <label>Button URL (Arabic)</label>
                                        <input type="text" name="button_url_ar" value="{{ $service->button_url_ar ?? '' }}" class="form-control">
                                    </div> --}}
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
                                        {{-- <input type="text" name="package_title" value="{{ $service->package_title ?? '' }}" class="form-control"> --}}
                                        {{-- <input type="text" name="package_title" value="{{ $service->package_title ?? '' }}" class="form-control"> --}}
                                        <textarea name="package_title" class="form-control summernote">{!! $service->package_title ?? '' !!}</textarea>
                                    </div>
                                    <div class="col-12">
                                        <label>Button Text (English)</label>
                                        <input type="text" name="package_button_text" value="{{ $service->package_button_text ?? '' }}" class="form-control">
                                    </div>
                                    {{-- <div class="col-12">
                                        <label>Button URL (English)</label>
                                        <input type="text" name="package_button_url" value="{{ $service->package_button_url ?? '' }}" class="form-control">
                                    </div> --}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <h6 class="text-success">Arabic Content</h6>
                                        <label>Package Title (Arabic)</label>
                                        {{-- <input type="text" name="package_title_ar" value="{{ $service->package_title_ar ?? '' }}" class="form-control"> --}}
                                        <textarea name="package_title_ar" class="form-control summernote">{!! $service->package_title_ar ?? '' !!}</textarea>
                                    </div>
                                    <div class="col-12">
                                        <label>Button Text (Arabic)</label>
                                        <input type="text" name="package_button_text_ar" value="{{ $service->package_button_text_ar ?? '' }}" class="form-control">
                                    </div>
                                    {{-- <div class="col-12">
                                        <label>Button URL (Arabic)</label>
                                        <input type="text" name="package_button_url_ar" value="{{ $service->package_button_url_ar ?? '' }}" class="form-control">
                                    </div> --}}
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
                            <div class="col-12">
                                <label>Image <span class="text-danger">(Image Size (Pixels) - W-575 x H-575)</span></label>
                        
                                <input type="file" name="side_image" class="form-control preview-input" data-preview="#side_image_preview">
                                @if(!empty($service->side_image))
                                    <img id="side_image_preview" src="{{ asset('storage/'.$service->side_image) }}" class="img-thumbnail mt-2" style="max-width: 200px;">
                                @else
                                    <img id="side_image_preview" class="img-thumbnail mt-2 d-none" style="max-width: 200px;">
                                @endif
                          
                            </div>
                            <div class="col-md-6">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <h6 class="text-primary">English Content</h6>
                                        <label>Service Title (English)</label>
                                        <textarea name="service_title" class="form-control summernote">{!! $service->service_title ?? '' !!}</textarea>
                                    </div>
                                    <div class="col-12">
                                        <label>Service Description (English)</label>
                                        <textarea name="service_description" class="form-control summernote">{!! $service->service_description ?? '' !!}</textarea>
                                    </div>
                                    <div class="col-12">
                                        <label>Button Text (Arabic)</label>
                                        <input name="service_button_text" class="form-control" value="{{ $service->service_button_text }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <h6 class="text-success">Arabic Content</h6>
                                        <label>Service Title (Arabic)</label>
                                        <textarea name="service_title_ar" class="form-control summernote">{!! $service->service_title_ar ?? '' !!}</textarea>
                                    </div>
                                    <div class="col-12">
                                        <label>Service Description (Arabic)</label>
                                        <textarea name="service_description_ar" class="form-control summernote">{!! $service->service_description_ar ?? '' !!}</textarea>
                                    </div>
                                     <div class="col-12">
                                        <label>Button Text (Arabic)</label>
                                        <input name="service_button_text_ar" class="form-control" value="{{ $service->service_button_text_ar }}">
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
                                        <textarea name="package_section_title" class="form-control summernote">{!! $service->package_section_title ?? '' !!}</textarea>
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
                                        <textarea name="package_section_title_ar" class="form-control summernote">{!! $service->package_section_title_ar ?? '' !!}</textarea>
                                    </div>
                                    <div class="col-12">
                                        <label>Description (Arabic)</label>
                                        <input type="text" name="package_section_description_ar" value="{{ $service->package_section_description_ar ?? '' }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Services List --}}
                <div class="card mb-3">
                    <div class="card-header bg-primary text-white">Services List</div>
                    <div class="d-flex justify-content-end align-items-center m-2">
                        <a href="{{ route('admin.services.create') }}" class="btn btn-primary">Add New</a>
                    </div>
                    <div class="card-body">
                        @if ($services && $services->count() > 0)
                            <table class="table table-striped table-borderless table-centered">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Title Ar</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $i => $service)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td><img src="{{ asset($service->image) }}" width="80"></td>
                                            <td>{{ $service->title }}</td>
                                            <td>{{ $service->title_ar }}</td>
                                            <td>
                                                <div class="d-flex gap-3 align-items-center actions_btn">
                                                    <a href="{{ route('admin.services.edit', $service->id) }}" class="border-0 bg-transparent" title="Edit">
                                                        <img src="{{ asset('assets/admin/image/edit.png') }}" alt="">
                                                    </a>
                                                    <button type="button" class="border-0 bg-transparent delete-service-btn" data-service-id="{{ $service->id }}" title="Delete" onclick="return confirm('Delete Service?') && deleteService({{ $service->id }})">
                                                        <img src="{{ asset('assets/admin/image/delete.png') }}" alt="">
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-info">No services added yet.</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-success py-2">Save Service Page</button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
{{-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet"> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script> --}}
<script>
    $(document).ready(function(){
        // $('.summernote').summernote({
        //     height: 100,
        //     toolbar: [
        //         ['style', ['bold', 'italic', 'underline', 'clear']],
        //         ['font', ['fontname', 'fontsize']],
        //         ['color', ['forecolor']],
        //         ['para', ['paragraph']],
        //         ['insert', ['link', 'picture', 'video']],
        //         ['view', ['fullscreen', 'codeview', 'help']]
        //     ]
        // });
        // $('.title_control').summernote({
        //     height: 60,
        //     toolbar: [
        //         ['style', ['bold', 'italic', 'underline', 'clear']],
        //         ['font', ['fontname', 'fontsize']],
        //         ['color', ['forecolor']],
        //         ['para', ['paragraph']],
        //         ['insert', ['link', 'picture', 'video']],
        //         ['view', ['fullscreen', 'codeview', 'help']]
        //     ]
        // });

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
    // Delete Service Function
    function deleteService(serviceId) {
        $.ajax({
            url: `/admin/services/delete/${serviceId}`,
            type: 'DELETE',
            data: {
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                if (response.success) {
                    toastr.success('Service deleted successfully!', "Success", {
                        closeButton: true,
                        progressBar: true,
                        positionClass: "toast-top-right",
                        timeOut: "1000"
                    });
                    // Reload page after short delay
                    setTimeout(() => location.reload(), 1000);
                } else {
                    toastr.error('Failed to delete service.', "Error", {
                        closeButton: true,
                        progressBar: true,
                        positionClass: "toast-top-right",
                        timeOut: "2000"
                    });
                }
            },
            error: function() {
                toastr.error('Error deleting service.', "Error", {
                    closeButton: true,
                    progressBar: true,
                    positionClass: "toast-top-right",
                    timeOut: "2000"
                });
            }
        });
        return false;
    }
</script>
@endsection