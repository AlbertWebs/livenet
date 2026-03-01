@extends('admin.layouts.app')

@section('title', 'Testimonials')
@section('page_title', 'Testimonials')

@section('content')
<div class="mb-4"><a href="{{ route('admin.testimonials.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">Add Testimonial</a></div>
<div class="bg-white rounded-xl shadow overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Company</th>
                <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($testimonials as $t)
            <tr>
                <td class="px-4 py-3">{{ $t->name }}</td>
                <td class="px-4 py-3">{{ $t->company }}</td>
                <td class="px-4 py-3 text-right">
                    <a href="{{ route('admin.testimonials.edit', $t) }}" class="text-blue-600 mr-2">Edit</a>
                    <form action="{{ route('admin.testimonials.destroy', $t) }}" method="POST" class="inline">@csrf @method('DELETE')<button type="submit" class="text-red-600" onclick="return confirm('Delete?')">Delete</button></form>
                </td>
            </tr>
            @empty
            <tr><td colspan="3" class="px-4 py-8 text-center text-gray-500">No testimonials yet.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="px-4 py-3 border-t">{{ $testimonials->links() }}</div>
</div>
@endsection
