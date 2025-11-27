@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
<div>
    <!-- Page Title -->
    <!-- <div class="d-flex justify-content-between align-items-center mb-4"> -->
        <!-- <h3 class="mb-0">CMS Dashboard</h3> -->
        <!-- <button class="btn btn-primary"><i class="bi bi-plus-circle me-2"></i>Quick Add Section</button> -->
    <!-- </div> -->

    <!-- Quick Stats -->
    <div class="row">
        <div class="col-md-3">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-body text-center">
                    <i class="bi bi-house-door fs-2 text-primary mb-2"></i>
                    <h5 class="fw-bold">Home Page</h5>
                    <p class="text-muted mb-2">Total Sections: 6</p>
                    <a href="{{ route('admin.home.index') }}" class="btn btn-outline-primary btn-sm">Manage</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-body text-center">
                    <i class="bi bi-question-circle fs-2 text-success mb-2"></i>
                    <h5 class="fw-bold">FAQ Page</h5>
                    <p class="text-muted mb-2">Total Sections: 1</p>
                    <a href="" class="btn btn-outline-success btn-sm">Manage</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-body text-center">
                    <i class="bi bi-telephone fs-2 text-danger mb-2"></i>
                    <h5 class="fw-bold">Contact Page</h5>
                    <p class="text-muted mb-2">Total Sections: 2</p>
                    <a href="" class="btn btn-outline-danger btn-sm">Manage</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-body text-center">
                    <i class="bi bi-briefcase fs-2 text-warning mb-2"></i>
                    <h5 class="fw-bold">Opportunities</h5>
                    <p class="text-muted mb-2">Total Sections: 3</p>
                    <a href="" class="btn btn-outline-warning btn-sm">Manage</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <!-- <div class="card border-0 shadow-sm rounded-3 mb-4">
        <div class="card-header bg-light fw-bold">Recent Updates</div>
        <div class="card-body">
            <table class="table align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Page</th>
                        <th>Section</th>
                        <th>Edited By</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>01</td>
                        <td>Home</td>
                        <td>Banner</td>
                        <td>Admin</td>
                        <td>Nov 6, 2025</td>
                        <td><span class="badge bg-success">Published</span></td>
                    </tr>
                    <tr>
                        <td>02</td>
                        <td>FAQ</td>
                        <td>General Questions</td>
                        <td>Editor</td>
                        <td>Nov 5, 2025</td>
                        <td><span class="badge bg-warning text-dark">Pending</span></td>
                    </tr>
                    <tr>
                        <td>03</td>
                        <td>Contact</td>
                        <td>Map Section</td>
                        <td>Admin</td>
                        <td>Nov 3, 2025</td>
                        <td><span class="badge bg-success">Published</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div> -->

    <!-- Quick Navigation -->
    <!-- <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-body">
                    <h5 class="fw-bold"><i class="bi bi-gear me-2 text-primary"></i>General Settings</h5>
                    <p class="text-muted small mb-3">Manage site title, logo, favicon, and contact info.</p>
                    <a href="#" class="btn btn-primary btn-sm">Open Settings</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-body">
                    <h5 class="fw-bold"><i class="bi bi-people me-2 text-success"></i>User Management</h5>
                    <p class="text-muted small mb-3">View and manage users with access to CMS.</p>
                    <a href="#" class="btn btn-success btn-sm">Manage Users</a>
                </div>
            </div>
        </div>
    </div> -->
</div>
@endsection