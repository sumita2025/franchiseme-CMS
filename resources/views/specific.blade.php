@extends('layouts.master')

@section('content')
<div>
    {{-- Page Title --}}
    <div class="mb-4">
        <h3 class="fw-bold text-dark">
            <i class="bi bi-chat-square-text me-2 text-primary"></i>Specific Service Inquiries
        </h3>
        <p class="text-muted mb-0">View and manage specific service inquiries from users</p>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-striped table-borderless table-centered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Country</th>
                        <th>Brand</th>
                        <th>Investment Range</th>
                        <th>Message</th>
                        <th>Service Title</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($inquiries as $index => $row)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $row->full_name ?? '-' }}</td>
                            <td>{{ $row->email ?? '-' }}</td>
                            <td>{{ $row->phone_number ?? '-' }}</td>
                            <td>{{ $row->country ?? '-' }}</td>
                            <td>{{ $row->brand ?? '-' }}</td>
                            <td>{{ $row->investment_range ?? '-' }}</td>
                            <td>{{ Str::limit($row->message, 30) ?? '-' }}</td>
                            <td>{{ $row->page_source ?? '-' }}</td>
                            <td>{{ $row->created_at->format('d M Y') }}</td>
                            <td>
                                <button 
                                    type="button" 
                                    class="border-0 bg-transparent btn-view"
                                    data-id="{{ $row->id }}"
                                    data-full_name="{{ $row->full_name }}"
                                    data-email="{{ $row->email }}"
                                    data-phone="{{ $row->phone_number }}"
                                    data-country="{{ $row->country }}"
                                    data-brand="{{ $row->brand }}"
                                    data-investment="{{ $row->investment_range }}"
                                    data-message="{{ $row->message }}"
                                    data-service="{{ $row->page_source }}"
                                    data-date="{{ $row->created_at->format('d M Y h:i A') }}"
                                    data-bs-toggle="modal" 
                                    data-bs-target="#specificServiceModal"
                                >
                                    <img src="{{ asset('/assets/admin/image/eye.png') }}" alt="view" width="20">
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11" class="text-center text-muted">No inquiries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="specificServiceModal" tabindex="-1" aria-labelledby="specificServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex gap-3 align-items-center">
                        <label class="mb-0 text-muted">Inquiry ID:</label>
                        <span class="fw-medium" id="modalInquiryId">#</span>
                        <span class="text-muted" id="modalInquiryDate"></span>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="row g-4">
                    <div class="col-md-4">
                        <label>Full Name:</label>
                        <p class="fw-medium mb-0" id="modalFullName">-</p>
                    </div>
                    <div class="col-md-4">
                        <label>Email:</label>
                        <p class="fw-medium mb-0" id="modalEmail">-</p>
                    </div>
                    <div class="col-md-4">
                        <label>Phone:</label>
                        <p class="fw-medium mb-0" id="modalPhone">-</p>
                    </div>
                    <div class="col-md-4">
                        <label>Country:</label>
                        <p class="fw-medium mb-0" id="modalCountry">-</p>
                    </div>
                    <div class="col-md-4">
                        <label>Brand:</label>
                        <p class="fw-medium mb-0" id="modalBrand">-</p>
                    </div>
                    <div class="col-md-4">
                        <label>Investment Range:</label>
                        <p class="fw-medium mb-0" id="modalInvestment">-</p>
                    </div>
                    <div class="col-12">
                        <label>Service Title:</label>
                        <p class="fw-medium mb-0" id="modalService">-</p>
                    </div>
                    <div class="col-12">
                        <label>Message:</label>
                        <p class="fw-medium mb-0" id="modalMessage">-</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script>
$(document).ready(function () {
    $(document).on('click', '.btn-view', function () {
        const btn = $(this);

        // Fill modal data
        $('#modalInquiryId').text('#' + (btn.data('id') ?? ''));
        $('#modalInquiryDate').text(btn.data('date') ?? '');
        $('#modalFullName').text(btn.data('full_name') ?? '-');
        $('#modalEmail').text(btn.data('email') ?? '-');
        $('#modalPhone').text(btn.data('phone') ?? '-');
        $('#modalCountry').text(btn.data('country') ?? '-');
        $('#modalBrand').text(btn.data('brand') ?? '-');
        $('#modalInvestment').text(btn.data('investment') ?? '-');
        $('#modalService').text(btn.data('service') ?? '-');
        $('#modalMessage').text(btn.data('message') ?? '-');
    });
});
</script>
@endsection
