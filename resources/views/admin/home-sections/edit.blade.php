@extends('admin.layouts.app')

@section('title', 'Edit Section')
@section('page_title', 'Edit Section')

@section('content')
<div class="bg-white rounded-xl shadow p-6 max-w-2xl">
    <form action="{{ route('admin.home-sections.update', $section) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Name</label><input type="text" name="name" value="{{ old('name', $section->name) }}" required class="w-full rounded-lg border border-gray-300 px-3 py-2"></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Title</label><input type="text" name="title" value="{{ old('title', $section->title) }}" class="w-full rounded-lg border border-gray-300 px-3 py-2"></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Subtitle</label><textarea name="subtitle" rows="2" class="w-full rounded-lg border border-gray-300 px-3 py-2">{{ old('subtitle', $section->subtitle) }}</textarea></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Content</label><textarea name="content" rows="6" class="w-full rounded-lg border border-gray-300 px-3 py-2">{{ old('content', $section->content) }}</textarea></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Image</label>@if($section->image)<p class="text-sm mb-1">Current: <img src="{{ asset('storage/' . $section->image) }}" class="h-12 inline"></p>@endif<input type="file" name="image" accept="image/*" class="w-full text-sm"></div>
        <div><label class="flex items-center"><input type="checkbox" name="is_active" value="1" {{ old('is_active', $section->is_active) ? 'checked' : '' }} class="rounded"> <span class="ml-2">Active</span></label></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Sort order</label><input type="number" name="sort_order" value="{{ old('sort_order', $section->sort_order) }}" class="w-full rounded-lg border border-gray-300 px-3 py-2"></div>
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg">Update</button>
    </form>
</div>
@endsection
