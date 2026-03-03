@extends('admin.layouts.app')

@section('title', isset($type) && $type === 'business' ? 'Business Internet Plans' : 'Home Internet Plans')
@section('page_title', isset($type) && $type === 'business' ? 'Business Internet Plans' : 'Home Internet Plans')

@section('content')
@php $type = $type ?? 'home'; @endphp
<div class="space-y-6">
    <div class="flex flex-wrap items-center justify-between gap-4">
        <div>
            <p class="text-sm text-gray-500 mt-0.5">{{ $type === 'business' ? 'Manage business internet packages.' : 'Manage home internet packages shown on the homepage and Home Internet page.' }}</p>
        </div>
        <div class="flex flex-wrap gap-2">
            <a href="{{ route('admin.internet-plans.index') }}?type=home" class="inline-flex items-center gap-2 py-2.5 px-5 rounded-xl font-semibold text-sm transition {{ $type === 'home' ? 'bg-blue-600 hover:bg-blue-700 text-white shadow-sm' : 'bg-gray-100 hover:bg-gray-200 text-gray-700' }}">
                <span>🏠</span> Home plans
            </a>
            <a href="{{ route('admin.internet-plans.index') }}?type=business" class="inline-flex items-center gap-2 py-2.5 px-5 rounded-xl font-semibold text-sm transition {{ $type === 'business' ? 'bg-blue-600 hover:bg-blue-700 text-white shadow-sm' : 'bg-gray-100 hover:bg-gray-200 text-gray-700' }}">
                <span>🏢</span> Business plans
            </a>
            <a href="{{ route('admin.internet-plans.create') }}?type={{ $type }}" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 px-5 rounded-xl shadow-sm transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Add {{ $type }} plan
            </a>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50/80">
                    <tr>
                        <th scope="col" class="px-5 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Plan</th>
                        <th scope="col" class="px-5 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider hidden sm:table-cell">Speed</th>
                        <th scope="col" class="px-5 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Price</th>
                        <th scope="col" class="px-5 py-3.5 text-right text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @forelse($plans as $plan)
                    <tr class="hover:bg-gray-50/50 transition">
                        <td class="px-5 py-4">
                            <div class="flex items-center gap-3">
                                @if($plan->image)
                                    <img src="{{ asset('storage/' . $plan->image) }}" alt="" class="h-12 w-16 object-cover rounded-lg border border-gray-200 flex-shrink-0">
                                @else
                                    <div class="h-12 w-16 rounded-lg bg-gray-100 border border-gray-200 flex-shrink-0 flex items-center justify-center text-gray-400 text-lg">{{ $plan->type === 'home' ? '🏠' : '🏢' }}</div>
                                @endif
                                <div class="min-w-0">
                                    <p class="font-medium text-gray-900">{{ $plan->name }}</p>
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium {{ $plan->type === 'business' ? 'bg-indigo-100 text-indigo-800' : 'bg-blue-50 text-blue-700' }}">
                                        {{ $plan->type }}
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td class="px-5 py-4 hidden sm:table-cell text-sm text-gray-600">{{ $plan->speed ?: '—' }}</td>
                        <td class="px-5 py-4">
                            <span class="font-semibold text-gray-900">{{ $plan->currency ?? 'KES' }} {{ number_format($plan->price) }}</span>
                            <span class="text-gray-500 text-sm">/mo</span>
                        </td>
                        <td class="px-5 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.internet-plans.edit', $plan) }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-sm font-medium text-blue-700 bg-blue-50 hover:bg-blue-100 transition">
                                    Edit
                                </a>
                                <form action="{{ route('admin.internet-plans.destroy', $plan) }}" method="POST" class="inline" onsubmit="return confirm('Delete this plan? This cannot be undone.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-sm font-medium text-red-700 bg-red-50 hover:bg-red-100 transition">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-5 py-12 text-center">
                            <p class="text-gray-500 mb-4">No {{ $type }} plans yet.</p>
                            <a href="{{ route('admin.internet-plans.create') }}?type={{ $type }}" class="inline-flex items-center gap-2 text-blue-600 font-medium hover:text-blue-700">
                                Add your first {{ $type }} plan
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($plans->hasPages())
            <div class="px-5 py-3 border-t border-gray-200 bg-gray-50/50">
                {{ $plans->withQueryString()->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
