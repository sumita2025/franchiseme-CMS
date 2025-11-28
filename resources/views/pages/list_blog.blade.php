@extends('layouts.master')
@section('content')
<div class="">
    <div class="d-flex justify-content-end align-items-center mb-3">
        <!-- <h3>Brand Management</h3> -->
        <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">Add New Blog</a>
    </div>

    <div class="card">
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
                    @foreach($blogs as $i => $blog)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td><img src="{{ asset($blog->feature_image) }}" width="80"></td>
                        <td>{{ $blog->title }}</td>
                        <td>{{ $blog->title_ar }}</td>
              
                        <td>
                            <div class="d-flex gap-3 align-items-center actions_btn">
                                <a href="{{ route('admin.blogs.edit', $blog->id) }}">
                                    <img src="{{asset('assets/admin/image/edit.png')}}" alt="">
                                </a>
                                <form action="{{ route('admin.blogs.delete', $blog->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Delete Blog?')" class="border-0 bg-transparent">
                                        <img src="{{asset('assets/admin/image/delete.png')}}" alt="">
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