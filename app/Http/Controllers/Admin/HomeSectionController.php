<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeSectionController extends Controller
{
    public function index()
    {
        $sections = HomeSection::orderBy('sort_order')->get();
        return view('admin.home-sections.index', compact('sections'));
    }

    public function create()
    {
        return view('admin.home-sections.create');
    }

    public function store(Request $request)
    {
        $v = $request->validate([
            'name' => 'required|string|max:100|unique:home_sections,name',
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string',
            'content' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ]);
        $v['is_active'] = $request->boolean('is_active');
        $v['sort_order'] = (int) ($v['sort_order'] ?? 0);
        if ($request->hasFile('image')) {
            $v['image'] = $request->file('image')->store('home-sections', 'public');
        }
        HomeSection::create($v);
        return redirect()->route('admin.home-sections.index')->with('success', 'Section created.');
    }

    public function edit(HomeSection $homeSection)
    {
        return view('admin.home-sections.edit', ['section' => $homeSection]);
    }

    public function update(Request $request, HomeSection $homeSection)
    {
        $v = $request->validate([
            'name' => 'required|string|max:100|unique:home_sections,name,' . $homeSection->id,
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string',
            'content' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ]);
        $v['is_active'] = $request->boolean('is_active');
        if ($request->hasFile('image')) {
            if ($homeSection->image) {
                Storage::disk('public')->delete($homeSection->image);
            }
            $v['image'] = $request->file('image')->store('home-sections', 'public');
        }
        $homeSection->update($v);
        return redirect()->route('admin.home-sections.index')->with('success', 'Section updated.');
    }
}
