@extends('admin.layouts.app')

@section('title', 'New Plan')
@section('page_title', 'New Plan')

@section('content')
<div class="bg-white rounded-xl shadow p-6 max-w-2xl">
    <form action="{{ route('admin.internet-plans.store') }}" method="POST" class="space-y-4">
        @csrf
        <input type="hidden" name="type" value="{{ $type ?? 'home' }}">
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Plan name *</label><input type="text" name="name" value="{{ old('name') }}" required class="w-full rounded-lg border border-gray-300 px-3 py-2"></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Speed</label><input type="text" name="speed" value="{{ old('speed') }}" class="w-full rounded-lg border border-gray-300 px-3 py-2"></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Price *</label><input type="number" name="price" value="{{ old('price') }}" required step="0.01" min="0" class="w-full rounded-lg border border-gray-300 px-3 py-2"></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Currency</label><input type="text" name="currency" value="{{ old('currency', 'KES') }}" class="w-full rounded-lg border border-gray-300 px-3 py-2"></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Features (one per line)</label><textarea name="features" rows="6" class="w-full rounded-lg border border-gray-300 px-3 py-2">{{ old('features') }}</textarea></div>
        <div><label class="flex items-center"><input type="checkbox" name="is_highlighted" value="1" class="rounded"> <span class="ml-2">Highlighted</span></label></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Badge</label><input type="text" name="badge" value="{{ old('badge') }}" class="w-full rounded-lg border border-gray-300 px-3 py-2"></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Sort order</label><input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" class="w-full rounded-lg border border-gray-300 px-3 py-2"></div>
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg">Create Plan</button>
    </form>
</div>
@endsection
