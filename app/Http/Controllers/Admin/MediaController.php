<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function index()
    {
        $media = Media::latest()->paginate(24);
        return view('admin.media.index', compact('media'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'files.*' => 'required|image|max:5120',
        ]);
        foreach ($request->file('files', []) as $file) {
            $path = $file->store('media', 'public');
            Media::create([
                'name' => $file->getClientOriginalName(),
                'file_path' => $path,
                'mime_type' => $file->getMimeType(),
                'size' => $file->getSize(),
            ]);
        }
        return redirect()->route('admin.media.index')->with('success', 'Files uploaded.');
    }

    public function destroy(Media $medium)
    {
        Storage::disk('public')->delete($medium->file_path);
        $medium->delete();
        return redirect()->route('admin.media.index')->with('success', 'File deleted.');
    }
}
