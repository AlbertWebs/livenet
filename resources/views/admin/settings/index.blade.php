@extends('admin.layouts.app')

@section('title', 'Site Settings')
@section('page_title', 'Site Settings')

@section('content')
<div class="bg-white rounded-xl shadow p-6 max-w-2xl">
    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Site name</label>
            <input type="text" name="site_name" value="{{ old('site_name', $settings['site_name'] ?? '') }}" class="w-full rounded-lg border border-gray-300 px-3 py-2">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Logo</label>
            @if(!empty($settings['logo']))
                <p class="text-sm text-gray-500 mb-1">Current: <img src="{{ asset('storage/' . $settings['logo']) }}" alt="Logo" class="h-8 inline"></p>
            @endif
            <input type="file" name="logo" accept="image/*" class="w-full text-sm">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Favicon</label>
            @if(!empty($settings['favicon']))
                <p class="text-sm text-gray-500 mb-1">Current favicon uploaded.</p>
            @endif
            <input type="file" name="favicon" accept="image/*" class="w-full text-sm">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Contact email</label>
            <input type="email" name="contact_email" value="{{ old('contact_email', $settings['contact_email'] ?? '') }}" class="w-full rounded-lg border border-gray-300 px-3 py-2">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
            <input type="text" name="phone" value="{{ old('phone', $settings['phone'] ?? '') }}" class="w-full rounded-lg border border-gray-300 px-3 py-2">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
            <textarea name="address" rows="2" class="w-full rounded-lg border border-gray-300 px-3 py-2">{{ old('address', $settings['address'] ?? '') }}</textarea>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Facebook URL</label>
                <input type="url" name="facebook_url" value="{{ old('facebook_url', $settings['facebook_url'] ?? '') }}" class="w-full rounded-lg border border-gray-300 px-3 py-2">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Twitter URL</label>
                <input type="url" name="twitter_url" value="{{ old('twitter_url', $settings['twitter_url'] ?? '') }}" class="w-full rounded-lg border border-gray-300 px-3 py-2">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">LinkedIn URL</label>
                <input type="url" name="linkedin_url" value="{{ old('linkedin_url', $settings['linkedin_url'] ?? '') }}" class="w-full rounded-lg border border-gray-300 px-3 py-2">
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">SEO default meta title</label>
            <input type="text" name="seo_meta_title" value="{{ old('seo_meta_title', $settings['seo_meta_title'] ?? '') }}" class="w-full rounded-lg border border-gray-300 px-3 py-2">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">SEO default meta description</label>
            <textarea name="seo_meta_description" rows="2" class="w-full rounded-lg border border-gray-300 px-3 py-2">{{ old('seo_meta_description', $settings['seo_meta_description'] ?? '') }}</textarea>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Google Map embed URL (optional)</label>
            <input type="text" name="map_embed_url" value="{{ old('map_embed_url', $settings['map_embed_url'] ?? '') }}" placeholder="https://www.google.com/maps/embed?pb=..." class="w-full rounded-lg border border-gray-300 px-3 py-2">
        </div>
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg">Save settings</button>
    </form>
</div>
@endsection
