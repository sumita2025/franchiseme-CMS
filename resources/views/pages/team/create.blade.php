@extends('layouts.master')

@section('content')
<div>


    <form action="{{ isset($team) ? route('admin.teams.update', $team->id) : route('admin.teams.store') }}"
          method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($team)) @method('PUT') @endif

        <div class="card mb-4">
            <div class="card-body">
                <div class="row g-4">

                     <div class="col-12">
                        <label>Team Image <span class="text-danger"></span></label>
                        <input type="file" name="image" class="form-control preview-input" data-preview="#team_image_preview">
                        @if(!empty($team->image))
                            <img id="team_image_preview" src="{{ asset($team->image) }}" class="img-thumbnail mt-2" style="max-width: 200px;">
                        @else
                            <img id="team_image_preview" class="img-thumbnail mt-2 d-none" style="max-width: 200px;">
                        @endif

                    </div>
                    <!-- English Content -->
                    <div class="col-md-6">
                        <div class="row g-3">
                            <div class="col-12">
                                <h6 class="text-primary">English Content</h6>
                                <label class="form-label fw-semibold">Title (English)</label>
                                <input type="text" class="form-control" name="title"
                                       placeholder="Enter title"
                                       value="{{ $team->title ?? '' }}">
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-semibold">Description (English)</label>
                                <textarea class="form-control summernote" name="description">
                                    {{ $team->description ?? '' }}
                                </textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Arabic Content -->
                    <div class="col-md-6">
                        <div class="row g-3">
                            <div class="col-12">
                                <h6 class="text-success">Arabic Content</h6>
                                <label class="form-label fw-semibold">Title (Arabic)</label>
                                <input type="text" class="form-control" name="title_ar"
                                       placeholder="Enter Arabic title"
                                       value="{{ $team->title_ar ?? '' }}">
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-semibold">Description (Arabic)</label>
                                <textarea class="form-control summernote" name="description_ar">
                                    {{ $team->description_ar ?? '' }}
                                </textarea>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Buttons -->
        <div class="d-flex justify-content-end gap-3">
            <button type="submit" class="btn btn-success py-2">Save</button>
            <a href="{{ route('admin.home.index') }}" class="btn btn-secondary py-2">
                Cancel
            </a>
        </div>

    </form>
</div>
@endsection


@section('scripts')
@endsection
