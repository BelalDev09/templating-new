@extends('backend.app')
@section('title', 'Cmscontent')

@section('content')
    {{-- <table class="table table-bordered" id="cmsTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Page</th>
                <th>Section</th>
                <th>Type</th>
                <th>Title</th>
                <th>Order</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
    </table> --}}
    <form action="{{ isset($cms) ? route('cms.update', $cms->id) : route('cms.store') }}" method="POST"
        enctype="multipart/form-data" class="card shadow-sm">

        @csrf
        @isset($cms)
            @method('PUT')
        @endisset

        <div class="card-header">
            <h5 class="mb-0">
                {{ isset($cms) ? 'Edit CMS Content' : 'Create CMS Content' }}
            </h5>
        </div>

        <div class="card-body row g-3">

            {{-- Page Slug --}}
            <div class="col-md-6">
                <label class="form-label">Page</label>
                <input type="text" name="page_slug" value="{{ old('page_slug', $cms->page_slug ?? 'landing-page') }}"
                    class="form-control" required>
            </div>

            {{-- Section --}}
            <div class="col-md-6">
                <label class="form-label">Section</label>
                <input type="text" name="section" value="{{ old('section', $cms->section ?? '') }}" class="form-control"
                    required>
            </div>

            {{-- Title --}}
            <div class="col-md-12">
                <label class="form-label">Title</label>
                <input type="text" name="title" value="{{ old('title', $cms->title ?? '') }}" class="form-control"
                    placeholder="Enter title">
            </div>

            {{-- Description --}}
            <div class="col-md-12">
                <label class="form-label">Description</label>
                <textarea name="description" rows="4" class="form-control" placeholder="Enter description">{{ old('description', $cms->description ?? '') }}</textarea>
            </div>

            {{-- Image --}}
            <div class="col-md-6">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
            </div>

            {{-- Image Preview --}}
            @if (isset($cms) && $cms->image_path)
                <div class="col-md-6">
                    <label class="form-label d-block">Current Image</label>
                    <img src="{{ asset('storage/' . $cms->image_path) }}" class="img-thumbnail" style="max-height:120px">
                </div>
            @endif

            {{-- Status --}}
            <div class="col-md-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="1" {{ old('status', $cms->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ old('status', $cms->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            {{-- Order --}}
            <div class="col-md-3">
                <label class="form-label">Order</label>
                <input type="number" name="order" value="{{ old('order', $cms->order ?? 0) }}" class="form-control">
            </div>

        </div>

        <div class="card-footer text-end">
            <button class="btn btn-primary">
                {{ isset($cms) ? 'Update' : 'Save' }}
            </button>
        </div>
    </form>



@endsection
@push('scripts')
    <script>
        $(function() {
            $('#cmsTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('backend.cms.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'page_slug',
                        name: 'page_slug'
                    },
                    {
                        data: 'section',
                        name: 'section'
                    },
                    {
                        data: 'type',
                        name: 'type'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'order',
                        name: 'order'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        });
    </script>
@endpush
