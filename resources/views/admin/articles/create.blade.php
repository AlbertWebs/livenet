@extends('admin.layouts.app')

@section('title', 'New Article')
@section('page_title', 'New Article')

@section('content')
<div class="bg-white rounded-xl shadow p-6 max-w-2xl">
    <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Title *</label><input type="text" name="title" value="{{ old('title') }}" required class="w-full rounded-lg border px-3 py-2"></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Slug</label><input type="text" name="slug" value="{{ old('slug') }}" class="w-full rounded-lg border px-3 py-2"></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Excerpt</label><textarea name="excerpt" rows="2" class="w-full rounded-lg border px-3 py-2">{{ old('excerpt') }}</textarea></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Content</label><textarea name="content" rows="6" class="w-full rounded-lg border px-3 py-2">{{ old('content') }}</textarea></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Featured image</label><input type="file" name="featured_image" accept="image/*" class="w-full text-sm"></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Category</label><input type="text" name="category" value="{{ old('category') }}" class="w-full rounded-lg border px-3 py-2"></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Status</label><select name="status" class="w-full rounded-lg border px-3 py-2"><option value="published">Published</option><option value="draft">Draft</option></select></div>
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg">Create</button>
    </form>
</div>
@endsection
