@extends('layouts.master')
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
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($franchises as $key => $franchise)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            @if($franchise->logo)
                                <img src="{{ asset($franchise->logo) }}" width="60" class="rounded">
                            @endif
                        </td>
                        <td>{{ $franchise->title }}</td>
                        <td>{{ $franchise->sector }}</td>
                        <td>{{ $franchise->country }}</td>
                        <td>{{ $franchise->investment_level }}</td>
                        <td>
                            <div class="d-flex gap-3 align-items-center actions_btn">
                                <a href="{{ route('admin.franchises.edit', $franchise->id) }}">
                                    <img src="{{asset('/assets/admin/image/edit.png')}}" alt="">
                                </a>
                                <form action="{{ route('admin.franchises.delete', $franchise->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="border-0 bg-transparent" onclick="return confirm('Delete this franchise?')">
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