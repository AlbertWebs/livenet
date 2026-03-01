@extends('admin.layouts.app')

@section('title', 'Articles')
@section('page_title', 'Articles')

@section('content')
<div class="mb-4"><a href="{{ route('admin.articles.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">Add Article</a></div>
<div class="bg-white rounded-xl shadow overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach($articles as $article)
            <tr>
                <td class="px-4 py-3">{{ $article->title }}</td>
                <td class="px-4 py-3">{{ $article->status }}</td>
                <td class="px-4 py-3 text-right">
                    <a href="{{ route('admin.articles.edit', $article) }}" class="text-blue-600 mr-2">Edit</a>
                    <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @if($articles->isEmpty())
    <p class="px-4 py-8 text-center text-gray-500">No articles yet.</p>
    @endif
    <div class="px-4 py-3 border-t">{{ $articles->links() }}</div>
</div>
@endsection
