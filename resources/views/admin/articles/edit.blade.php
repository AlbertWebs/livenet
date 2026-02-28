@extends('admin.layouts.app')

@section('title', 'Edit Article')
@section('page_title', 'Edit Article')

@section('content')
<div class="bg-white rounded-xl shadow p-6 max-w-2xl">
    <form action="{{ route('admin.articles.update', $article) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Title *</label><input type="text" name="title" value="{{ old('title', $article->title) }}" required class="w-full rounded-lg border border-gray-300 px-3 py-2"></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Slug *</label><input type="text" name="slug" value="{{ old('slug', $article->slug) }}" required class="w-full rounded-lg border border-gray-300 px-3 py-2"></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Excerpt</label><textarea name="excerpt" rows="2" class="w-full rounded-lg border border-gray-300 px-3 py-2">{{ old('excerpt', $article->excerpt) }}</textarea></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Content</label><textarea name="content" rows="8" class="w-full rounded-lg border border-gray-300 px-3 py-2">{{ old('content', $article->content) }}</textarea></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Featured image</label>@if($article->featured_image)<p class="text-sm mb-1">Current: <img src="{{ asset('storage/' . $article->featured_image) }}" class="h-16 inline"></p>@endif<input type="file" name="featured_image" accept="image/*" class="w-full text-sm"></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Category</label><input type="text" name="category" value="{{ old('category', $article->category) }}" class="w-full rounded-lg border border-gray-300 px-3 py-2"></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Status</label><select name="status" class="w-full rounded-lg border border-gray-300 px-3 py-2"><option value="published" {{ $article->status === 'published' ? 'selected' : '' }}>Published</option><option value="draft" {{ $article->status === 'draft' ? 'selected' : '' }}>Draft</option></select></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Published at</label><input type="datetime-local" name="published_at" value="{{ old('published_at', $article->published_at?->format('Y-m-d\TH:i')) }}" class="w-full rounded-lg border border-gray-300 px-3 py-2"></div>
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg">Update Article</button>
    </form>
</div>
@endsection
