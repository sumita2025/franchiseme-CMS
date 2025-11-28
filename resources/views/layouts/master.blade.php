<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FranchiseMe CMS Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Bootstrap & Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    {{-- Summernote --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-bs5.min.css" rel="stylesheet">

    <!-- Font Link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    
    <link href="{{asset('/assets/admin/css/custom.css')}}" rel="stylesheet">

    <style>
        body {
            background-color: #f5f7fa;
            font-family: 'Poppins', sans-serif;
        }
        .sidebar {
            height: 100vh;
            background: #0f172a;
            color: #fff;
            padding-top: 20px;
            position: fixed;
            width: 250px;
        }
        .sidebar a {
            color: #adb5bd;
            display: block;
            padding: 10px 20px;
            text-decoration: none;
            transition: all 0.3s;
        }
        .sidebar a.active, .sidebar a:hover {
            background: #1e293b;
            color: #fff;
        }
        .main-content {
            margin-left: 250px;
            padding: 25px;
        }
        .navbar {
            background: #fff;
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        }
        .content-card {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        /* Fix for Summernote inside custom layouts */
        .note-editor.note-frame {
            border-radius: 8px;
            overflow: hidden;
            z-index: 1050;
        }
        .note-toolbar {
            background-color: #f8f9fa !important;
            border-bottom: 1px solid #dee2e6 !important;
        }
        .note-editable {
            background: #fff !important;
            color: #212529 !important;
            min-height: 180px !important;
        }
    </style>
</head>
<body>
    {{-- Sidebar --}}
    <div class="sidebar">
        <div class="text-center mb-4">
            <h4 class="fw-bold text-white">FranchiseMe CMS</h4>
        </div>

        <!-- Dashboard -->
        <a href="{{ route('admin.dashboard') }}"
        class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>

        <!-- Home Page -->
        <a href="{{ route('admin.home.index') }}"
        class="{{ request()->routeIs('admin.home.*') ? 'active' : '' }}">
            <i class="bi bi-house"></i> Home Page
        </a>

        <!-- Service Page -->
        <a href="{{ route('admin.service.index') }}"
        class="{{ request()->routeIs('admin.service.*') ? 'active' : '' }}">
            <i class="bi bi-person-lines-fill"></i> Service Page
        </a>

        <!-- Contact Page -->
        <a href="{{ route('admin.contact.index') }}"
        class="{{ request()->routeIs('admin.contact.*') ? 'active' : '' }}">
            <i class="bi bi-envelope"></i> Contact Page
        </a>

        <!-- FAQ Page -->
        <a href="{{ route('admin.faq.index') }}"
        class="{{ request()->routeIs('admin.faq.*') ? 'active' : '' }}">
            <i class="bi bi-question-circle"></i> FAQ Page
        </a>

        <!-- Blog Page -->
        <a href="{{ route('admin.blogs.index') }}"
        class="{{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}">
            <i class="bi bi-question-circle"></i> Blog Management
        </a>

        <!-- Franchise Section -->
        <div class="d-flex align-items-center justify-content-between sub_menu {{ request()->is('admin/franchises*') || request()->is('admin/brands*') ? 'active-parent' : '' }}">
            <a href="{{ route('admin.franchise.index') }}" class="p-0">
                <i class="bi bi-diagram-3"></i> Franchise Page
            </a>
            <a href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#franchise_tab" aria-expanded="{{ request()->is('admin/franchises*') || request()->is('admin/brands*') ? 'true' : 'false' }}" class="p-0">
                <i class="bi bi-chevron-down float-end toggle-arrow"></i>
            </a>
        </div>
        <div class="collapse {{ request()->is('admin/franchises*') || request()->is('admin/brands*') ? 'show' : '' }}" id="franchise_tab">
            <a href="{{ route('admin.brands.index') }}" class="{{ request()->is('admin/brands*') ? 'active' : '' }}">
                <i class="bi bi-tags"></i> Brand Management
            </a>
            <a href="{{ route('admin.franchises.index') }}" class="{{ request()->is('admin/franchises*') ? 'active' : '' }}">
                <i class="bi bi-building"></i> Franchise Management
            </a>
        </div>

        <!-- Inquiry Section -->
        <a href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#inquiry_tab" aria-expanded="{{ request()->is('admin/contact-inquiries') || request()->is('admin/service-training-inquiries') || request()->is('admin/specific-service-inquiries') ? 'true' : 'false' }}">
            <i class="bi bi-envelope"></i> Inquiry
            <i class="bi bi-chevron-down float-end toggle-arrow"></i>
        </a>
        <div class="collapse {{ request()->is('admin/contact-inquiries') || request()->is('admin/service-training-inquiries') || request()->is('admin/specific-service-inquiries') ? 'show' : '' }}" id="inquiry_tab">
            <a href="{{ route('admin.inquiries.contact') }}" class="{{ request()->is('admin/contact-inquiries') ? 'active' : '' }}">
                <i class="bi bi-envelope"></i> Contact Inquiry
            </a>
            <a href="{{ route('admin.inquiries.training') }}" class="{{ request()->is('admin/service-training-inquiries') ? 'active' : '' }}">
                <i class="bi bi-people-fill"></i> Service Training Inquiry
            </a>
            <a href="{{ route('admin.inquiries.specific') }}" class="{{ request()->is('admin/specific-service-inquiries') ? 'active' : '' }}">
                <i class="bi bi-gear"></i> Specific Service Inquiry
            </a>
        </div>
    </div>

    {{-- Main Content --}}
    <div class="main-content p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm py-3 px-4">
            <div class="container-fluid px-0">
                <span class="navbar-brand fw-bold py-0">Admin Panel</span>

                <div class="dropdown ms-auto">
                    <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle"
                    id="adminDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle fs-4 me-2"></i>
                        <span class="fw-semibold">{{ Auth::user()->name ?? 'Admin' }}</span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="adminDropdown">
                        <li>
                            <a class="dropdown-item" href="">
                                <i class="bi bi-key me-2"></i> Change Password
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('admin.logout') }}" method="POST" class="m-0 p-0">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger w-100 text-start">
                                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div style="background-color: #f9f7f7;" class="p-4">
            @yield('content')
        </div>
    </div>

    {{-- JS --}}
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-bs5.min.js"></script>

    <script>
        $(document).ready(function(){
            $('.submenu-toggle').on('click', function(){
                const submenu = $(this).next('.submenu');
                const arrow = $(this).find('.toggle-arrow');

                // Close all others
                $('.submenu').not(submenu).slideUp();
                $('.submenu-toggle').not(this).removeClass('active').find('.toggle-arrow').css('transform', 'rotate(0deg)');

                // Toggle current submenu
                submenu.slideToggle();
                $(this).toggleClass('active');
            });
        });
    </script>

    @yield('scripts')
</body>
</html>