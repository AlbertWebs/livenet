@extends('admin.layouts.app')

@section('title', 'Edit Plan')
@section('page_title', 'Edit Plan')

@section('content')
@php
    $featuresText = is_array($plan->features_list ?? []) ? implode("\n", $plan->features_list) : (string) ($plan->features ?? '');
    $planType = old('type', $plan->type);
@endphp
<div class="max-w-2xl mx-auto space-y-6">
    <div class="flex flex-wrap items-center justify-between gap-4">
        <a href="{{ route('admin.internet-plans.index', ['type' => $planType]) }}" class="inline-flex items-center gap-2 text-sm font-medium text-gray-600 hover:text-gray-900">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Back to {{ $planType === 'business' ? 'Business' : 'Home' }} plans
        </a>
        <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium {{ $planType === 'business' ? 'bg-indigo-100 text-indigo-800' : 'bg-sky-100 text-sky-800' }}">
            {{ $planType === 'business' ? 'Business' : 'Home' }} plan
        </span>
    </div>

    <form action="{{ route('admin.internet-plans.update', $plan) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        {{-- Basic info --}}
        <section class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/80">
                <h2 class="text-sm font-semibold text-gray-900 tracking-wide uppercase">Basic info</h2>
                <p class="text-xs text-gray-500 mt-0.5">Plan name and type shown on the homepage and plan pages</p>
            </div>
            <div class="p-6 space-y-5">
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700 mb-1.5">Type</label>
                    <select id="type" name="type" class="w-full rounded-xl border border-gray-200 px-4 py-2.5 text-gray-900 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition @error('type') border-red-300 @enderror">
                        <option value="home" {{ $planType === 'home' ? 'selected' : '' }}>Home Internet</option>
                        <option value="business" {{ $planType === 'business' ? 'selected' : '' }}>Business Internet</option>
                    </select>
                    @error('type')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1.5">Plan name <span class="text-red-500">*</span></label>
                    <input id="name" type="text" name="name" value="{{ old('name', $plan->name) }}" required
                        class="w-full rounded-xl border border-gray-200 px-4 py-2.5 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition @error('name') border-red-300 focus:border-red-500 focus:ring-red-500/20 @enderror"
                        placeholder="e.g. Fiber 50">
                    @error('name')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="speed" class="block text-sm font-medium text-gray-700 mb-1.5">Speed</label>
                    <input id="speed" type="text" name="speed" value="{{ old('speed', $plan->speed) }}"
                        class="w-full rounded-xl border border-gray-200 px-4 py-2.5 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition @error('speed') border-red-300 @enderror"
                        placeholder="e.g. 50 Mbps, Up to 100 Mbps">
                    @error('speed')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
            </div>
        </section>

        {{-- Pricing --}}
        <section class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/80">
                <h2 class="text-sm font-semibold text-gray-900 tracking-wide uppercase">Pricing</h2>
                <p class="text-xs text-gray-500 mt-0.5">Price and currency shown on the plan card</p>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700 mb-1.5">Price <span class="text-red-500">*</span></label>
                        <input id="price" type="number" name="price" value="{{ old('price', $plan->price) }}" required step="0.01" min="0"
                            class="w-full rounded-xl border border-gray-200 px-4 py-2.5 text-gray-900 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition @error('price') border-red-300 @enderror"
                            placeholder="0">
                        @error('price')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="currency" class="block text-sm font-medium text-gray-700 mb-1.5">Currency</label>
                        <input id="currency" type="text" name="currency" value="{{ old('currency', $plan->currency) }}"
                            class="w-full rounded-xl border border-gray-200 px-4 py-2.5 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition @error('currency') border-red-300 @enderror"
                            placeholder="KES">
                        @error('currency')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>
        </section>

        {{-- Features --}}
        <section class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/80">
                <h2 class="text-sm font-semibold text-gray-900 tracking-wide uppercase">Features</h2>
                <p class="text-xs text-gray-500 mt-0.5">One feature per line; shown as a bullet list on the plan card</p>
            </div>
            <div class="p-6">
                <label for="features" class="block text-sm font-medium text-gray-700 mb-1.5">Feature list</label>
                <textarea id="features" name="features" rows="6"
                    class="w-full rounded-xl border border-gray-200 px-4 py-2.5 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition font-mono text-sm @error('features') border-red-300 @enderror"
                    placeholder="Unlimited data&#10;24/7 support&#10;Free installation">{{ old('features', $featuresText) }}</textarea>
                @error('features')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
        </section>

        {{-- Display options --}}
        <section class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/80">
                <h2 class="text-sm font-semibold text-gray-900 tracking-wide uppercase">Display options</h2>
                <p class="text-xs text-gray-500 mt-0.5">Badge, highlight, and order on the page</p>
            </div>
            <div class="p-6 space-y-5">
                <div>
                    <label for="badge" class="block text-sm font-medium text-gray-700 mb-1.5">Badge</label>
                    <input id="badge" type="text" name="badge" value="{{ old('badge', $plan->badge) }}"
                        class="w-full rounded-xl border border-gray-200 px-4 py-2.5 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition @error('badge') border-red-300 @enderror"
                        placeholder="e.g. Most Popular, Best Value">
                    @error('badge')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div class="flex flex-wrap gap-6">
                    <label class="inline-flex items-center gap-2 cursor-pointer">
                        <input type="hidden" name="is_highlighted" value="0">
                        <input type="checkbox" name="is_highlighted" value="1" {{ old('is_highlighted', $plan->is_highlighted) ? 'checked' : '' }}
                            class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <span class="text-sm font-medium text-gray-700">Highlighted (primary style on card)</span>
                    </label>
                    <label class="inline-flex items-center gap-2 cursor-pointer">
                        <input type="hidden" name="show_image" value="0">
                        <input type="checkbox" name="show_image" value="1" {{ old('show_image', $plan->show_image ?? true) ? 'checked' : '' }}
                            class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <span class="text-sm font-medium text-gray-700">Show image on homepage</span>
                    </label>
                </div>
                <div>
                    <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-1.5">Sort order</label>
                    <input id="sort_order" type="number" name="sort_order" value="{{ old('sort_order', $plan->sort_order) }}"
                        class="w-full max-w-[8rem] rounded-xl border border-gray-200 px-4 py-2.5 text-gray-900 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition @error('sort_order') border-red-300 @enderror">
                    <p class="mt-1 text-xs text-gray-500">Lower numbers appear first.</p>
                    @error('sort_order')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
            </div>
        </section>

        {{-- Plan image --}}
        <section class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/80">
                <h2 class="text-sm font-semibold text-gray-900 tracking-wide uppercase">Plan image</h2>
                <p class="text-xs text-gray-500 mt-0.5">Optional image on the plan card when “Show image on homepage” is checked. PNG, JPG or WebP, max 2MB.</p>
            </div>
            <div class="p-6 space-y-4">
                @if($plan->image)
                    <div class="flex flex-wrap items-center gap-4 p-4 rounded-xl bg-gray-50 border border-gray-100">
                        <img src="{{ asset('storage/' . $plan->image) }}" alt="" class="h-24 w-auto object-cover rounded-lg border border-gray-200">
                        <div>
                            <p class="text-sm font-medium text-gray-700">Current image</p>
                            <label class="inline-flex items-center gap-2 cursor-pointer mt-1">
                                <input type="checkbox" name="remove_image" value="1" class="rounded border-gray-300 text-red-600 focus:ring-red-500">
                                <span class="text-sm text-red-600 font-medium">Remove image</span>
                            </label>
                        </div>
                    </div>
                @endif
                <div>
                    <label class="cursor-pointer inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50 text-sm font-medium text-gray-700 hover:bg-gray-100 transition">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        {{ $plan->image ? 'Replace image' : 'Choose image' }}
                        <input type="file" name="image" accept="image/*" class="sr-only">
                    </label>
                </div>
            </div>
        </section>

        {{-- Submit --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pt-2">
            <a href="{{ route('admin.internet-plans.index', ['type' => $planType]) }}" class="text-sm font-medium text-gray-600 hover:text-gray-900">Cancel</a>
            <button type="submit" class="inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-xl shadow-sm hover:shadow transition focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Update plan
            </button>
        </div>
    </form>
</div>
@endsection
