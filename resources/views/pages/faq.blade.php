 @extends('layouts.master')

@section('content')
<div>
    <!-- <h2 class="mb-4">FAQ Page Editor</h2> -->
    <form id="faqPageForm" enctype="multipart/form-data">
        @csrf

        {{-- Page Background --}}
        <div class="card mb-4">
            <div class="card-body">
                <div class="card-header bg-primary text-white">Page Image</div>
                <div class="row g-4">
                     <div class="col-12">
                        <label>Image <span class="text-danger"></span></label>
                    
                        <input type="file" name="background_image" class="form-control preview-input" data-preview="#background_image_preview">
                        @if(!empty($page->background_image))
                            <img id="background_image_preview" src="{{ asset('storage/'.$page->background_image) }}" class="img-thumbnail mt-2" style="max-width: 200px;">
                        @else
                            <img id="background_image_preview" class="img-thumbnail mt-2 d-none" style="max-width: 200px;">
                        @endif
                    
                    </div>

                </div>                
            </div>
        </div>
        {{-- Page Title --}}
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">Page Title</div>
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-md-6">
                        <h6 class="text-primary">English Title</h6>
                        <label>Title (English)</label>
                        <input type="text" name="title" class="form-control" value="{{ $page->title ?? '' }}">
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-success">Arabic Content</h6>
                        <label>Title (Arabic)</label>
                        <input type="text" name="title_ar" class="form-control" value="{{ $page->title_ar ?? '' }}">
                    </div>
                </div>                
            </div>
        </div>

        {{-- Page Description --}}
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">Page Description</div>
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-md-6">
                        <h6 class="text-primary">English Content</h6>
                        <label>Description (English)</label>
                        <textarea name="description" class="summernote">{{ $page->description ?? '' }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-success">Arabic Content</h6>
                        <label>Description (Arabic)</label>
                        <textarea name="description_ar" class="summernote">{{ $page->description_ar ?? '' }}</textarea>
                    </div>
                </div>                
            </div>
        </div>

        {{-- FAQ List --}}
        <div class="card mb-4">
            <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                <span>FAQ List</span>
                <button type="button" id="addFaqBtn" class="btn btn-primary btn-sm">
                    Add FAQ
                </button>
            </div>
            <div class="card-body d-flex flex-column gap-3" id="faqList">
                @if(!empty($page->items) && count($page->items))
                    @foreach($page->items as $item)
                    <div class="faq-item border p-3 rounded position-relative">
                        <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 mt-1 me-1 removeFaqBtn delete_btn">
                            <img src="{{asset('/assets/admin/image/delete-w.png')}}" alt="" width="20px">
                        </button>
                        <div class="row g-4">
                            <div class="col-md-6">
                                {{-- English Fields --}}
                                <div class="mb-3">
                                    <label>Question (English)</label>
                                    <input type="text" name="faq_question[]" class="form-control" value="{{ $item->question }}">
                                </div>
                                <div>
                                    <label>Answer (English)</label>
                                    <textarea name="faq_answer[]" class="summernote">{{ $item->answer }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                {{-- Arabic Fields --}}
                                <div class="mb-3">
                                    <label>Question (Arabic)</label>
                                    <input type="text" name="faq_question_ar[]" class="form-control" value="{{ $item->question_ar ?? '' }}">
                                </div>
                                <div>
                                    <label>Answer (Arabic)</label>
                                    <textarea name="faq_answer_ar[]" class="summernote">{{ $item->answer_ar ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    {{-- Default Empty FAQ Item --}}
                    <div class="faq-item border p-3 rounded position-relative">
                        <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 mt-1 me-1 removeFaqBtn delete_btn">
                            <img src="{{asset('/assets/admin/image/delete-w.png')}}" alt="" width="20px">
                        </button>
                        <div class="row g-4">
                            <div class="col-md-6">
                                {{-- English Fields --}}
                                <div class="mb-3">
                                    <label>Question (English)</label>
                                    <input type="text" name="faq_question[]" class="form-control" placeholder="Enter question in English">
                                </div>
                                <div>
                                    <label>Answer (English)</label>
                                    <textarea name="faq_answer[]" class="summernote"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                {{-- Arabic Fields --}}
                                <div class="mb-3">
                                    <label>Question (Arabic)</label>
                                    <input type="text" name="faq_question_ar[]" class="form-control" placeholder="Enter question in Arabic">
                                </div>
                                <div>
                                    <label>Answer (Arabic)</label>
                                    <textarea name="faq_answer_ar[]" class="summernote"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-success py-2">Save All Changes</button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
<script>
$(document).ready(function() {
    // Initialize Summernote
    $('.summernote').summernote({
        height: 100,
        toolbar: [
            ['style', ['bold', 'italic', 'underline']],
            ['font', ['fontname', 'fontsize']],
            ['color', ['forecolor']],
            ['para', ['paragraph']],
            ['view', ['fullscreen', 'codeview']]
        ]
    });

    // Add new FAQ item
    $('#addFaqBtn').click(function() {
        let faqHtml = `
        <div class="faq-item border p-3 rounded position-relative">
            <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 mt-1 me-1 removeFaqBtn delete_btn">
                <img src="{{asset('/assets/admin/image/delete-w.png')}}" alt="" width="20px">
            </button>
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Question (English)</label>
                            <input type="text" name="faq_question[]" class="form-control" placeholder="Enter question in English">
                        </div>
                        <div>
                            <label>Answer (English)</label>
                            <textarea name="faq_answer[]" class="summernote"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Question (Arabic)</label>
                            <input type="text" name="faq_question_ar[]" class="form-control" placeholder="Enter question in Arabic">
                        </div>
                        <div>
                            <label>Answer (Arabic)</label>
                            <textarea name="faq_answer_ar[]" class="summernote"></textarea>
                        </div>
                    </div>
                </div>
        </div>`;

        $('#faqList').append(faqHtml);
        $('#faqList .summernote').summernote({
            height: 120,
            toolbar: [
                ['style', ['bold', 'italic', 'underline']],
                ['font', ['fontname', 'fontsize']],
                ['color', ['forecolor']],
                ['para', ['paragraph']],
                ['view', ['fullscreen', 'codeview']]
            ]
        });
    });

    // Remove FAQ item
    $(document).on('click', '.removeFaqBtn', function() {
        $(this).closest('.faq-item').remove();
    });

    // Save form
    $('#faqPageForm').on('submit', function(e) {
        e.preventDefault();

        // Update all summernote fields before submission
        $('.summernote').each(function() {
            $(this).val($(this).summernote('code'));
        });

        let formData = new FormData(this);

        $.ajax({
            url: "{{ route('admin.faq.save') }}",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(res) {
                alert(res.message);
            },
            error: function() {
                alert('Error updating FAQ page.');
            }
        });
    });
});
</script>
@endsection