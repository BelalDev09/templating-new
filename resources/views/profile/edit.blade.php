@extends('backend.app')

@section('title', 'Edit Profile')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            {{-- Success Message --}}
            @if (session('status') == 'profile-updated')
                <div id="successMsg" class="alert alert-success">Profile updated successfully.</div>
            @else
                <div id="successMsg" class="alert alert-success d-none"></div>
            @endif

            {{-- Error Message --}}
            <div id="errorMsg" class="alert alert-danger d-none"></div>

            {{-- PROFILE UPDATE FORM --}}
            <form id="profileForm" enctype="multipart/form-data" method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PATCH')

                {{-- ================= COVER & AVATAR ================= --}}
                <div class="position-relative mb-4">
                    {{-- Cover --}}
                    @if ($user->cover_image)
                        <img id="coverPreview" src="{{ asset('storage/' . $user->cover_image) }}" class="w-100 rounded"
                            style="height:250px;object-fit:cover">
                    @else
                        <div id="coverPreview" class="bg-primary rounded" style="height:250px;"></div>
                    @endif

                    <label class="btn btn-light position-absolute top-0 end-0 m-3">
                        Change Cover
                        <input id="coverInput" type="file" name="cover_image" accept="image/*" hidden>
                    </label>

                    {{-- Avatar --}}
                    <div class="position-absolute bottom-0 start-50 translate-middle-x">
                        <div class="rounded-circle bg-light border" style="width:120px;height:120px;overflow:hidden">
                            @if ($user->avatar)
                                <img id="avatarPreview" src="{{ asset('storage/' . $user->avatar) }}" class="w-100 h-100">
                            @else
                                <div id="avatarFallback" class="d-flex align-items-center justify-content-center h-100 fs-1"
                                    style="width:120px;height:120px;">
                                    {{ strtoupper(substr($user->first_name ?? $user->name, 0, 1)) }}
                                </div>
                            @endif
                        </div>
                        <label class="btn btn-primary btn-sm rounded-circle mt-n4 ms-5">
                            <i class="ri-camera-line"></i>
                            <input id="avatarInput" type="file" name="avatar" accept="image/*" hidden>
                        </label>
                    </div>
                </div>

                {{-- ================= FORM FIELDS ================= --}}
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="personal-tab" data-bs-toggle="tab"
                                    data-bs-target="#personal" type="button" role="tab" aria-controls="personal"
                                    aria-selected="true">Personal</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="password-tab" data-bs-toggle="tab" data-bs-target="#password"
                                    type="button" role="tab" aria-controls="password"
                                    aria-selected="false">Password</button>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <div class="tab-content">

                            {{-- PERSONAL TAB --}}
                            <div class="tab-pane fade show active" id="personal" role="tabpanel"
                                aria-labelledby="personal-tab">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <input name="first_name"
                                            class="form-control @error('first_name') is-invalid @enderror"
                                            placeholder="First Name" value="{{ old('first_name', $user->first_name) }}">
                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input name="last_name"
                                            class="form-control @error('last_name') is-invalid @enderror"
                                            placeholder="Last Name" value="{{ old('last_name', $user->last_name) }}">
                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input name="phone" class="form-control @error('phone') is-invalid @enderror"
                                            placeholder="Phone" value="{{ old('phone', $user->phone) }}">
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input name="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                                            value="{{ old('email', $user->email) }}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <input name="city" class="form-control @error('city') is-invalid @enderror"
                                            placeholder="City" value="{{ old('city', $user->city) }}">
                                        @error('city')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <input name="country" class="form-control @error('country') is-invalid @enderror"
                                            placeholder="Country" value="{{ old('country', $user->country) }}">
                                        @error('country')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <input name="zip_code"
                                            class="form-control @error('zip_code') is-invalid @enderror"
                                            placeholder="Zip Code" value="{{ old('zip_code', $user->zip_code) }}">
                                        @error('zip_code')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input name="designation"
                                            class="form-control @error('designation') is-invalid @enderror"
                                            placeholder="Designation"
                                            value="{{ old('designation', $user->designation) }}">
                                        @error('designation')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input name="website" type="url"
                                            class="form-control @error('website') is-invalid @enderror"
                                            placeholder="Website" value="{{ old('website', $user->website) }}">
                                        @error('website')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <textarea name="skills" class="form-control @error('skills') is-invalid @enderror" rows="3"
                                            placeholder="Skills (one per line)">{{ old('skills', is_array($user->skills && @json_decode($user->skills, true) ? json_decode($user->skills, true) : []) ? implode("\n", json_decode($user->skills ?? '[]', true)) : '') }}</textarea>
                                        @error('skills')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4"
                                            placeholder="Description">{{ old('description', $user->description) }}</textarea>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary mt-3">Update Profile</button>
                            </div>

                            {{-- PASSWORD TAB --}}
                            <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                                {{-- Separate form for password --}}
                                <form method="POST" action="{{ route('profile.password') }}" id="changePasswordForm"
                                    autocomplete="off">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="password" name="current_password"
                                            class="form-control @error('current_password', 'passwordChange') is-invalid @enderror"
                                            placeholder="Current Password" autocomplete="current-password">
                                        @error('current_password', 'passwordChange')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" name="password"
                                            class="form-control @error('password', 'passwordChange') is-invalid @enderror"
                                            placeholder="New Password" autocomplete="new-password">
                                        @error('password', 'passwordChange')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" name="password_confirmation" class="form-control"
                                            placeholder="Confirm Password" autocomplete="new-password">
                                    </div>
                                    <button class="btn btn-warning" type="submit">Change Password</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>

    {{-- ================= JS ================= --}}
    <script>
        // Preview logic for images
        function previewFile(input, previewId, fallbackId = null) {
            const file = input.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById(previewId);
                if (preview && preview.tagName === 'IMG') preview.src = e.target.result;
                else if (preview) {
                    preview.style.backgroundImage = `url(${e.target.result})`;
                    preview.style.backgroundSize = 'cover';
                    preview.style.backgroundPosition = 'center';
                }
                if (fallbackId) {
                    const fallback = document.getElementById(fallbackId);
                    if (fallback) fallback.style.display = 'none';
                }
            };
            reader.readAsDataURL(file);
        }

        document.addEventListener('DOMContentLoaded', function() {
            let avatarInput = document.getElementById('avatarInput');
            if (avatarInput) {
                avatarInput.addEventListener('change', function() {
                    previewFile(this, 'avatarPreview', 'avatarFallback');
                });
            }
            let coverInput = document.getElementById('coverInput');
            if (coverInput) {
                coverInput.addEventListener('change', function() {
                    previewFile(this, 'coverPreview');
                });
            }

            // Handle profile form submit with AJAX
            const profileForm = document.getElementById('profileForm');
            if (profileForm) {
                profileForm.addEventListener('submit', function(e) {
                    e.preventDefault();

                    const successMsg = document.getElementById('successMsg');
                    const errorMsg = document.getElementById('errorMsg');
                    if (successMsg) {
                        successMsg.classList.add('d-none');
                        successMsg.style.display = 'none';
                    }
                    if (errorMsg) {
                        errorMsg.classList.add('d-none');
                        errorMsg.innerHTML = '';
                        errorMsg.style.display = 'none';
                    }

                    let formData = new FormData(profileForm);

                    // Find submit button
                    let btn = profileForm.querySelector('button[type="submit"]');
                    let originalBtnText;
                    if (btn) {
                        btn.disabled = true;
                        originalBtnText = btn.innerHTML;
                        btn.innerHTML = 'Saving...';
                    }

                    fetch(profileForm.action, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                                'X-Requested-With': 'XMLHttpRequest'
                            },
                            body: formData
                        })
                        .then(async response => {
                            let contentType = response.headers.get("Content-Type") || '';
                            if (response.ok && contentType.includes("application/json")) {
                                return response.json();
                            }
                            let text = await response.text();

                            // Check for common success marker
                            if (text.match(/profile[\s-_]?updated/i)) {
                                return {
                                    status: 'profile-updated'
                                };
                            }

                            // Laravel validation errors can be returned as JSON or as HTML
                            if (contentType.includes('text/html')) {
                                // Try to find invalid-feedback
                                let matches = text.match(
                                    /<span[^>]*class="[^"]*invalid-feedback[^"]*"(?:[^>]*)>(.*?)<\/span>/gs
                                );
                                if (matches && matches.length > 0) {
                                    // Strip out all html tags
                                    return {
                                        status: 'error',
                                        errors: matches.map(e => e.replace(/<[^>]*>?/gm, '')).join(
                                            '<br>')
                                    };
                                }
                            }
                            // Fallback: treat as raw text error
                            return {
                                status: null,
                                raw: text
                            };
                        })
                        .then(data => {
                            if (btn) {
                                btn.disabled = false;
                                btn.innerHTML = originalBtnText || 'Update Profile';
                            }

                            if (data && data.status === 'profile-updated') {
                                if (successMsg) {
                                    successMsg.innerText = 'Profile updated successfully.';
                                    successMsg.classList.remove('d-none');
                                    successMsg.style.display = 'block';
                                    successMsg.scrollIntoView();
                                }
                                // Optionally reload the page to reflect changes
                            } else if (data && data.status === 'error' && data.errors) {
                                if (errorMsg) {
                                    errorMsg.innerHTML = data.errors;
                                    errorMsg.classList.remove('d-none');
                                    errorMsg.style.display = 'block';
                                    errorMsg.scrollIntoView();
                                }
                            } else if (data && data.errors && typeof data.errors === 'object') {
                                let allErrors = Object.values(data.errors).flat().join('<br>');
                                if (errorMsg) {
                                    errorMsg.innerHTML = allErrors;
                                    errorMsg.classList.remove('d-none');
                                    errorMsg.style.display = 'block';
                                    errorMsg.scrollIntoView();
                                }
                            } else {
                                if (errorMsg) {
                                    errorMsg.innerHTML =
                                        'Profile update failed. Please check your inputs and try again.';
                                    errorMsg.classList.remove('d-none');
                                    errorMsg.style.display = 'block';
                                    errorMsg.scrollIntoView();
                                }
                            }
                        })
                        .catch(err => {
                            if (btn) {
                                btn.disabled = false;
                                btn.innerHTML = originalBtnText || 'Update Profile';
                            }
                            const errorMsg = document.getElementById('errorMsg');
                            if (errorMsg) {
                                errorMsg.innerHTML = 'Profile update failed. Please try again. ' + (err
                                    ?.message || '');
                                errorMsg.classList.remove('d-none');
                                errorMsg.style.display = 'block';
                                errorMsg.scrollIntoView();
                            }
                        });
                });
            }

            // Optionally, password change form can be handled with AJAX here...
        });
    </script>
@endsection
