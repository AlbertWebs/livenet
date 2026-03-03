@extends('admin.layouts.app')

@section('title', 'Home Sections')
@section('page_title', 'Home Sections')

@section('content')
<div class="space-y-6">
    <div class="flex flex-wrap items-center justify-between gap-4">
        <div>
            <p class="text-sm text-gray-500 mt-0.5">Edit hero, features, testimonials, and CTA content shown on the homepage.</p>
        </div>
        <a href="{{ route('admin.home-sections.create') }}" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 px-5 rounded-xl shadow-sm transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Add section
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50/80">
            <tr>
                <th scope="col" class="px-5 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Section</th>
                <th scope="col" class="px-5 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider hidden sm:table-cell">Title</th>
                <th scope="col" class="px-5 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Active</th>
                <th scope="col" class="px-5 py-3.5 text-right text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 bg-white">
            @forelse($sections as $section)
            <tr class="hover:bg-gray-50/50 transition">
                <td class="px-5 py-4">
                    <div class="flex items-center gap-2">
                        <span class="font-medium text-gray-900">{{ $section->name }}</span>
                        <span class="text-xs text-gray-400">#{{ $section->sort_order }}</span>
                    </div>
                </td>
                <td class="px-5 py-4 hidden sm:table-cell">
                    <p class="text-sm text-gray-600 truncate max-w-xs">{{ $section->title ?: '—' }}</p>
                </td>
                <td class="px-5 py-4">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $section->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-600' }}">
                        {{ $section->is_active ? 'Yes' : 'No' }}
                    </span>
                </td>
                <td class="px-5 py-4 text-right">
                    <a href="{{ route('admin.home-sections.edit', $section) }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-sm font-medium text-blue-700 bg-blue-50 hover:bg-blue-100 transition">
                        Edit
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="px-5 py-12 text-center">
                    <p class="text-gray-500 mb-4">No sections yet.</p>
                    <a href="{{ route('admin.home-sections.create') }}" class="inline-flex items-center gap-2 text-blue-600 font-medium hover:text-blue-700">
                        Create your first section
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
    </div>
</div>
@endsection
