@extends('layouts.master')
@section('content')
<div class="">
    <div class="d-flex justify-content-end align-items-center mb-3">
        <!-- <h3>Brand Management</h3> -->
        <a href="{{ route('admin.brands.create') }}" class="btn btn-primary">Add New Brand</a>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-borderless table-centered">
                <thead class="table-light">
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
                        <td><img src="{{ asset('uploads/brands/'.$brand->brand_image) }}" width="80"></td>
                        <td>{{ $brand->brand_title }}</td>
                        <td>{{ $brand->brand_tag }}</td>
                        <td>{{ $brand->brand_slug }}</td>
                        <td>{{ $brand->brand_button }}</td>
                        <td>
                            <div class="d-flex gap-3 align-items-center actions_btn">
                                <a href="{{ route('admin.brands.edit', $brand->id) }}">
                                    <img src="{{asset('/assets/admin/image/edit.png')}}" alt="">
                                </a>
                                <form action="{{ route('admin.brands.delete', $brand->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Delete brand?')" class="border-0 bg-transparent">
                                        <img src="{{asset('/assets/admin/image/delete.png')}}" alt="">
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