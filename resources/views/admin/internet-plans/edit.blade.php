@extends('admin.layouts.app')

@section('title', 'Edit Plan')
@section('page_title', 'Edit Plan')

@section('content')
@php
    $featuresText = is_array($plan->features_list ?? []) ? implode("\n", $plan->features_list) : (string) ($plan->features ?? '');
@endphp
<div class="bg-white rounded-xl shadow p-6 max-w-2xl">
    <form action="{{ route('admin.internet-plans.update', $plan) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Type</label><select name="type" class="w-full rounded-lg border border-gray-300 px-3 py-2"><option value="home" {{ $plan->type === 'home' ? 'selected' : '' }}>Home</option><option value="business" {{ $plan->type === 'business' ? 'selected' : '' }}>Business</option></select></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Plan name *</label><input type="text" name="name" value="{{ old('name', $plan->name) }}" required class="w-full rounded-lg border border-gray-300 px-3 py-2"></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Speed</label><input type="text" name="speed" value="{{ old('speed', $plan->speed) }}" class="w-full rounded-lg border border-gray-300 px-3 py-2"></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Price *</label><input type="number" name="price" value="{{ old('price', $plan->price) }}" required step="0.01" min="0" class="w-full rounded-lg border border-gray-300 px-3 py-2"></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Currency</label><input type="text" name="currency" value="{{ old('currency', $plan->currency) }}" class="w-full rounded-lg border border-gray-300 px-3 py-2"></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Features (one per line)</label><textarea name="features" rows="6" class="w-full rounded-lg border border-gray-300 px-3 py-2">{{ old('features', $featuresText) }}</textarea></div>
        <div><label class="flex items-center"><input type="checkbox" name="is_highlighted" value="1" {{ old('is_highlighted', $plan->is_highlighted) ? 'checked' : '' }} class="rounded"> <span class="ml-2">Highlighted</span></label></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Badge</label><input type="text" name="badge" value="{{ old('badge', $plan->badge) }}" class="w-full rounded-lg border border-gray-300 px-3 py-2"></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Sort order</label><input type="number" name="sort_order" value="{{ old('sort_order', $plan->sort_order) }}" class="w-full rounded-lg border border-gray-300 px-3 py-2"></div>
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg">Update Plan</button>
    </form>
</div>
@endsection
