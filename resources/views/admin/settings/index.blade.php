@extends('admin.layouts.app')

@section('title', 'Site Settings')
@section('page_title', 'Site Settings')

@section('content')
<div class="max-w-3xl mx-auto">
    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')

        {{-- Branding --}}
        <section class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/80">
                <h2 class="text-sm font-semibold text-gray-900 tracking-wide uppercase">Branding</h2>
                <p class="text-xs text-gray-500 mt-0.5">Site identity and visuals</p>
            </div>
            <div class="p-6 space-y-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Site name</label>
                    <input type="text" name="site_name" value="{{ old('site_name', $settings['site_name'] ?? '') }}" placeholder="Livenet Solutions" class="w-full rounded-xl border border-gray-200 px-4 py-2.5 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition @error('site_name') border-red-300 focus:border-red-500 focus:ring-red-500/20 @enderror">
                    @error('site_name')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Logo</label>
                    @if(!empty($settings['logo']))
                        <div class="flex items-center gap-4 mb-3 flex-wrap">
                            <img src="{{ asset('storage/' . $settings['logo']) }}" alt="Current logo" class="h-12 w-auto object-contain rounded-lg border border-gray-200 bg-gray-50 p-1">
                            <span class="text-sm text-gray-500">Current logo</span>
                            <label class="inline-flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="remove_logo" value="1" class="rounded border-gray-300 text-red-600 focus:ring-red-500">
                                <span class="text-sm text-red-600 font-medium">Remove logo</span>
                            </label>
                        </div>
                    @endif
                    <div class="flex items-center gap-3">
                        <label class="cursor-pointer inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50 text-sm font-medium text-gray-700 hover:bg-gray-100 transition">
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            Choose file
                            <input type="file" name="logo" accept="image/*" class="sr-only" data-file-label="logo-file-label">
                        </label>
                        <span id="logo-file-label" class="text-xs text-gray-500">PNG, JPG or SVG, max 2MB</span>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Favicon</label>
                    @if(!empty($settings['favicon']))
                        <div class="flex items-center gap-4 mb-3 flex-wrap">
                            <img src="{{ asset('storage/' . $settings['favicon']) }}" alt="Current favicon" class="h-8 w-8 object-contain rounded border border-gray-200 bg-gray-50 p-0.5">
                            <span class="text-sm text-gray-500">Current favicon</span>
                            <label class="inline-flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="remove_favicon" value="1" class="rounded border-gray-300 text-red-600 focus:ring-red-500">
                                <span class="text-sm text-red-600 font-medium">Remove favicon</span>
                            </label>
                        </div>
                    @endif
                    <div class="flex items-center gap-3">
                        <label class="cursor-pointer inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50 text-sm font-medium text-gray-700 hover:bg-gray-100 transition">
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            Choose file
                            <input type="file" name="favicon" accept="image/*" class="sr-only" data-file-label="favicon-file-label">
                        </label>
                        <span id="favicon-file-label" class="text-xs text-gray-500">Small icon, max 512KB</span>
                    </div>
                </div>
            </div>
        </section>

        {{-- Contact --}}
        <section class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/80">
                <h2 class="text-sm font-semibold text-gray-900 tracking-wide uppercase">Contact</h2>
                <p class="text-xs text-gray-500 mt-0.5">How visitors reach you</p>
            </div>
            <div class="p-6 space-y-5">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Contact email</label>
                        <input type="email" name="contact_email" value="{{ old('contact_email', $settings['contact_email'] ?? '') }}" placeholder="info@livenetsolutions.com" class="w-full rounded-xl border border-gray-200 px-4 py-2.5 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Phone</label>
                        <input type="text" name="phone" value="{{ old('phone', $settings['phone'] ?? '') }}" placeholder="0712 104104" class="w-full rounded-xl border border-gray-200 px-4 py-2.5 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Address</label>
                    <textarea name="address" rows="2" placeholder="Nairobi, Kenya" class="w-full rounded-xl border border-gray-200 px-4 py-2.5 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition resize-none">{{ old('address', $settings['address'] ?? '') }}</textarea>
                </div>
            </div>
        </section>

        {{-- Social --}}
        <section class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/80">
                <h2 class="text-sm font-semibold text-gray-900 tracking-wide uppercase">Social links</h2>
                <p class="text-xs text-gray-500 mt-0.5">Full URLs to your profiles</p>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Facebook</label>
                        <input type="url" name="facebook_url" value="{{ old('facebook_url', $settings['facebook_url'] ?? '') }}" placeholder="https://facebook.com/..." class="w-full rounded-xl border border-gray-200 px-4 py-2.5 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Twitter / X</label>
                        <input type="url" name="twitter_url" value="{{ old('twitter_url', $settings['twitter_url'] ?? '') }}" placeholder="https://twitter.com/..." class="w-full rounded-xl border border-gray-200 px-4 py-2.5 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">LinkedIn</label>
                        <input type="url" name="linkedin_url" value="{{ old('linkedin_url', $settings['linkedin_url'] ?? '') }}" placeholder="https://linkedin.com/..." class="w-full rounded-xl border border-gray-200 px-4 py-2.5 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition text-sm">
                    </div>
                </div>
            </div>
        </section>

        {{-- SEO --}}
        <section class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/80">
                <h2 class="text-sm font-semibold text-gray-900 tracking-wide uppercase">SEO</h2>
                <p class="text-xs text-gray-500 mt-0.5">Default meta tags for search engines</p>
            </div>
            <div class="p-6 space-y-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Default meta title</label>
                    <input type="text" name="seo_meta_title" value="{{ old('seo_meta_title', $settings['seo_meta_title'] ?? '') }}" placeholder="Livenet Solutions | Fast, Reliable Internet" class="w-full rounded-xl border border-gray-200 px-4 py-2.5 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Default meta description</label>
                    <textarea name="seo_meta_description" rows="2" placeholder="Short description for search results..." class="w-full rounded-xl border border-gray-200 px-4 py-2.5 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition resize-none">{{ old('seo_meta_description', $settings['seo_meta_description'] ?? '') }}</textarea>
                </div>
            </div>
        </section>

        {{-- Contact page map --}}
        <section class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/80">
                <h2 class="text-sm font-semibold text-gray-900 tracking-wide uppercase">Contact page map</h2>
                <p class="text-xs text-gray-500 mt-0.5">Google Maps embed shown on the Contact Us page</p>
            </div>
            <div class="p-6">
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Google Map embed URL</label>
                <input type="text" name="map_embed_url" value="{{ old('map_embed_url', $settings['map_embed_url'] ?? '') }}" placeholder="https://www.google.com/maps/embed?pb=..." class="w-full rounded-xl border border-gray-200 px-4 py-2.5 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition text-sm">
            </div>
        </section>

        {{-- Submit --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pt-2">
            <p class="text-sm text-gray-500">Changes take effect after saving.</p>
            <button type="submit" class="inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-xl shadow-sm hover:shadow transition focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Save settings
            </button>
        </div>
    </form>
</div>

@push('scripts')
<script>
(function() {
    document.querySelectorAll('input[type="file"][data-file-label]').forEach(function(input) {
        var labelId = input.getAttribute('data-file-label');
        var labelEl = document.getElementById(labelId);
        if (!labelEl) return;
        input.addEventListener('change', function() {
            labelEl.textContent = this.files && this.files[0] ? this.files[0].name : labelEl.dataset.default || 'Choose a file';
        });
        if (labelEl.textContent.indexOf('max') > -1) labelEl.dataset.default = labelEl.textContent;
    });
})();
</script>
@endpush
@endsection
