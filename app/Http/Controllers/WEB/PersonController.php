<?php

namespace App\Http\Controllers\WEB;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PersonController extends Controller
{
    /**
     * Show profile dashboard
     */
    public function index()
    {
        return view('profile.index');
    }

    /**
     * Show edit profile form
     */
    public function edit(Request $request)
    {
        return view('profile.edit', [
            'user' => $request->user()
        ]);
    }

    /**
     * Update user profile
     */
    public function update(Request $request)
    {
        $user = $request->user();

        // Validate input
        $validated = $request->validate([
            'first_name'   => 'required|string|max:100',
            'last_name'    => 'required|string|max:100',
            'email'        => 'required|email|unique:users,email,' . $user->id,
            'phone'        => 'nullable|string|max:20',
            'city'         => 'nullable|string|max:100',
            'country'      => 'nullable|string|max:100',
            'zip_code'     => 'nullable|string|max:20',
            'designation'  => 'nullable|string|max:150',
            'website'      => 'nullable|url',
            'description'  => 'nullable|string',
            'skills'       => 'nullable|string',
            'avatar'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'cover_image'  => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        // Update basic fields
        $user->fill([
            'first_name'   => $validated['first_name'],
            'last_name'    => $validated['last_name'],
            'email'        => $validated['email'],
            'phone'        => $validated['phone'] ?? null,
            'city'         => $validated['city'] ?? null,
            'country'      => $validated['country'] ?? null,
            'zip_code'     => $validated['zip_code'] ?? null,
            'designation'  => $validated['designation'] ?? null,
            'website'      => $validated['website'] ?? null,
            'description'  => $validated['description'] ?? null,
        ]);
        $user->name = $validated['first_name'] . ' ' . $validated['last_name'];

        // Update skills as JSON array
        if (isset($validated['skills']) && !empty($validated['skills'])) {
            $skills = array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $validated['skills'])));
            $user->skills = json_encode($skills);
        } else {
            $user->skills = null;
        }

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }
            $user->avatar = $request->file('avatar')->store('avatars', 'public');
        }

        // Handle cover image upload
        if ($request->hasFile('cover_image')) {
            if ($user->cover_image && Storage::disk('public')->exists($user->cover_image)) {
                Storage::disk('public')->delete($user->cover_image);
            }
            $user->cover_image = $request->file('cover_image')->store('covers', 'public');
        }

        $user->save();

        // Respond with JSON if AJAX request (for live preview)
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Profile updated successfully!',
                'avatar_url' => $user->avatar ? asset('storage/' . $user->avatar) : null,
                'cover_url' => $user->cover_image ? asset('storage/' . $user->cover_image) : null,
            ]);
        }

        return redirect()->route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Update user password
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = $request->user();

        // Check if current password matches
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors([
                'current_password' => 'Current password is incorrect.',
            ]);
        }

        // Update password
        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('status', 'password-updated');
    }
}
