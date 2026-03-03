@extends('admin.layouts.app')

@section('title', 'Edit Article')
@section('page_title', 'Edit Article')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <div class="flex items-center justify-between gap-4">
        <a href="{{ route('admin.articles.index') }}" class="inline-flex items-center gap-2 text-sm font-medium text-gray-600 hover:text-gray-900">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Back to articles
        </a>
    </div>

    <form action="{{ route('admin.articles.update', $article) }}" method="POST" enctype="multipart/form-data" class="space-y-6" id="article-form">
        @csrf
        @method('PUT')

        {{-- Main content --}}
        <section class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/80">
                <h2 class="text-sm font-semibold text-gray-900 tracking-wide uppercase">Article</h2>
                <p class="text-xs text-gray-500 mt-0.5">Title, excerpt, and body content</p>
            </div>
            <div class="p-6 space-y-5">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1.5">Title <span class="text-red-500">*</span></label>
                    <input id="title" type="text" name="title" value="{{ old('title', $article->title) }}" required
                        class="w-full rounded-xl border border-gray-200 px-4 py-2.5 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition @error('title') border-red-300 @enderror"
                        placeholder="Article title">
                    @error('title')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="slug" class="block text-sm font-medium text-gray-700 mb-1.5">Slug <span class="text-red-500">*</span></label>
                    <input id="slug" type="text" name="slug" value="{{ old('slug', $article->slug) }}" required
                        class="w-full rounded-xl border border-gray-200 px-4 py-2.5 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition @error('slug') border-red-300 @enderror"
                        placeholder="url-friendly-slug">
                    @error('slug')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="excerpt" class="block text-sm font-medium text-gray-700 mb-1.5">Excerpt</label>
                    <textarea id="excerpt" name="excerpt" rows="2"
                        class="w-full rounded-xl border border-gray-200 px-4 py-2.5 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition @error('excerpt') border-red-300 @enderror"
                        placeholder="Short summary for listings">{{ old('excerpt', $article->excerpt) }}</textarea>
                    @error('excerpt')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-1.5">Content</label>
                    <textarea id="content" name="content" rows="12"
                        class="w-full rounded-xl border border-gray-200 px-4 py-2.5 text-gray-900 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition @error('content') border-red-300 @enderror"
                        placeholder="Article body (rich text)">{{ old('content', $article->content) }}</textarea>
                    @error('content')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
            </div>
        </section>

        {{-- Featured image & settings --}}
        <section class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/80">
                <h2 class="text-sm font-semibold text-gray-900 tracking-wide uppercase">Featured image & settings</h2>
                <p class="text-xs text-gray-500 mt-0.5">Image and publishing options</p>
            </div>
            <div class="p-6 space-y-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Featured image</label>
                    @if($article->featured_image)
                        <div class="flex flex-wrap items-start gap-4 mb-3">
                            <img src="{{ asset('storage/' . $article->featured_image) }}" alt="" class="h-24 w-auto object-contain rounded-xl border border-gray-200 bg-gray-50 p-1">
                            <div class="flex flex-col gap-2">
                                <span class="text-sm text-gray-500">Current image</span>
                                <label class="inline-flex items-center gap-2 cursor-pointer">
                                    <input type="checkbox" name="remove_featured_image" value="1" class="rounded border-gray-300 text-red-600 focus:ring-red-500">
                                    <span class="text-sm font-medium text-red-600">Remove image</span>
                                </label>
                            </div>
                        </div>
                    @endif
                    <div class="flex items-center gap-3">
                        <label class="cursor-pointer inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50 text-sm font-medium text-gray-700 hover:bg-gray-100 transition">
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            {{ $article->featured_image ? 'Replace image' : 'Choose image' }}
                            <input type="file" name="featured_image" accept="image/*" class="sr-only">
                        </label>
                        <span class="text-xs text-gray-500">PNG, JPG, max 2MB</span>
                    </div>
                </div>
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-1.5">Category</label>
                    <input id="category" type="text" name="category" value="{{ old('category', $article->category) }}"
                        class="w-full rounded-xl border border-gray-200 px-4 py-2.5 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition @error('category') border-red-300 @enderror"
                        placeholder="e.g. News, Tips">
                    @error('category')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1.5">Status</label>
                    <select id="status" name="status"
                        class="w-full rounded-xl border border-gray-200 px-4 py-2.5 text-gray-900 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition @error('status') border-red-300 @enderror">
                        <option value="draft" {{ old('status', $article->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ old('status', $article->status) === 'published' ? 'selected' : '' }}>Published</option>
                    </select>
                    @error('status')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="published_at" class="block text-sm font-medium text-gray-700 mb-1.5">Published at</label>
                    <input id="published_at" type="datetime-local" name="published_at" value="{{ old('published_at', $article->published_at?->format('Y-m-d\TH:i')) }}"
                        class="w-full rounded-xl border border-gray-200 px-4 py-2.5 text-gray-900 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition @error('published_at') border-red-300 @enderror">
                    @error('published_at')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
            </div>
        </section>

        <div class="flex flex-wrap items-center gap-3">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 px-5 rounded-xl shadow-sm transition">
                Update article
            </button>
            <a href="{{ route('admin.articles.index') }}" class="text-gray-600 hover:text-gray-900 font-medium text-sm">Cancel</a>
        </div>
    </form>
</div>

@push('scripts')
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    if (document.getElementById('content') && typeof CKEDITOR !== 'undefined') {
        CKEDITOR.replace('content', {
            height: 320,
            removePlugins: 'elementspath',
            resize_enabled: true
        });
    }
});
document.getElementById('article-form').addEventListener('submit', function() {
    if (typeof CKEDITOR !== 'undefined' && CKEDITOR.instances.content) {
        CKEDITOR.instances.content.updateElement();
    }
});
</script>
@endpush
@endsection
