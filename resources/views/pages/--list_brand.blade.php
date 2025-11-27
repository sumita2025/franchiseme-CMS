@extends('layouts.master')
@section('content')
<div class="">
    <div class="d-flex justify-content-end align-items-center mb-3">
        <!-- <h3>Brand Management</h3> -->
        <a href="{{ route('admin.brands.create') }}" class="btn btn-primary">+ Add New Brand</a>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered align-middle mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Brand Image</th>
                        <th>Title</th>
                        <th>Tag</th>
                        <th>Slug</th>
                        <th>Button</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($brands as $i => $brand)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td><img src="{{ asset('uploads/'.$brand->brand_image) }}" width="80"></td>
                        <td>{{ $brand->brand_title }}</td>
                        <td>{{ $brand->brand_tag }}</td>
                        <td>{{ $brand->brand_slug }}</td>
                        <td>{{ $brand->brand_button }}</td>
                        <td>
                            <a href="{{ route('admin.brands.edit', $brand->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.brands.delete', $brand->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete brand?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection