@extends('admin.layouts.app')

@section('title', 'New Home Section')
@section('page_title', 'New Home Section')

@section('content')
<div class="bg-white rounded-xl shadow p-6 max-w-2xl">
    <form action="{{ route('admin.home-sections.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Name (unique key)</label><input type="text" name="name" value="{{ old('name') }}" required class="w-full rounded-lg border border-gray-300 px-3 py-2" placeholder="e.g. hero, features"></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Title</label><input type="text" name="title" value="{{ old('title') }}" class="w-full rounded-lg border border-gray-300 px-3 py-2"></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Subtitle</label><textarea name="subtitle" rows="2" class="w-full rounded-lg border border-gray-300 px-3 py-2">{{ old('subtitle') }}</textarea></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Content (HTML/JSON)</label><textarea name="content" rows="6" class="w-full rounded-lg border border-gray-300 px-3 py-2">{{ old('content') }}</textarea></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Image</label><input type="file" name="image" accept="image/*" class="w-full text-sm"></div>
        <div><label class="flex items-center"><input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="rounded"> <span class="ml-2">Active</span></label></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Sort order</label><input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" class="w-full rounded-lg border border-gray-300 px-3 py-2"></div>
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg">Create</button>
    </form>
</div>
@endsection
