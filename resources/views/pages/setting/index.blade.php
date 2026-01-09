@extends('layouts.master')

@section('content')
    <div>
        {{-- Page Title --}}
        <div class="mb-4">
            <h3 class="fw-bold text-dark">
                <i class="bi bi-gear me-2 text-primary"></i>Settings
            </h3>
            <p class="text-muted mb-0">Configure site settings, logos, and email configuration</p>
        </div>

        <form action="{{ route('admin.setting.save') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="#tab_site_section" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                        <span>Site Section</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#tab_email_section" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                        <span>Email Section</span>
                    </a>
                </li>
              
            </ul>
            <div class="tab-content text-muted mb-4">
                <div class="tab-pane show active" id="tab_site_section">
                    {{-- SITE SECTION --}}
                    <div class="card mb-3">
                        <div class="card-header bg-primary text-white">Site Section</div>
                        <div class="card-body">
                            <div class="row g-4">
                              
                                <div class="col-md-6">
                                    <div class="row g-3">
                                        {{-- English Fields --}}
                                        <div class="col-12">
                                            <h6 class="text-primary">English Content</h6>
                                            <label>Title (English)</label>
                                            <input type="text" name="title"
                                                value="{{ $title ?? '' }}" class="form-control">
                                        </div>
                                
                                        <div class="col-6">
                                            {{-- <h6 class="text-primary">English Content</h6> --}}
                                            <label>Header Logo  (English) <span class="text-danger">(Image Size (Pixels) - W-250 x H-50)</span></label>
                                            <input type="file" name="header_logo" class="form-control preview-input"
                                                data-preview="#header_logo_preview">
                                            @if (!empty($headerLogo))
                                                <img id="header_logo_preview"
                                                    src="{{ asset($headerLogo) }}"
                                                    class="img-thumbnail mt-2" style="max-width: 200px;">
                                            @else
                                                <img id="header_logo_preview" class="img-thumbnail mt-2 d-none"
                                                    style="max-width: 200px;">
                                            @endif
                                        </div>

                                         <div class="col-6">
                                            <label>Footer Logo (English) <span class="text-danger">(Image Size (Pixels) - W-295 x H-60)</span></label>
                                            <input type="file" name="footer_logo" class="form-control preview-input"
                                                data-preview="#footer_logo_preview">
                                            @if (!empty($footerLogo))
                                                <img id="footer_logo_preview"
                                                    src="{{ asset($footerLogo) }}"
                                                    class="img-thumbnail mt-2" style="max-width: 200px;">
                                            @else
                                                <img id="footer_logo_preview" class="img-thumbnail mt-2 d-none"
                                                    style="max-width: 200px;">
                                            @endif
                                        </div>
                                        <div class="col-12">
                                            <label>Favicon Logo (English) <span class="text-danger">(Image Size (Pixels) - W-32 x H-32)</span></label>
                                            <input type="file" name="favicon_logo" class="form-control preview-input"
                                                data-preview="#favicon_logo_preview">
                                            @if (!empty($faviconLogo))
                                                <img id="favicon_logo_preview"
                                                    src="{{ asset($faviconLogo) }}"
                                                    class="img-thumbnail mt-2" style="max-width: 200px;">
                                            @else
                                                <img id="favicon_logo_preview" class="img-thumbnail mt-2 d-none"
                                                    style="max-width: 200px;">
                                            @endif
                                        </div>
                                        <div class="col-6">
                                            <label>Copyright Text (English)<span class="text-danger"></span></label>
                                            <input type="text" name="copy_right_text"
                                                value="{{ $copy_right_text ?? '' }}" class="form-control">
                                        </div>
                                       
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    {{-- Arabic Fields --}}
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <h6 class="text-success">Arabic Content</h6>
                                            <label>Title (Arabic)</label>
                                            <input type="text" name="title_ar"
                                                value="{{ $title_ar ?? '' }}" class="form-control">
                                        </div>
                                      
                                         <div class="col-6">
                                           
                                            <label>Header Logo (Arabic) <span class="text-danger">(Image Size (Pixels) - W-250 x H-50)</span></label>
                                            <input type="file" name="header_logo_ar" class="form-control preview-input"
                                                data-preview="#header_logo_ar_preview">
                                            @if (!empty($headerLogoAr))
                                                <img id="header_logo_ar_preview"
                                                    src="{{ asset($headerLogoAr) }}"
                                                    class="img-thumbnail mt-2" style="max-width: 200px;">
                                            @else
                                                <img id="header_logo_ar_preview" class="img-thumbnail mt-2 d-none"
                                                    style="max-width: 200px;">
                                            @endif
                                        </div>
                                        <div class="col-6">
                                            <label>Footer Logo (Arabic) <span class="text-danger">(Image Size (Pixels) - W-295 x H-60)</span></label>
                                            <input type="file" name="footer_logo_ar" class="form-control preview-input"
                                                data-preview="#footer_logo_ar_previfew">
                                            @if (!empty($footerLogoAr))
                                                <img id="footer_logo_ar_preview"
                                                    src="{{ asset($footerLogoAr) }}"
                                                    class="img-thumbnail mt-2" style="max-width: 200px;">
                                            @else
                                                <img id="footer_logo_ar_preview" class="img-thumbnail mt-2 d-none"
                                                    style="max-width: 200px;">
                                            @endif
                                        </div>
                                         <div class="col-12">
                                            <label>Favicon Logo (Arabic) <span class="text-danger">(Image Size (Pixels) - W-32 x H-32)</span></label>
                                            <input type="file" name="favicon_logo_ar" class="form-control preview-input"
                                                data-preview="#favicon_logo_ar_preview">
                                            @if (!empty($faviconLogoAr))
                                                <img id="favicon_logo_ar_preview"
                                                    src="{{ asset($faviconLogoAr) }}"
                                                    class="img-thumbnail mt-2" style="max-width: 200px;">
                                            @else
                                                <img id="favicon_logo_ar_preview" class="img-thumbnail mt-2 d-none"
                                                    style="max-width: 200px;">
                                            @endif
                                        </div>
                                         <div class="col-6">
                                            <label>Copyright Text (Arabic)<span class="text-danger"></span></label>
                                            <input type="text" name="copy_right_text_ar"
                                                value="{{ $copy_right_text_ar ?? '' }}" class="form-control">
                                        </div>
                                         
                                      
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab_email_section">
                   {{-- EMAIL SECTION --}}
                    <div class="card mb-3">
                        <div class="card-header bg-primary text-white">Email Settings</div>

                        <div class="card-body">
                            <div class="row g-4">

                                {{-- Mail Driver --}}
                                <div class="col-md-6">
                                    <label>Mail Driver</label>
                                    <input type="text" name="mail_driver" value="{{ $mail_driver ?? '' }}" class="form-control">
                                </div>

                                {{-- Mail Host --}}
                                <div class="col-md-6">
                                    <label>Mail Host</label>
                                    <input type="text" name="mail_host" value="{{ $mail_host ?? '' }}" class="form-control">
                                </div>

                                {{-- Mail Port --}}
                                <div class="col-md-6">
                                    <label>Mail Port</label>
                                    <input type="text" name="mail_port" value="{{ $mail_port ?? '' }}" class="form-control">
                                </div>

                                {{-- Mail Username --}}
                                <div class="col-md-6">
                                    <label>Mail Username</label>
                                    <input type="text" name="mail_username" value="{{ $mail_username ?? '' }}" class="form-control">
                                </div>

                                {{-- Mail Password --}}
                                <div class="col-md-6">
                                    <label>Mail Password</label>
                                    <input type="text" name="mail_password" value="{{ $mail_password ?? '' }}" class="form-control">
                                </div>

                                {{-- Mail Encryption --}}
                                <div class="col-md-6">
                                    <label>Mail Encryption</label>
                                    <input type="text" name="mail_encryption" value="{{ $mail_encryption ?? '' }}" class="form-control">
                                </div>

                                {{-- Mail From Address --}}
                                <div class="col-md-6">
                                    <label>Mail From Address</label>
                                    <input type="email" name="mail_from_address"
                                        value="{{ $mail_from_address ?? '' }}" class="form-control">
                                </div>

                                {{-- Mail From Name --}}
                                <div class="col-md-6">
                                    <label>Mail From Name</label>
                                    <input type="text" name="mail_from_name"
                                        value="{{ $mail_from_name ?? '' }}" class="form-control">
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
    
      
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success py-2">Save All</button>
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
