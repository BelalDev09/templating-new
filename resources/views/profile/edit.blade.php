@extends('backend.app')

@section('title', 'Edit Profile')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- ================= PROFILE UPDATE FORM ================= --}}
            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                {{-- Cover --}}
                <div class="position-relative mb-4">
                    @if ($user->cover_image)
                        <img src="{{ asset('storage/' . $user->cover_image) }}" class="w-100 rounded"
                            style="height:250px;object-fit:cover">
                    @else
                        <div class="bg-primary rounded" style="height:250px"></div>
                    @endif

                    <label class="btn btn-light position-absolute top-0 end-0 m-3">
                        Change Cover
                        <input type="file" name="cover_image" hidden>
                    </label>

                    {{-- Avatar --}}
                    <div class="position-absolute bottom-0 start-50 translate-middle-x">
                        <div class="rounded-circle bg-light border" style="width:120px;height:120px;overflow:hidden">
                            @if ($user->avatar)
                                <img src="{{ asset('storage/' . $user->avatar) }}" class="w-100 h-100">
                            @else
                                <div class="d-flex align-items-center justify-content-center h-100 fs-1">
                                    {{ strtoupper(substr($user->first_name ?? $user->name, 0, 1)) }}
                                </div>
                            @endif
                        </div>
                        <label class="btn btn-primary btn-sm rounded-circle mt-n4 ms-5">
                            <i class="ri-camera-line"></i>
                            <input type="file" name="avatar" hidden>
                        </label>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#personal">Personal</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#password">Password</a>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <div class="tab-content">

                            {{-- PERSONAL --}}
                            <div class="tab-pane fade show active" id="personal">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <input name="first_name" class="form-control" placeholder="First Name"
                                            value="{{ $user->first_name }}">
                                    </div>
                                    <div class="col-md-6">
                                        <input name="last_name" class="form-control" placeholder="Last Name"
                                            value="{{ $user->last_name }}">
                                    </div>
                                    <div class="col-md-6">
                                        <input name="phone" class="form-control" placeholder="Phone"
                                            value="{{ $user->phone }}">
                                    </div>
                                    <div class="col-md-6">
                                        <input name="email" class="form-control" value="{{ $user->email }}">
                                    </div>
                                    <div class="col-md-4"><input name="city" class="form-control"
                                            value="{{ $user->city }}"></div>
                                    <div class="col-md-4"><input name="country" class="form-control"
                                            value="{{ $user->country }}"></div>
                                    <div class="col-md-4"><input name="zip_code" class="form-control"
                                            value="{{ $user->zip_code }}"></div>
                                    <div class="col-md-6"><input name="designation" class="form-control"
                                            value="{{ $user->designation }}"></div>
                                    <div class="col-md-6"><input name="website" class="form-control"
                                            value="{{ $user->website }}"></div>

                                    <div class="col-12">
                                        <textarea name="skills" class="form-control" rows="3">{{ implode("\n", json_decode($user->skills ?? '[]', true)) }}</textarea>
                                    </div>
                                    <div class="col-12">
                                        <textarea name="description" class="form-control" rows="4">{{ $user->description }}</textarea>
                                    </div>
                                </div>

                                <button class="btn btn-primary mt-3">Update Profile</button>
                            </div>

            </form>

            {{-- PASSWORD --}}
            <div class="tab-pane fade" id="password">
                <form method="POST" action="{{ route('profile.password') }}">
                    @csrf

                    <div class="mb-3">
                        <input type="password" name="current_password" class="form-control" placeholder="Current Password">
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" class="form-control" placeholder="New Password">
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="Confirm Password">
                    </div>

                    <button class="btn btn-warning">Change Password</button>
                </form>
            </div>

        </div>
    </div>
    </div>

    </div>
    </div>
@endsection
