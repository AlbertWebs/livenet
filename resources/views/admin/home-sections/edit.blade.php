@extends('admin.layouts.app')

@section('title', 'Edit Home Section')
@section('page_title', 'Edit Home Section')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <div class="flex items-center justify-between gap-4">
        <a href="{{ route('admin.home-sections.index') }}" class="inline-flex items-center gap-2 text-sm font-medium text-gray-600 hover:text-gray-900">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Back to sections
        </a>
    </div>

    <form action="{{ route('admin.home-sections.update', $section) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        {{-- Section identity --}}
        <section class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/80">
                <h2 class="text-sm font-semibold text-gray-900 tracking-wide uppercase">Section identity</h2>
                <p class="text-xs text-gray-500 mt-0.5">Name is used to match this section on the homepage (e.g. <code class="bg-gray-200 px-1 rounded">features</code> = image and title in “Internet Services” block)</p>
            </div>
            <div class="p-6 space-y-5">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1.5">Name <span class="text-red-500">*</span></label>
                    <input id="name" type="text" name="name" value="{{ old('name', $section->name) }}" required
                        class="w-full rounded-xl border border-gray-200 px-4 py-2.5 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition @error('name') border-red-300 focus:border-red-500 focus:ring-red-500/20 @enderror"
                        placeholder="e.g. features, hero, testimonials, cta">
                    @error('name')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-1.5">Sort order</label>
                    <input id="sort_order" type="number" name="sort_order" value="{{ old('sort_order', $section->sort_order) }}"
                        class="w-full rounded-xl border border-gray-200 px-4 py-2.5 text-gray-900 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition @error('sort_order') border-red-300 @enderror">
                    @error('sort_order')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="inline-flex items-center gap-2 cursor-pointer">
                        <input type="hidden" name="is_active" value="0">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $section->is_active) ? 'checked' : '' }}
                            class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <span class="text-sm font-medium text-gray-700">Active (show on homepage)</span>
                    </label>
                </div>
            </div>
        </section>

        {{-- Content --}}
        <section class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/80">
                <h2 class="text-sm font-semibold text-gray-900 tracking-wide uppercase">Content</h2>
                <p class="text-xs text-gray-500 mt-0.5">Title and subtitle can override the default headings on the homepage for this section</p>
            </div>
            <div class="p-6 space-y-5">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1.5">Title</label>
                    <input id="title" type="text" name="title" value="{{ old('title', $section->title) }}"
                        class="w-full rounded-xl border border-gray-200 px-4 py-2.5 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition @error('title') border-red-300 @enderror"
                        placeholder="Section heading">
                    @error('title')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="subtitle" class="block text-sm font-medium text-gray-700 mb-1.5">Subtitle</label>
                    <textarea id="subtitle" name="subtitle" rows="2"
                        class="w-full rounded-xl border border-gray-200 px-4 py-2.5 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition @error('subtitle') border-red-300 @enderror"
                        placeholder="Short description under the title">{{ old('subtitle', $section->subtitle) }}</textarea>
                    @error('subtitle')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-1.5">Content (optional)</label>
                    <textarea id="content" name="content" rows="5"
                        class="w-full rounded-xl border border-gray-200 px-4 py-2.5 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition @error('content') border-red-300 @enderror"
                        placeholder="Extra HTML or text">{{ old('content', $section->content) }}</textarea>
                    @error('content')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
            </div>
        </section>

        {{-- Image --}}
        <section class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/80">
                <h2 class="text-sm font-semibold text-gray-900 tracking-wide uppercase">Image</h2>
                <p class="text-xs text-gray-500 mt-0.5">For section <strong>features</strong>, this image appears in the “Internet Services” block on the homepage. PNG, JPG or WebP, max 2MB.</p>
            </div>
            <div class="p-6 space-y-5">
                @if($section->image)
                    <div class="flex flex-wrap items-start gap-4">
                        <img src="{{ asset('storage/' . $section->image) }}" alt="Current section image" class="h-32 w-auto object-contain rounded-xl border border-gray-200 bg-gray-50 p-2">
                        <div class="flex flex-col gap-2">
                            <span class="text-sm text-gray-500">Current image</span>
                            <label class="inline-flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="remove_image" value="1" class="rounded border-gray-300 text-red-600 focus:ring-red-500">
                                <span class="text-sm font-medium text-red-600">Remove image</span>
                            </label>
                        </div>
                    </div>
                @endif
                <div class="flex flex-col gap-2">
                    <label class="cursor-pointer inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50 text-sm font-medium text-gray-700 hover:bg-gray-100 transition w-fit">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        {{ $section->image ? 'Replace image' : 'Choose image' }}
                        <input type="file" name="image" accept="image/*" class="sr-only">
                    </label>
                    <span class="text-xs text-gray-500">PNG, JPG or WebP, max 2MB</span>
                </div>
                @error('image')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
        </section>

        <div class="flex flex-wrap items-center gap-3">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 px-5 rounded-xl shadow-sm transition">
                Save changes
            </button>
            <a href="{{ route('admin.home-sections.index') }}" class="text-gray-600 hover:text-gray-900 font-medium text-sm">Cancel</a>
        </div>
    </form>
</div>
@endsection
