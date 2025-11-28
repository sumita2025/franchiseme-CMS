@extends('layouts.master')
@section('style')
@endsection
@section('content')
    <div>
        <div class="d-flex justify-content-end align-items-center mb-3">
            <!-- <h3>Franchise List</h3> -->
            <a href="{{ route('admin.franchises.create') }}" class="btn btn-primary btn-sm">Add Franchise</a>
        </div>

        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-borderless table-centered">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Logo</th>
                            <th>Title</th>
                            <th>Sector</th>
                            <th>Country</th>
                            <th>Investment</th>
                            <th>Featured</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($franchises as $key => $franchise)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    @if ($franchise->logo)
                                        <img src="{{ asset($franchise->logo) }}" width="60" class="rounded">
                                    @endif
                                </td>
                                <td>{{ $franchise->title }}</td>
                                <td>{{ $franchise->sector }}</td>
                                <td>{{ $franchise->country }}</td>
                                <td>{{ $franchise->investment_level }}</td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input status-toggle" type="checkbox" role="switch"
                                            data-id="{{ $franchise->id }}" {{ $franchise->status ? 'checked' : '' }}>
                                    </div>
                                    <span class="status-label">
                                        {{ $franchise->status ? 'ON' : 'OFF' }}
                                    </span>
                                <td>
                                    <div class="d-flex gap-3 align-items-center actions_btn">
                                        <a href="{{ route('admin.franchises.edit', $franchise->id) }}">
                                            <img src="{{ asset('/assets/admin/image/edit.png') }}" alt="">
                                        </a>
                                        <form action="{{ route('admin.franchises.delete', $franchise->id) }}"
                                            method="POST" class="d-inline">
                                            @csrf @method('DELETE')
                                            <button class="border-0 bg-transparent"
                                                onclick="return confirm('Delete this franchise?')">
                                                <img src="{{ asset('/assets/admin/image/delete.png') }}" alt="">
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
    <script>
        $(document).on('change', '.status-toggle', function() {
            let id = $(this).data('id');
            let status = $(this).is(":checked") ? 1 : 0;

            $.ajax({
                url: "{{ route('admin.franchises.status.update') }}",
                type: "POST",
                data: {
                    id: id,
                    status: status,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    // console.log("Status Updated");
                    toastr.success('Featured Chnaged Successfully.', "Success", {
                        closeButton: true,
                        progressBar: true,
                        positionClass: "toast-top-right",
                        timeOut: "1000"
                    });
                },
                error: function(xhr, status, error) {
                    // Get error message from response if available
                    let errorMessage = "Something went wrong. Please try again!";
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    }

                    toastr.error(errorMessage, "Error", {
                        closeButton: true,
                        progressBar: true,
                        positionClass: "toast-top-right",
                        timeOut: "3000" // 3 seconds
                    });
                }
            });
        });
    </script>
@endsection
