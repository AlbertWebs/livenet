@extends('admin.layouts.app')

@section('title', 'Internet Plans')
@section('page_title', 'Internet Plans')

@section('content')
<div class="mb-4 flex gap-2">
    <a href="{{ route('admin.internet-plans.create') }}?type=home" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">Add Home Plan</a>
    <a href="{{ route('admin.internet-plans.create') }}?type=business" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg">Add Business Plan</a>
</div>
<div class="bg-white rounded-xl shadow overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Type</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Price</th>
                <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($plans as $plan)
            <tr class="divide-y divide-gray-200">
                <td class="px-4 py-3">{{ $plan->type }}</td>
                <td class="px-4 py-3">{{ $plan->name }}</td>
                <td class="px-4 py-3">{{ $plan->currency }} {{ number_format($plan->price) }}/mo</td>
                <td class="px-4 py-3 text-right">
                    <a href="{{ route('admin.internet-plans.edit', $plan) }}" class="text-blue-600 mr-2">Edit</a>
                    <form action="{{ route('admin.internet-plans.destroy', $plan) }}" method="POST" class="inline">@csrf @method('DELETE')<button type="submit" class="text-red-600" onclick="return confirm('Delete?')">Delete</button></form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="px-4 py-3 border-t">{{ $plans->links() }}</div>
</div>
@endsection
