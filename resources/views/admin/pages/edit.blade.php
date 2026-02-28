@extends('admin.layouts.app')

@section('title', 'Edit Page')
@section('page_title', 'Edit Page')

@section('content')
<div class="bg-white rounded-xl shadow p-6 max-w-2xl">
    <form action="{{ route('admin.pages.update', $page) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Title *</label><input type="text" name="title" value="{{ old('title', $page->title) }}" required class="w-full rounded-lg border border-gray-300 px-3 py-2"></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Slug *</label><input type="text" name="slug" value="{{ old('slug', $page->slug) }}" required class="w-full rounded-lg border border-gray-300 px-3 py-2"></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Hero title</label><input type="text" name="hero_title" value="{{ old('hero_title', $page->hero_title) }}" class="w-full rounded-lg border border-gray-300 px-3 py-2"></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Hero subtitle</label><textarea name="hero_subtitle" rows="2" class="w-full rounded-lg border border-gray-300 px-3 py-2">{{ old('hero_subtitle', $page->hero_subtitle) }}</textarea></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Hero image</label>@if($page->hero_image)<p class="text-sm text-gray-500 mb-1">Current: <img src="{{ asset('storage/' . $page->hero_image) }}" alt="" class="h-12 inline"></p>@endif<input type="file" name="hero_image" accept="image/*" class="w-full text-sm"></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Content</label><textarea name="content" rows="8" class="w-full rounded-lg border border-gray-300 px-3 py-2">{{ old('content', $page->content) }}</textarea></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Meta title</label><input type="text" name="meta_title" value="{{ old('meta_title', $page->meta_title) }}" class="w-full rounded-lg border border-gray-300 px-3 py-2"></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Meta description</label><textarea name="meta_description" rows="2" class="w-full rounded-lg border border-gray-300 px-3 py-2">{{ old('meta_description', $page->meta_description) }}</textarea></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Status</label><select name="status" class="w-full rounded-lg border border-gray-300 px-3 py-2"><option value="published" {{ $page->status === 'published' ? 'selected' : '' }}>Published</option><option value="draft" {{ $page->status === 'draft' ? 'selected' : '' }}>Draft</option></select></div>
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg">Update Page</button>
    </form>
</div>
@endsection
