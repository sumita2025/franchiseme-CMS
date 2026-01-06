@extends('layouts.master')

@section('content')
<div class="">
    {{-- Page Title --}}
    <div class="mb-4">
        <h3 class="fw-bold text-dark">
            <i class="bi bi-chat-square-text me-2 text-primary"></i>Consultation Inquiries
        </h3>
        <p class="text-muted mb-0">View and manage consultation inquiries from users</p>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-striped table-borderless table-centered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($inquiries as $index => $row)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $row->name ?? '-' }}</td>
                            <td>{{ $row->email ?? '-' }}</td>
                            <td>{{ $row->phone ?? '-' }}</td>
                            <td>{{ Str::limit($row->message, 40) ?? '-' }}</td>
                            <td>{{ $row->created_at->format('d M Y') }}</td>
                            <td>
                                <div class="d-flex gap-3 align-items-center actions_btn">
                                    <button 
                                        type="button" 
                                        class="border-0 bg-transparent btn-view"
                                        data-id="{{ $row->id }}"
                                        data-name="{{ $row->name }}"
                                        data-email="{{ $row->email }}"
                                        data-phone="{{ $row->phone }}"
                                        data-message="{{ $row->message }}"
                                        data-subject= "{{ $row->subject }}"
                                        data-date="{{ $row->created_at->format('d M Y h:i A') }}"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#contactInquiryDetails"
                                    >
                                        <img src="{{ asset('/assets/admin/image/eye.png') }}" alt="view" width="20">
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted">No inquiries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Dynamic Modal -->
<div class="modal fade" id="contactInquiryDetails" tabindex="-1" aria-labelledby="contactInquiryDetailsTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="d-flex justify-content-between align-items-center mb-3 border-bottom pb-2">
                    <div class="d-flex gap-3 align-items-center">
                        <label class="mb-0 text-muted">Inquiry ID:</label>
                        <span class="fw-semibold" id="modalInquiryId">#</span>
                        <span class="text-muted small" id="modalInquiryDate"></span>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="row g-4">
                    <div class="col-md-4">
                        <label class="text-muted">Name:</label>
                        <p class="fw-medium mb-0" id="modalName">-</p>
                    </div>
                    <div class="col-md-4">
                        <label class="text-muted">Email:</label>
                        <p class="fw-medium mb-0" id="modalEmail">-</p>
                    </div>
                    <div class="col-md-4">
                        <label class="text-muted">Phone:</label>
                        <p class="fw-medium mb-0" id="modalPhone">-</p>
                    </div>
                    <div class="col-md-12">
                        <label class="text-muted">Subject:</label>
                        <p class="fw-medium mb-0" id="modalSubject">-</p>
                    </div>
                    <div class="col-md-12">
                        <label class="text-muted">Message:</label>
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
document.addEventListener("DOMContentLoaded", function () {
    $(document).on('click', '.btn-view', function () {
        let button = $(this);

        // Fill modal with data from button attributes
        $('#modalInquiryId').text('#' + (button.data('id') ?? ''));
        $('#modalName').text(button.data('name') ?? '-');
        $('#modalEmail').text(button.data('email') ?? '-');
        $('#modalPhone').text(button.data('phone') ?? '-');
        $('#modalSubject').text(button.data('subject') ?? '-');
        $('#modalMessage').text(button.data('message') ?? '-');
        $('#modalInquiryDate').text(button.data('date') ?? '');
    });
});
</script>
@endsection