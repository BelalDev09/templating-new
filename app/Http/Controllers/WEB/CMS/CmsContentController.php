<?php

namespace App\Http\Controllers\WEB\CMS;

use App\Models\CmsContent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CmsContentController extends Controller
{
    // CMS Dashboard
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = CmsContent::orderBy('order')->get();

            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn(
                    'status',
                    fn($row) =>
                    $row->status
                        ? '<span class="badge bg-success">Active</span>'
                        : '<span class="badge bg-danger">Inactive</span>'
                )
                ->addColumn(
                    'action',
                    fn($row) =>
                    '<a href="' . route('cms.edit', $row->id) . '" class="btn btn-sm btn-primary">Edit</a>'
                )
                ->rawColumns(['status', 'action'])
                ->make(true);
        }

        return view('backend.cms.index');
    }

    // LANDING PAGE
    public function landing()
    {
        return view('backend.pages.section.index', [
            'hero'          => $this->section('hero'),
            'howItWorks'    => $this->sectionList('how_it_works'),
            'experience'    => $this->section('experience'),
            'marketTools'   => $this->sectionList('market_tools'),
            'testimonials'  => $this->sectionList('testimonials'),
            'whoFor'        => $this->sectionList('who_for'),
            'footer'        => $this->section('footer'),
        ]);
    }

    // SINGLE ITEM
    private function section($section)
    {
        return CmsContent::where([
            'page_slug' => 'landing-page',
            'section'   => $section,
            'status'    => 1
        ])->first();
    }

    // MULTIPLE ITEMS
    private function sectionList($section)
    {
        return CmsContent::where([
            'page_slug' => 'landing-page',
            'section'   => $section,
            'status'    => 1
        ])->orderBy('order')->get();
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'page_slug'   => 'required',
            'section'     => 'required',
            'title'       => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'order'       => 'nullable|integer',
            'status'      => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('cms', 'public');
        }

        CmsContent::create($data);

        return redirect()->route('backend.cms.index')->with('success', 'CMS content created');
    }

    public function update(Request $request, CmsContent $cms)
    {
        $data = $request->validate([
            'page_slug'   => 'required',
            'section'     => 'required',
            'title'       => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'order'       => 'nullable|integer',
            'status'      => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($cms->image_path) {
                Storage::disk('public')->delete($cms->image_path);
            }
            $data['image_path'] = $request->file('image')->store('cms', 'public');
        }

        $cms->update($data);

        return redirect()->route('backend.cms.index')->with('success', 'CMS content updated');
    }
}
