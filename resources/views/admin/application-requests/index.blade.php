@extends('admin.layouts.app')

@section('title', 'Application Requests')
@section('page_title', 'Application Requests')

@section('content')
<div class="bg-white rounded-xl shadow overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Phone</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Service</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Message</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($applications as $app)
                <tr>
                    <td class="px-4 py-3 text-sm text-gray-600 whitespace-nowrap">{{ $app->created_at->format('M j, Y H:i') }}</td>
                    <td class="px-4 py-3 font-medium text-gray-900">{{ $app->name }}</td>
                    <td class="px-4 py-3">
                        <a href="mailto:{{ $app->email }}" class="text-blue-600 hover:underline">{{ $app->email }}</a>
                    </td>
                    <td class="px-4 py-3 text-gray-600">
                        @if($app->phone)
                            <a href="tel:{{ preg_replace('/\D/', '', $app->phone) }}" class="text-blue-600 hover:underline">{{ $app->phone }}</a>
                        @else
                            —
                        @endif
                    </td>
                    <td class="px-4 py-3 text-gray-600">
                        @if($app->service === 'home') Home Internet
                        @elseif($app->service === 'business') Business Internet
                        @else —
                        @endif
                    </td>
                    <td class="px-4 py-3 text-sm text-gray-600 max-w-xs truncate" title="{{ $app->message }}">{{ $app->message ?: '—' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-4 py-8 text-center text-gray-500">No application requests yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="px-4 py-3 border-t bg-gray-50">{{ $applications->links() }}</div>
</div>
@endsection
