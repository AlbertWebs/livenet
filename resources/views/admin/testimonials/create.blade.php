@extends('admin.layouts.app')

@section('title', 'New Testimonial')
@section('page_title', 'New Testimonial')

@section('content')
<div class="bg-white rounded-xl shadow p-6 max-w-2xl">
    <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Name *</label>
            <input type="text" name="name" value="{{ old('name') }}" required class="w-full rounded-lg border border-gray-300 px-3 py-2">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Company</label>
            <input type="text" name="company" value="{{ old('company') }}" class="w-full rounded-lg border border-gray-300 px-3 py-2">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Role</label>
            <input type="text" name="role" value="{{ old('role') }}" class="w-full rounded-lg border border-gray-300 px-3 py-2">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Testimonial *</label>
            <textarea name="testimonial" rows="4" required class="w-full rounded-lg border border-gray-300 px-3 py-2">{{ old('testimonial') }}</textarea>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Image</label>
            <input type="file" name="image" accept="image/*" class="w-full text-sm">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Rating (1-5)</label>
            <input type="number" name="rating" value="{{ old('rating', 5) }}" min="1" max="5" class="w-full rounded-lg border border-gray-300 px-3 py-2">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Sort order</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" class="w-full rounded-lg border border-gray-300 px-3 py-2">
        </div>
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg">Create Testimonial</button>
    </form>
</div>
@endsection
