@extends('layouts.master')
@section('content')
    <div class="">

        {{-- Service Page Setting Title and Banner Image Start --}}
        <form action="{{ route('admin.services.service_page_store') }}" method="POST" enctype="multipart/form-data">
            @csrf
              <div class="card mb-3">
                    <div class="card-header bg-primary text-white">Package Section</div>
                        <div class="card-body">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            {{-- English --}}
                                            <h6 class="text-primary">English Content</h6>
                                            <label>Title (English)</label>
                                            <textarea name="title" class="form-control summernote">{!! $common_data->title ?? '' !!}</textarea>
                                        </div>
                                        <div class="col-12">
                                            <label>Description (English)</label>
                                            <textarea name="description" class="form-control summernote">{!! $common_data->description ?? '' !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            {{-- Arabic --}}
                                            <h6 class="text-success">Arabic Content</h6>
                                            <label>Title (Arabic)</label>
                                            <textarea name="title_ar" class="form-control summernote">{!! $common_data->title_ar ?? '' !!}</textarea>
                                        </div>
                                        <div class="col-12">
                                            <label>Description (Arabic)</label>
                                            <textarea name="description_ar" class="form-control summernote">{!! $common_data->description_ar ?? '' !!}</textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    <div class="d-flex justify-content-end m-2">
                        <button class="btn btn-success py-2">Save </button>
                    </div>
                </div>
        </form>
        {{-- Service Page Setting Title and Banner Image End --}}
        <div class="card">
            <div class="card-header bg-primary text-white">Services List</div>
            <div class="d-flex justify-content-end align-items-center m-2">
                <!-- <h3>Brand Management</h3> -->
                <a href="{{ route('admin.services.create') }}" class="btn btn-primary">Add New</a>
            </div>
            <div class="card-body">
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
                                        <a href="{{ route('admin.services.edit', $service->id) }}">
                                            <img src="{{ asset('assets/admin/image/edit.png') }}" alt="">
                                        </a>
                                        <form action="{{ route('admin.services.delete', $service->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf @method('DELETE')
                                            <button onclick="return confirm('Delete Service?')"
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
