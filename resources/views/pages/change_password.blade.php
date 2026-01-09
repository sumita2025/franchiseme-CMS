@extends('layouts.master')

@section('content')
<div>
    {{-- Page Title --}}
    <div class="mb-4">
        <h3 class="fw-bold text-dark">
            <i class="bi bi-key me-2 text-primary"></i>Change Password
        </h3>
        <p class="text-muted mb-0">Update your password to keep your account secure</p>
    </div>

    <form id="changePasswordForm" enctype="multipart/form-data">
        @csrf

        {{-- Password Fields --}}
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <span>Password Information</span>
            </div>
            <div class="card-body">
                <div class="row g-4">

                    <!-- Current Password -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Current Password</label>
                        <div class="password-input-group">
                            <input type="password" class="form-control" 
                                   id="current_password" name="current_password" required 
                                   placeholder="Enter your current password">
                            <button class="toggle-password-btn" type="button" data-target="current_password" title="Show password">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                        <small class="text-danger d-block" id="current_password_error"></small>
                    </div>

                    <!-- New Password -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">New Password</label>
                        <div class="password-input-group">
                            <input type="password" class="form-control" 
                                   id="new_password" name="new_password" required 
                                   placeholder="Enter new password">
                            <button class="toggle-password-btn" type="button" data-target="new_password" title="Show password">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                        <small class="text-danger d-block" id="new_password_error"></small>
                    </div>

                    <!-- Confirm Password -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Confirm New Password</label>
                        <div class="password-input-group">
                            <input type="password" class="form-control" 
                                   id="confirm_password" name="confirm_password" required 
                                   placeholder="Re-enter new password">
                            <button class="toggle-password-btn" type="button" data-target="confirm_password" title="Show password">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                        <small class="text-danger d-block" id="confirm_password_error"></small>
                    </div>

                    <!-- Password Requirements -->
                    <div class="col-12">
                        <label class="form-label fw-semibold">Password Requirements</label>
                        <ul class="mb-0 small text-muted" style="padding-left: 20px;">
                            <li>At least 8 characters</li>
                            <li>One uppercase letter (A-Z)</li>
                            <li>One lowercase letter (a-z)</li>
                            <li>One number (0-9)</li>
                            <li>One special character (!@#$%^&*)</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

        <!-- Buttons -->
        <div class="d-flex justify-content-end gap-2">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary py-2">
                <i class="bi bi-arrow-left me-2"></i>Cancel
            </a>
            <button type="submit" class="btn btn-success py-2" id="submitChangePassword">
                <i class="bi bi-check-circle me-2"></i>Update Password
            </button>
        </div>

    </form>
</div>

<style>
    /* Password Input Styles */
    .password-input-group {
        position: relative;
        display: flex;
        align-items: center;
    }
    .password-input-group .form-control {
        padding-right: 45px;
        border: 2px solid #e0e7ff;
        border-radius: 8px;
        transition: all 0.3s ease;
        font-size: 14px;
    }
    .password-input-group .form-control:focus {
        border-color: #0f172a;
        box-shadow: 0 0 0 0.2rem rgba(15, 23, 42, 0.15);
    }
    .toggle-password-btn {
        position: absolute;
        right: 12px;
        background: none;
        border: none;
        color: #64748b;
        cursor: pointer;
        padding: 8px 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        transition: all 0.2s ease;
        z-index: 100;
        top: 50%;
        transform: translateY(-50%);
        pointer-events: auto !important;
        user-select: none;
    }
    .toggle-password-btn i {
        pointer-events: none;
    }
    .toggle-password-btn:hover {
        color: #0f172a;
    }
    .toggle-password-btn:focus {
        outline: none;
    }
    .toggle-password-btn:active {
        transform: translateY(-50%) scale(0.95);
    }

    .password-requirements-span {
        display: block;
        margin-top: 8px;
        padding: 10px;
        background: #fef2f2;
        border-left: 3px solid #dc2626;
        border-radius: 4px;
    }
    .password-requirements-span strong {
        color: #991b1b;
        display: block;
        margin-bottom: 6px;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .password-requirements-span ul {
        list-style: none;
        padding-left: 0 !important;
        font-size: 12px;
        color: #7f1d1d;
    }
    .password-requirements-span ul li {
        padding: 2px 0;
        padding-left: 18px;
        position: relative;
    }
    .password-requirements-span ul li:before {
        content: "•";
        position: absolute;
        left: 0;
        font-weight: bold;
    }
</style>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
 
        // Password strength requirements
        const passwordRequirements = {
            minLength: 8,
            hasUpperCase: /[A-Z]/,
            hasLowerCase: /[a-z]/,
            hasNumbers: /\d/,
            hasSpecialChar: /[!@#$%^&*()_+\-=\[\]{};:'"\\|,.<>\/?]/
        };

        // Validate individual fields on input
        $('#current_password').on('input', function() {
            validateCurrentPassword();
        });

        $('#new_password').on('input', function() {
            validateNewPassword();
            validateConfirmPassword();
        });

        $('#confirm_password').on('input', function() {
            validateConfirmPassword();
        });

        // Check password strength
        function checkPasswordStrength(password) {
            const errors = [];

            if (password.length < passwordRequirements.minLength) {
                errors.push(`At least ${passwordRequirements.minLength} characters`);
            }
            if (!passwordRequirements.hasUpperCase.test(password)) {
                errors.push('One uppercase letter (A-Z)');
            }
            if (!passwordRequirements.hasLowerCase.test(password)) {
                errors.push('One lowercase letter (a-z)');
            }
            if (!passwordRequirements.hasNumbers.test(password)) {
                errors.push('One number (0-9)');
            }
            if (!passwordRequirements.hasSpecialChar.test(password)) {
                errors.push('One special character (!@#$%^&*)');
            }

            return errors;
        }

        // Validate current password
        function validateCurrentPassword() {
            const currentPassword = $('#current_password').val().trim();
            const errorElement = $('#current_password_error');

            if (currentPassword === '') {
                errorElement.html('<i class="bi bi-exclamation-circle me-1"></i>Current password is required');
                return false;
            } else {
                errorElement.text('');
                return true;
            }
        }

        // Validate new password
        function validateNewPassword() {
            const currentPassword = $('#current_password').val().trim();
            const newPassword = $('#new_password').val().trim();
            const errorElement = $('#new_password_error');

            if (newPassword === '') {
                errorElement.html('<i class="bi bi-exclamation-circle me-1"></i>New password is required');
                return false;
            }

            if (newPassword === currentPassword && currentPassword !== '') {
                errorElement.html('<i class="bi bi-exclamation-circle me-1"></i>New password must be different from current password');
                return false;
            }

            // Check password strength
            const strengthErrors = checkPasswordStrength(newPassword);

            if (strengthErrors.length > 0) {
                const strengthHTML = '<span class="password-requirements-span"><strong>Password Requirements:</strong><ul>' +
                    strengthErrors.map(err => `<li>${err}</li>`).join('') +
                    '</ul></span>';
                errorElement.html('<i class="bi bi-exclamation-circle me-1"></i>Password does not meet strength requirements');
                
                // Remove old requirement span if exists
                errorElement.siblings('.password-requirements-span').remove();
                errorElement.after(strengthHTML);
                return false;
            } else {
                errorElement.html('<i class="bi bi-check-circle text-success me-1"></i><span class="text-success">Strong password</span>');
                errorElement.siblings('.password-requirements-span').remove();
                return true;
            }
        }

        // Validate confirm password
        function validateConfirmPassword() {
            const newPassword = $('#new_password').val().trim();
            const confirmPassword = $('#confirm_password').val().trim();
            const errorElement = $('#confirm_password_error');

            if (confirmPassword === '') {
                errorElement.html('<i class="bi bi-exclamation-circle me-1"></i>Confirm password is required');
                return false;
            } else if (confirmPassword !== newPassword) {
                errorElement.html('<i class="bi bi-exclamation-circle me-1"></i>Passwords do not match');
                return false;
            } else {
                errorElement.html('<i class="bi bi-check-circle text-success me-1"></i><span class="text-success">Match</span>');
                return true;
            }
        }

        // Validate entire form
        function validateForm() {
            const isCurrentPasswordValid = validateCurrentPassword();
            const isNewPasswordValid = validateNewPassword();
            const isConfirmPasswordValid = validateConfirmPassword();

            return isCurrentPasswordValid && isNewPasswordValid && isConfirmPasswordValid;
        }

        // Handle form submission
        $('#submitChangePassword').on('click', function(e) {
            e.preventDefault();
            
            // Validate form before submission
            if (!validateForm()) {
                toastr.error('Please fix the errors above');
                return;
            }

            const form = $('#changePasswordForm')[0];
            const formData = new FormData(form);
            const submitBtn = $(this);

            // Disable button during submission
            submitBtn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-2"></span>Updating...');

            $.ajax({
                url: '{{ route("admin.change-password.update") }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(data) {
                    if (data.success) {
                        toastr.success(data.message);
                        
                        // Redirect to dashboard after success
                        setTimeout(function() {
                            window.location.href = '{{ route("admin.dashboard") }}';
                        }, 1500);
                    } else {
                        toastr.error(data.message);
                        submitBtn.prop('disabled', false).html('<i class="bi bi-check-circle me-2"></i>Update Password');
                    }
                },
                error: function(xhr, status, error) {
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            $('#' + key + '_error').html('<i class="bi bi-exclamation-circle me-1"></i>' + value[0]);
                        });
                        toastr.error('Please fix the validation errors');
                    } else {
                        toastr.error('An error occurred. Please try again.');
                        console.error('Error:', error);
                    }
                    submitBtn.prop('disabled', false).html('<i class="bi bi-check-circle me-2"></i>Update Password');
                }
            });
        });

        // Toggle password visibility
        $('.toggle-password-btn').click(function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const targetId = $(this).data('target');
            const $inputField = $('#' + targetId);
            const $icon = $(this).find('i');
            
            console.log('Toggle clicked for:', targetId, 'Current type:', $inputField.attr('type'));
            
            if ($inputField.length === 0) {
                console.error('Input field not found with ID:', targetId);
                return false;
            }

            const currentType = $inputField.attr('type');
            
            if (currentType === 'password') {
                $inputField.attr('type', 'text');
                $icon.removeClass('bi-eye').addClass('bi-eye-slash');
                $(this).attr('title', 'Hide password');
                console.log('Password shown');
            } else {
                $inputField.attr('type', 'password');
                $icon.removeClass('bi-eye-slash').addClass('bi-eye');
                $(this).attr('title', 'Show password');
                console.log('Password hidden');
            }
            
            return false;
        });
    });
</script>
@endsection
