@extends('admin.layouts.app')

@section('title', 'Edit Testimonial')
@section('page_title', 'Edit Testimonial')

@section('content')
<div class="bg-white rounded-xl shadow p-6 max-w-2xl">
    <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Name *</label><input type="text" name="name" value="{{ old('name', $testimonial->name) }}" required class="w-full rounded-lg border border-gray-300 px-3 py-2"></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Company</label><input type="text" name="company" value="{{ old('company', $testimonial->company) }}" class="w-full rounded-lg border border-gray-300 px-3 py-2"></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Role</label><input type="text" name="role" value="{{ old('role', $testimonial->role) }}" class="w-full rounded-lg border border-gray-300 px-3 py-2"></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Testimonial *</label><textarea name="testimonial" rows="4" required class="w-full rounded-lg border border-gray-300 px-3 py-2">{{ old('testimonial', $testimonial->testimonial) }}</textarea></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Image</label>@if($testimonial->image)<p class="text-sm mb-1">Current: <img src="{{ asset('storage/' . $testimonial->image) }}" class="h-16 rounded-full inline"></p>@endif<input type="file" name="image" accept="image/*" class="w-full text-sm"></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Rating</label><input type="number" name="rating" value="{{ old('rating', $testimonial->rating) }}" min="1" max="5" class="w-full rounded-lg border border-gray-300 px-3 py-2"></div>
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg">Update Testimonial</button>
    </form>
</div>
@endsection
