<?php

namespace App\Http\Controllers\WEB\CMS;

use App\Models\CmsContent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class HeroSectionController extends Controller
{
    // FORM OPEN
    public function form()
    {
        $cms = CmsContent::where([
            'page_slug' => 'landing-page',
            'section'   => 'hero',
        ])->first();

        return view('backend.cms.hero', compact('cms'));
    }

    // SAVE / UPDATE
    public function store(Request $request)
    {
        $data = $request->validate([
            'content' => 'nullable',
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'status'      => 'required|boolean',
            'btn_text' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            if (isset($data['image_path'])) {
                Storage::disk('public')->delete($data['image_path']);
            }
            $data['image_path'] = $request->file('image')->store('cms', 'public');
        }

        $data['page_slug'] = 'landing-page';
        $data['section']   = 'hero';

        CmsContent::updateOrCreate(
            ['page_slug' => 'landing-page', 'section' => 'hero'],
            $data
        );

        return back()->with('success', 'Hero section updated successfully');
    }
}
