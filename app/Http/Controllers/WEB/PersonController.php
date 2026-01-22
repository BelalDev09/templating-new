<?php

namespace App\Http\Controllers\WEB;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PersonController extends Controller
{
    public function edit()
    {
        return view('profile.edit', [
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // Validation
        $request->validate([
            'first_name'   => 'required|string|max:100',
            'last_name'    => 'required|string|max:100',
            'email'        => 'required|email|unique:users,email,' . $user->id,
            'phone'        => 'nullable|string|max:20',
            'city'         => 'nullable|string|max:100',
            'country'      => 'nullable|string|max:100',
            'zip_code'     => 'nullable|string|max:20',
            'designation'  => 'nullable|string|max:150',
            'website'      => 'nullable|url',
            'joining_date' => 'nullable|date',
            'description'  => 'nullable|string',
            'skills'       => 'nullable|string',
            'avatar'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'cover_image'  => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        // Basic fields
        $user->first_name  = $request->first_name;
        $user->last_name   = $request->last_name;
        $user->name        = $request->first_name . ' ' . $request->last_name;
        $user->email       = $request->email;
        $user->phone       = $request->phone;
        $user->city        = $request->city;
        $user->country     = $request->country;
        $user->zip_code    = $request->zip_code;
        $user->designation = $request->designation;
        $user->website     = $request->website;
        $user->joining_date = $request->joining_date;
        $user->description = $request->description;

        // Skills (textarea → JSON)
        if ($request->skills) {
            $skillsArray = array_filter(array_map('trim', explode("\n", $request->skills)));
            $user->skills = json_encode($skillsArray);
        }

        // Avatar Upload
        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            $user->avatar = $request->file('avatar')->store('avatars', 'public');
        }

        // Cover Image Upload
        if ($request->hasFile('cover_image')) {
            if ($user->cover_image) {
                Storage::disk('public')->delete($user->cover_image);
            }
            $user->cover_image = $request->file('cover_image')->store('covers', 'public');
        }

        $user->save();

        return redirect()
            ->route('profile.edit')
            ->with('success', 'Profile updated successfully!');
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors([
                'current_password' => 'Current password is incorrect'
            ]);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success', 'Password updated successfully!');
    }
}
