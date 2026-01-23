@extends('backend.app')
@section('title', 'Hero Section CMS')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('cms.hero.store') }}" method="POST" enctype="multipart/form-data" class="card shadow-sm">

        @csrf

        <div class="card-header">
            <h5 class="mb-0">Hero Section</h5>
        </div>

        <div class="card-body row g-3">
            {{-- Content --}}
            <div class="col-md-12">
                <label class="form-label">Content</label>
                <textarea name="content" rows="4" class="form-control">{{ old('content', $cms->content ?? '') }}</textarea>
            </div>
            {{-- Title --}}
            <div class="col-md-12">
                <label class="form-label">Title</label>
                <input type="text" name="title" value="{{ old('title', $cms->title ?? '') }}" class="form-control"
                    required>
            </div>

            {{-- Description --}}
            <div class="col-md-12">
                <label class="form-label">Description</label>
                <textarea name="description" rows="4" class="form-control">{{ old('description', $cms->description ?? '') }}</textarea>
            </div>

            {{-- Image --}}
            <div class="col-md-6">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
            </div>

            {{-- Preview --}}
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
            {{-- button text --}}
            <div class="col-md-12">
                <label class="form-label">Button Text</label>
                <input type="text" name="btn_text" value="{{ old('btn_text', $cms->btn_text ?? '') }}"
                    class="form-control">
            </div>

        </div>

        <div class="card-footer text-end">
            <button class="btn btn-primary">Save Hero</button>
        </div>
    </form>

@endsection
