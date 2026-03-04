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

        {{-- Homepage stats (testimonials section) --}}
        <section class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/80">
                <h2 class="text-sm font-semibold text-gray-900 tracking-wide uppercase">Homepage stats</h2>
                <p class="text-xs text-gray-500 mt-0.5">Numbers shown in the testimonials section (e.g. 99.9% Uptime SLA, 50K+ Happy Customers, 24/7 Support)</p>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Stat 1 – Number</label>
                        <input type="text" name="stat_1_number" value="{{ old('stat_1_number', $settings['stat_1_number'] ?? '99.9%') }}" placeholder="99.9%" class="w-full rounded-xl border border-gray-200 px-4 py-2.5 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition">
                        <label class="block text-sm font-medium text-gray-700 mb-1.5 mt-2">Stat 1 – Label</label>
                        <input type="text" name="stat_1_label" value="{{ old('stat_1_label', $settings['stat_1_label'] ?? 'Uptime SLA') }}" placeholder="Uptime SLA" class="w-full rounded-xl border border-gray-200 px-4 py-2.5 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Stat 2 – Number</label>
                        <input type="text" name="stat_2_number" value="{{ old('stat_2_number', $settings['stat_2_number'] ?? '50K+') }}" placeholder="50K+" class="w-full rounded-xl border border-gray-200 px-4 py-2.5 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition">
                        <label class="block text-sm font-medium text-gray-700 mb-1.5 mt-2">Stat 2 – Label</label>
                        <input type="text" name="stat_2_label" value="{{ old('stat_2_label', $settings['stat_2_label'] ?? 'Happy Customers') }}" placeholder="Happy Customers" class="w-full rounded-xl border border-gray-200 px-4 py-2.5 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Stat 3 – Number</label>
                        <input type="text" name="stat_3_number" value="{{ old('stat_3_number', $settings['stat_3_number'] ?? '24/7') }}" placeholder="24/7" class="w-full rounded-xl border border-gray-200 px-4 py-2.5 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition">
                        <label class="block text-sm font-medium text-gray-700 mb-1.5 mt-2">Stat 3 – Label</label>
                        <input type="text" name="stat_3_label" value="{{ old('stat_3_label', $settings['stat_3_label'] ?? 'Support') }}" placeholder="Support" class="w-full rounded-xl border border-gray-200 px-4 py-2.5 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition">
                    </div>
                </div>
            </div>
        </section>

        {{-- Intro section (after hero) --}}
        <section class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/80">
                <h2 class="text-sm font-semibold text-gray-900 tracking-wide uppercase">Intro section (after hero)</h2>
                <p class="text-xs text-gray-500 mt-0.5">Paragraph(s) describing Livenet Solutions, shown next to Decorative image 1. Use line breaks for multiple paragraphs.</p>
            </div>
            <div class="p-6 space-y-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">About Livenet Solutions</label>
                    <textarea name="home_intro_text" rows="5" placeholder="e.g. Livenet Solutions is a leading internet service provider in Nairobi, delivering fast, reliable connectivity for homes and businesses. We build and maintain our own network so we can offer consistent speeds, transparent pricing, and local support when you need it." class="w-full rounded-xl border border-gray-200 px-4 py-2.5 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition @error('home_intro_text') border-red-300 @enderror">{{ old('home_intro_text', $settings['home_intro_text'] ?? '') }}</textarea>
                    @error('home_intro_text')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    <p class="mt-1 text-xs text-gray-500">Max 2000 characters. Shown in the block below the hero; the image is set under Homepage images → Decorative image 1.</p>
                </div>
            </div>
        </section>

        {{-- Homepage images --}}
        <section class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/80">
                <h2 class="text-sm font-semibold text-gray-900 tracking-wide uppercase">Homepage images</h2>
                <p class="text-xs text-gray-500 mt-0.5">Images for the landing page. Leave empty to show placeholders.</p>
            </div>
            <div class="p-6 space-y-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Internet Services section (right side image)</label>
                    <p class="text-xs text-gray-500 mb-2">Shown beside “Home Internet” and “Business Internet” cards. Same height as the two cards.</p>
                    @if(!empty($settings['home_services_section_image']))
                        <div class="flex items-center gap-4 mb-3 flex-wrap">
                            <img src="{{ asset('storage/' . $settings['home_services_section_image']) }}" alt="Current" class="h-20 w-auto object-contain rounded-lg border border-gray-200 bg-gray-50 p-1">
                            <label class="inline-flex items-center gap-2 cursor-pointer"><input type="checkbox" name="remove_home_services_section_image" value="1" class="rounded border-gray-300 text-red-600 focus:ring-red-500"> <span class="text-sm text-red-600 font-medium">Remove</span></label>
                        </div>
                    @endif
                    <input type="file" name="home_services_section_image" accept="image/*" class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Decorative image 1</label>
                    <p class="text-xs text-gray-500 mb-2">Shown in the intro section (after hero) next to the “About Livenet Solutions” text.</p>
                    @if(!empty($settings['home_decor_image_1']))
                        <div class="flex items-center gap-4 mb-3 flex-wrap">
                            <img src="{{ asset('storage/' . $settings['home_decor_image_1']) }}" alt="Current" class="h-20 w-auto object-contain rounded-lg border border-gray-200 bg-gray-50 p-1">
                            <label class="inline-flex items-center gap-2 cursor-pointer"><input type="checkbox" name="remove_home_decor_image_1" value="1" class="rounded border-gray-300 text-red-600 focus:ring-red-500"> <span class="text-sm text-red-600 font-medium">Remove</span></label>
                        </div>
                    @endif
                    <input type="file" name="home_decor_image_1" accept="image/*" class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Decorative image 2</label>
                    <p class="text-xs text-gray-500 mb-2">Second optional image for the homepage.</p>
                    @if(!empty($settings['home_decor_image_2']))
                        <div class="flex items-center gap-4 mb-3 flex-wrap">
                            <img src="{{ asset('storage/' . $settings['home_decor_image_2']) }}" alt="Current" class="h-20 w-auto object-contain rounded-lg border border-gray-200 bg-gray-50 p-1">
                            <label class="inline-flex items-center gap-2 cursor-pointer"><input type="checkbox" name="remove_home_decor_image_2" value="1" class="rounded border-gray-300 text-red-600 focus:ring-red-500"> <span class="text-sm text-red-600 font-medium">Remove</span></label>
                        </div>
                    @endif
                    <input type="file" name="home_decor_image_2" accept="image/*" class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200">
                </div>
                <div class="border-t border-gray-100 pt-6 mt-6">
                    <h3 class="text-sm font-semibold text-gray-800 mb-3">WHO WE ARE section</h3>
                    <p class="text-xs text-gray-500 mb-4">Images shown in the “WHO WE ARE” block on the homepage (main image and smaller overlapping image). Leave empty to use theme defaults.</p>
                    <div class="space-y-5">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">WHO WE ARE – Main image</label>
                            @if(!empty($settings['about_section_image_1']))
                                <div class="flex items-center gap-4 mb-3 flex-wrap">
                                    <img src="{{ asset('storage/' . $settings['about_section_image_1']) }}" alt="Current" class="h-20 w-auto object-contain rounded-lg border border-gray-200 bg-gray-50 p-1">
                                    <label class="inline-flex items-center gap-2 cursor-pointer"><input type="checkbox" name="remove_about_section_image_1" value="1" class="rounded border-gray-300 text-red-600 focus:ring-red-500"> <span class="text-sm text-red-600 font-medium">Remove</span></label>
                                </div>
                            @endif
                            <input type="file" name="about_section_image_1" accept="image/*" class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">WHO WE ARE – Secondary image</label>
                            @if(!empty($settings['about_section_image_2']))
                                <div class="flex items-center gap-4 mb-3 flex-wrap">
                                    <img src="{{ asset('storage/' . $settings['about_section_image_2']) }}" alt="Current" class="h-20 w-auto object-contain rounded-lg border border-gray-200 bg-gray-50 p-1">
                                    <label class="inline-flex items-center gap-2 cursor-pointer"><input type="checkbox" name="remove_about_section_image_2" value="1" class="rounded border-gray-300 text-red-600 focus:ring-red-500"> <span class="text-sm text-red-600 font-medium">Remove</span></label>
                                </div>
                            @endif
                            <input type="file" name="about_section_image_2" accept="image/*" class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Home Internet page images & video --}}
        <section class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/80">
                <h2 class="text-sm font-semibold text-gray-900 tracking-wide uppercase">Home Internet page</h2>
                <p class="text-xs text-gray-500 mt-0.5">Images and video for <a href="{{ url('/home-internet') }}" target="_blank" rel="noopener" class="text-blue-600 hover:underline">/home-internet</a>. Leave empty to use theme defaults.</p>
            </div>
            <div class="p-6 space-y-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Hero background video</label>
                    <p class="text-xs text-gray-500 mb-2">MP4 shown behind the hero section. Max 50MB.</p>
                    @if(!empty($settings['home_internet_hero_video'] ?? null))
                        <div class="flex items-center gap-4 mb-3 flex-wrap">
                            <span class="text-sm text-gray-600">Current video set</span>
                            <label class="inline-flex items-center gap-2 cursor-pointer"><input type="checkbox" name="remove_home_internet_hero_video" value="1" class="rounded border-gray-300 text-red-600 focus:ring-red-500"> <span class="text-sm text-red-600 font-medium">Remove</span></label>
                        </div>
                    @endif
                    <input type="file" name="home_internet_hero_video" accept="video/mp4" class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Hero poster image</label>
                    <p class="text-xs text-gray-500 mb-2">Shown before the video loads or when video is not set.</p>
                    @if(!empty($settings['home_internet_hero_poster'] ?? null))
                        <div class="flex items-center gap-4 mb-3 flex-wrap">
                            <img src="{{ asset('storage/' . $settings['home_internet_hero_poster']) }}" alt="Current" class="h-20 w-auto object-contain rounded-lg border border-gray-200 bg-gray-50 p-1">
                            <label class="inline-flex items-center gap-2 cursor-pointer"><input type="checkbox" name="remove_home_internet_hero_poster" value="1" class="rounded border-gray-300 text-red-600 focus:ring-red-500"> <span class="text-sm text-red-600 font-medium">Remove</span></label>
                        </div>
                    @endif
                    <input type="file" name="home_internet_hero_poster" accept="image/*" class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Hero pattern overlay</label>
                    @if(!empty($settings['home_internet_hero_pattern'] ?? null))
                        <div class="flex items-center gap-4 mb-3 flex-wrap">
                            <img src="{{ asset('storage/' . $settings['home_internet_hero_pattern']) }}" alt="Current" class="h-16 w-auto object-contain rounded-lg border border-gray-200 bg-gray-50 p-1">
                            <label class="inline-flex items-center gap-2 cursor-pointer"><input type="checkbox" name="remove_home_internet_hero_pattern" value="1" class="rounded border-gray-300 text-red-600 focus:ring-red-500"> <span class="text-sm text-red-600 font-medium">Remove</span></label>
                        </div>
                    @endif
                    <input type="file" name="home_internet_hero_pattern" accept="image/*" class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200">
                </div>
                <div class="border-t border-gray-100 pt-6">
                    <h3 class="text-sm font-semibold text-gray-800 mb-3">About section</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">About – main image</label>
                            @if(!empty($settings['home_internet_about_image'] ?? null))
                                <div class="flex items-center gap-4 mb-3 flex-wrap">
                                    <img src="{{ asset('storage/' . $settings['home_internet_about_image']) }}" alt="Current" class="h-20 w-auto object-contain rounded-lg border border-gray-200 bg-gray-50 p-1">
                                    <label class="inline-flex items-center gap-2 cursor-pointer"><input type="checkbox" name="remove_home_internet_about_image" value="1" class="rounded border-gray-300 text-red-600 focus:ring-red-500"> <span class="text-sm text-red-600 font-medium">Remove</span></label>
                                </div>
                            @endif
                            <input type="file" name="home_internet_about_image" accept="image/*" class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">About – curve pattern 1</label>
                            @if(!empty($settings['home_internet_about_curve_1'] ?? null))
                                <div class="flex items-center gap-4 mb-3 flex-wrap">
                                    <img src="{{ asset('storage/' . $settings['home_internet_about_curve_1']) }}" alt="Current" class="h-12 w-auto object-contain rounded border border-gray-200 bg-gray-50 p-1">
                                    <label class="inline-flex items-center gap-2 cursor-pointer"><input type="checkbox" name="remove_home_internet_about_curve_1" value="1" class="rounded border-gray-300 text-red-600 focus:ring-red-500"> <span class="text-sm text-red-600 font-medium">Remove</span></label>
                                </div>
                            @endif
                            <input type="file" name="home_internet_about_curve_1" accept="image/*" class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">About – curve pattern 2</label>
                            @if(!empty($settings['home_internet_about_curve_2'] ?? null))
                                <div class="flex items-center gap-4 mb-3 flex-wrap">
                                    <img src="{{ asset('storage/' . $settings['home_internet_about_curve_2']) }}" alt="Current" class="h-12 w-auto object-contain rounded border border-gray-200 bg-gray-50 p-1">
                                    <label class="inline-flex items-center gap-2 cursor-pointer"><input type="checkbox" name="remove_home_internet_about_curve_2" value="1" class="rounded border-gray-300 text-red-600 focus:ring-red-500"> <span class="text-sm text-red-600 font-medium">Remove</span></label>
                                </div>
                            @endif
                            <input type="file" name="home_internet_about_curve_2" accept="image/*" class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">About – pattern</label>
                            @if(!empty($settings['home_internet_about_pattern'] ?? null))
                                <div class="flex items-center gap-4 mb-3 flex-wrap">
                                    <img src="{{ asset('storage/' . $settings['home_internet_about_pattern']) }}" alt="Current" class="h-12 w-auto object-contain rounded border border-gray-200 bg-gray-50 p-1">
                                    <label class="inline-flex items-center gap-2 cursor-pointer"><input type="checkbox" name="remove_home_internet_about_pattern" value="1" class="rounded border-gray-300 text-red-600 focus:ring-red-500"> <span class="text-sm text-red-600 font-medium">Remove</span></label>
                                </div>
                            @endif
                            <input type="file" name="home_internet_about_pattern" accept="image/*" class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200">
                        </div>
                    </div>
                </div>
                <div class="border-t border-gray-100 pt-6">
                    <h3 class="text-sm font-semibold text-gray-800 mb-3">Facility section</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Facility – main image</label>
                            @if(!empty($settings['home_internet_facility_image'] ?? null))
                                <div class="flex items-center gap-4 mb-3 flex-wrap">
                                    <img src="{{ asset('storage/' . $settings['home_internet_facility_image']) }}" alt="Current" class="h-20 w-auto object-contain rounded-lg border border-gray-200 bg-gray-50 p-1">
                                    <label class="inline-flex items-center gap-2 cursor-pointer"><input type="checkbox" name="remove_home_internet_facility_image" value="1" class="rounded border-gray-300 text-red-600 focus:ring-red-500"> <span class="text-sm text-red-600 font-medium">Remove</span></label>
                                </div>
                            @endif
                            <input type="file" name="home_internet_facility_image" accept="image/*" class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Facility – package image</label>
                            @if(!empty($settings['home_internet_facility_package'] ?? null))
                                <div class="flex items-center gap-4 mb-3 flex-wrap">
                                    <img src="{{ asset('storage/' . $settings['home_internet_facility_package']) }}" alt="Current" class="h-16 w-auto object-contain rounded-lg border border-gray-200 bg-gray-50 p-1">
                                    <label class="inline-flex items-center gap-2 cursor-pointer"><input type="checkbox" name="remove_home_internet_facility_package" value="1" class="rounded border-gray-300 text-red-600 focus:ring-red-500"> <span class="text-sm text-red-600 font-medium">Remove</span></label>
                                </div>
                            @endif
                            <input type="file" name="home_internet_facility_package" accept="image/*" class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Facility – background pattern</label>
                            @if(!empty($settings['home_internet_facility_pattern'] ?? null))
                                <div class="flex items-center gap-4 mb-3 flex-wrap">
                                    <img src="{{ asset('storage/' . $settings['home_internet_facility_pattern']) }}" alt="Current" class="h-12 w-auto object-contain rounded border border-gray-200 bg-gray-50 p-1">
                                    <label class="inline-flex items-center gap-2 cursor-pointer"><input type="checkbox" name="remove_home_internet_facility_pattern" value="1" class="rounded border-gray-300 text-red-600 focus:ring-red-500"> <span class="text-sm text-red-600 font-medium">Remove</span></label>
                                </div>
                            @endif
                            <input type="file" name="home_internet_facility_pattern" accept="image/*" class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200">
                        </div>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Pricing section – background pattern</label>
                    @if(!empty($settings['home_internet_price_pattern'] ?? null))
                        <div class="flex items-center gap-4 mb-3 flex-wrap">
                            <img src="{{ asset('storage/' . $settings['home_internet_price_pattern']) }}" alt="Current" class="h-12 w-auto object-contain rounded border border-gray-200 bg-gray-50 p-1">
                            <label class="inline-flex items-center gap-2 cursor-pointer"><input type="checkbox" name="remove_home_internet_price_pattern" value="1" class="rounded border-gray-300 text-red-600 focus:ring-red-500"> <span class="text-sm text-red-600 font-medium">Remove</span></label>
                        </div>
                    @endif
                    <input type="file" name="home_internet_price_pattern" accept="image/*" class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200">
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
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
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
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Instagram</label>
                        <input type="url" name="instagram_url" value="{{ old('instagram_url', $settings['instagram_url'] ?? '') }}" placeholder="https://instagram.com/..." class="w-full rounded-xl border border-gray-200 px-4 py-2.5 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition text-sm">
                    </div>
                </div>
            </div>
        </section>

        {{-- SEO & sharing --}}
        <section class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/80">
                <h2 class="text-sm font-semibold text-gray-900 tracking-wide uppercase">SEO & link preview</h2>
                <p class="text-xs text-gray-500 mt-0.5">Meta tags for search engines and social sharing (landing page)</p>
            </div>
            <div class="p-6 space-y-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Default meta title</label>
                    <input type="text" name="seo_meta_title" value="{{ old('seo_meta_title', $settings['seo_meta_title'] ?? '') }}" placeholder="Livenet Solutions | Fast, Reliable Internet" class="w-full rounded-xl border border-gray-200 px-4 py-2.5 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Default meta description</label>
                    <textarea name="seo_meta_description" rows="2" placeholder="Short description for search results and link previews..." class="w-full rounded-xl border border-gray-200 px-4 py-2.5 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition resize-none">{{ old('seo_meta_description', $settings['seo_meta_description'] ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Share image (OG image)</label>
                    <p class="text-xs text-gray-500 mb-2">Used when the homepage is shared on social (Facebook, Twitter, etc.). Recommended: 1200×630 px. If empty, logo is used.</p>
                    @if(!empty($settings['og_image']))
                        <div class="flex items-center gap-4 mb-3 flex-wrap">
                            <img src="{{ asset('storage/' . $settings['og_image']) }}" alt="Current share image" class="h-24 w-auto object-contain rounded-lg border border-gray-200 bg-gray-50 p-1">
                            <span class="text-sm text-gray-500">Current share image</span>
                            <label class="inline-flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="remove_og_image" value="1" class="rounded border-gray-300 text-red-600 focus:ring-red-500">
                                <span class="text-sm text-red-600 font-medium">Remove</span>
                            </label>
                        </div>
                    @endif
                    <label class="cursor-pointer inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50 text-sm font-medium text-gray-700 hover:bg-gray-100 transition">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        Choose share image
                        <input type="file" name="og_image" accept="image/*" class="sr-only">
                    </label>
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
