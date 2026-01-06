@extends('layouts.master')
@section('content')
    <div class="">
        {{-- Page Title --}}
        <div class="mb-4">
            <h3 class="fw-bold text-dark">
                <i class="bi bi-journal-text me-2 text-primary"></i>Blog Management
            </h3>
            <p class="text-muted mb-0">Manage your blog page content and articles</p>
        </div>

        {{-- Blog Page Setting Title and Banner Image Start --}}
        <form action="{{ route('admin.blogs.blog_page_store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card mb-4">
                <div class="card-header bg-primary text-white">Blog Page</div>
                <div class="card-body">
                    <div class="row g-4">

                        <!-- Feature Image -->
                        <div class="col-md-12">
                            <label class="form-label fw-semibold">
                                Background Image
                                <span class="text-danger">(Recommended Size 800 x 500)</span>
                            </label>
                            <input type="file" class="form-control" name="background_image">

                            @if (!empty($pageBlog->background_image))
                                <img src="{{ asset($pageBlog->background_image) }}" class="img-thumbnail mt-2"
                                    width="150">
                            @endif
                        </div>


                        <!-- English Content -->
                        <div class="col-md-6">
                            <div class="row g-3">

                                <div class="col-12">
                                    <h6 class="text-primary">English Content</h6>
                                    <label class="form-label fw-semibold">Title (English)</label>
                                    <textarea class="form-control summernote" name="title">
                                    {{ $pageBlog->title ?? '' }}
                                </textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Arabic Content -->
                        <div class="col-md-6">
                            <div class="row g-3">
                                <div class="col-12">
                                    <h6 class="text-success">Arabic Content</h6>
                                    <label class="form-label fw-semibold">Description (Arabic)</label>
                                    <textarea class="form-control summernote" name="title_ar">
                                    {{ $pageBlog->title_ar ?? '' }}
                                </textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="d-flex justify-content-end m-2">
                    <button class="btn btn-success py-2">Save Blog Page</button>
                </div>
            </div>

        </form>
        {{-- Blog Page Setting Title and Banner Image End --}}
        <div class="card">
            <div class="card-header bg-primary text-white">Blogs List</div>
            <div class="d-flex justify-content-end align-items-center m-2">
                <!-- <h3>Brand Management</h3> -->
                <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">Add New Blog</a>
            </div>
            <div class="card-body">
                <table class="table table-striped table-borderless table-centered">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Feature Image</th>
                            <th>Title</th>
                            <th>Title Ar</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $i => $blog)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td><img src="{{ asset($blog->feature_image) }}" width="80"></td>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->title_ar }}</td>

                                <td>
                                    <div class="d-flex gap-3 align-items-center actions_btn">
                                        <a href="{{ route('admin.blogs.edit', $blog->id) }}">
                                            <img src="{{ asset('assets/admin/image/edit.png') }}" alt="">
                                        </a>
                                        <form action="{{ route('admin.blogs.delete', $blog->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf @method('DELETE')
                                            <button onclick="return confirm('Delete Blog?')"
                                                class="border-0 bg-transparent">
                                                <img src="{{ asset('assets/admin/image/delete.png') }}" alt="">
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


@section('scripts')

@endsection
