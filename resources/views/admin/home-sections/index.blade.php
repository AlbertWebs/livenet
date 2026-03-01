@extends('admin.layouts.app')

@section('title', 'Home Sections')
@section('page_title', 'Home Sections')

@section('content')
<div class="mb-4"><a href="{{ route('admin.home-sections.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">Add Section</a></div>
<div class="bg-white rounded-xl shadow overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Active</th>
                <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($sections as $section)
            <tr>
                <td class="px-4 py-3">{{ $section->name }}</td>
                <td class="px-4 py-3">{{ $section->title }}</td>
                <td class="px-4 py-3">{{ $section->is_active ? 'Yes' : 'No' }}</td>
                <td class="px-4 py-3 text-right"><a href="{{ route('admin.home-sections.edit', $section) }}" class="text-blue-600">Edit</a></td>
            </tr>
            @empty
            <tr><td colspan="4" class="px-4 py-8 text-center text-gray-500">No sections yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
