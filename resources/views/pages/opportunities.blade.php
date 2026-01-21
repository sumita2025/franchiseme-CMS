@extends('layouts.master')
@section('content')
<div>
    {{-- Page Title --}}
    <div class="mb-4">
        <h3 class="fw-bold text-dark">
            <i class="bi bi-building me-2 text-primary"></i>Franchise Management
        </h3>
        <p class="text-muted mb-0">Manage your franchise page content and franchise listings</p>
    </div>

    <form id="franchisePageForm" enctype="multipart/form-data">
        @csrf
        <div class="card mb-4">
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-12">
                        <label>Image <span class="text-danger">(Image Size (Pixels) - W-1845 x H-367)</span></label>
                            <input type="file" name="background_image" class="form-control preview-input" data-preview="#background_image_preview">
                            @if(!empty($page->background_image))
                                <img id="background_image_preview" src="{{ asset('storage/'.$page->background_image) }}" class="img-thumbnail mt-2" style="max-width: 200px;">
                            @else
                                <img id="background_image_preview" class="img-thumbnail mt-2 d-none" style="max-width: 200px;">
                            @endif
                        </div>
                    {{-- <div class="col-md-6">
                        <div class="row g-3">
                    
                            <div class="col-12">
                                <h6 class="text-primary">English Content</h6>
                                <label class="form-label">Title (English)</label>
                              
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
                    </div> --}}
                    {{-- <div class="col-md-6">
                        <div class="row g-3">
                            <div class="col-12">
                                <h6 class="text-success">Arabic Content</h6>
                                <label class="form-label">Title (Arabic)</label>
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
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-success py-2">Save</button>
        </div>
    </form>

    {{-- Franchises List --}}
    <div class="card mt-4">
        <div class="card-header bg-primary text-white">Franchises List</div>
        <div class="d-flex justify-content-end align-items-center m-2">
            <a href="{{ route('admin.franchises.create') }}" class="btn btn-primary btn-sm">Add Franchise</a>
        </div>
        <div class="card-body">
            @if ($franchises && $franchises->count() > 0)
                <table class="table table-striped table-borderless table-centered">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Logo</th>
                            <th>Title</th>
                            <th>Sector</th>
                            <th>Country</th>
                            <th>Investment</th>
                            <th>Featured</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($franchises as $key => $franchise)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    @if ($franchise->logo)
                                        <img src="{{ asset($franchise->logo) }}" width="60" class="rounded">
                                    @endif
                                </td>
                                <td>{{ $franchise->title }}</td>
                                <td>{{ $franchise->sector }}</td>
                                <td>{{ $franchise->country }}</td>
                                <td>{{ $franchise->investment_level }}</td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input status-toggle" type="checkbox" role="switch"
                                            data-id="{{ $franchise->id }}" {{ $franchise->status ? 'checked' : '' }}>
                                    </div>
                                    <span class="status-label">
                                        {{ $franchise->status ? 'ON' : 'OFF' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex gap-3 align-items-center actions_btn">
                                        <a href="{{ route('admin.franchises.edit', $franchise->id) }}" class="border-0 bg-transparent" title="Edit">
                                            <img src="{{ asset('/assets/admin/image/edit.png') }}" alt="">
                                        </a>
                                        <button type="button" class="border-0 bg-transparent delete-franchise-btn" data-franchise-id="{{ $franchise->id }}" title="Delete" onclick="return confirm('Delete this franchise?') && deleteFranchise({{ $franchise->id }})">
                                            <img src="{{ asset('/assets/admin/image/delete.png') }}" alt="">
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-info">No franchises added yet.</div>
            @endif
        </div>
    </div>
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

        

        // Status Toggle for Franchises
        $(document).on('change', '.status-toggle', function() {
            let id = $(this).data('id');
            let status = $(this).is(":checked") ? 1 : 0;

            $.ajax({
                url: "{{ route('admin.franchises.status.update') }}",
                type: "POST",
                data: {
                    id: id,
                    status: status,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    toastr.success('Featured Changed Successfully.', "Success", {
                        closeButton: true,
                        progressBar: true,
                        positionClass: "toast-top-right",
                        timeOut: "1000"
                    });
                },
                error: function(xhr, status, error) {
                    let errorMessage = "Something went wrong. Please try again!";
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    }

                    toastr.error(errorMessage, "Error", {
                        closeButton: true,
                        progressBar: true,
                        positionClass: "toast-top-right",
                        timeOut: "3000"
                    });
                }
            });
        });

  });

  // Delete Franchise Function
        function deleteFranchise(franchiseId) {
            $.ajax({
                url: `/admin/franchises/delete/${franchiseId}`,
                type: 'DELETE',
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.success) {
                        toastr.success('Franchise deleted successfully!', "Success", {
                            closeButton: true,
                            progressBar: true,
                            positionClass: "toast-top-right",
                            timeOut: "1000"
                        });
                        // Reload page after short delay
                        setTimeout(() => location.reload(), 1000);
                    } else {
                        toastr.error('Failed to delete franchise.', "Error", {
                            closeButton: true,
                            progressBar: true,
                            positionClass: "toast-top-right",
                            timeOut: "2000"
                        });
                    }
                },
                error: function() {
                    toastr.error('Error deleting franchise.', "Error", {
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