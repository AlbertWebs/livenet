@extends('admin.layouts.app')

@section('title', 'Media Manager')
@section('page_title', 'Media Manager')

@section('content')
<div class="mb-4">
    <form action="{{ route('admin.media.store') }}" method="POST" enctype="multipart/form-data" class="flex items-center gap-2">
        @csrf
        <input type="file" name="files[]" multiple accept="image/*" class="text-sm">
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">Upload</button>
    </form>
</div>
<div class="bg-white rounded-xl shadow p-6">
    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
        @foreach($media as $m)
        <div class="border rounded-lg overflow-hidden">
            <img src="{{ $m->url }}" alt="{{ $m->name }}" class="w-full h-32 object-cover">
            <p class="p-2 text-xs text-gray-600 truncate" title="{{ $m->name }}">{{ $m->name }}</p>
            <p class="px-2 pb-2 text-xs text-gray-400">{{ $m->file_path }}</p>
            <form action="{{ route('admin.media.destroy', $m) }}" method="POST" class="p-2">@csrf @method('DELETE')<button type="submit" class="text-red-600 text-xs" onclick="return confirm('Delete?')">Delete</button></form>
        </div>
        @endforeach
    </div>
    <div class="mt-4">{{ $media->links() }}</div>
</div>
@endsection
