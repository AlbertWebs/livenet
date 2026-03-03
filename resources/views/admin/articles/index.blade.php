@extends('admin.layouts.app')

@section('title', 'Articles')
@section('page_title', 'Articles')

@section('content')
<div class="space-y-6">
    <div class="flex flex-wrap items-center justify-between gap-4">
        <div>
            <p class="text-sm text-gray-500 mt-0.5">Create and manage blog articles.</p>
        </div>
        <a href="{{ route('admin.articles.create') }}" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 px-5 rounded-xl shadow-sm transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Add article
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50/80">
                    <tr>
                        <th scope="col" class="px-5 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Article</th>
                        <th scope="col" class="px-5 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider hidden sm:table-cell">Category</th>
                        <th scope="col" class="px-5 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider hidden md:table-cell">Excerpt</th>
                        <th scope="col" class="px-5 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-5 py-3.5 text-right text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @forelse($articles as $article)
                    <tr class="hover:bg-gray-50/50 transition">
                        <td class="px-5 py-4">
                            <div class="flex items-center gap-3">
                                @if($article->featured_image)
                                    <img src="{{ asset('storage/' . $article->featured_image) }}" alt="" class="h-12 w-16 object-cover rounded-lg border border-gray-200 flex-shrink-0">
                                @else
                                    <div class="h-12 w-16 rounded-lg bg-gray-100 border border-gray-200 flex-shrink-0 flex items-center justify-center text-gray-400 text-xs">No img</div>
                                @endif
                                <div class="min-w-0">
                                    <p class="font-medium text-gray-900 truncate max-w-[200px] sm:max-w-none">{{ $article->title }}</p>
                                    <p class="text-xs text-gray-500 truncate max-w-[200px] sm:max-w-none">{{ $article->slug }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-5 py-4 hidden sm:table-cell">
                            <span class="text-sm text-gray-600">{{ $article->category ?: '—' }}</span>
                        </td>
                        <td class="px-5 py-4 hidden md:table-cell max-w-xs">
                            <p class="text-sm text-gray-500 truncate" title="{{ $article->excerpt }}">{{ $article->excerpt ? Str::limit(strip_tags($article->excerpt), 50) : '—' }}</p>
                        </td>
                        <td class="px-5 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $article->status === 'published' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-700' }}">
                                {{ $article->status }}
                            </span>
                        </td>
                        <td class="px-5 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.articles.edit', $article) }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-sm font-medium text-blue-700 bg-blue-50 hover:bg-blue-100 transition">
                                    Edit
                                </a>
                                <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" class="inline" onsubmit="return confirm('Delete this article? This cannot be undone.');">
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
                        <td colspan="5" class="px-5 py-12 text-center">
                            <p class="text-gray-500 mb-4">No articles yet.</p>
                            <a href="{{ route('admin.articles.create') }}" class="inline-flex items-center gap-2 text-blue-600 font-medium hover:text-blue-700">
                                Create your first article
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($articles->hasPages())
            <div class="px-5 py-3 border-t border-gray-200 bg-gray-50/50">
                {{ $articles->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
