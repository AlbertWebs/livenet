@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
    <div class="bg-white rounded-xl shadow p-6">
        <p class="text-gray-500 text-sm">Pages</p>
        <p class="text-2xl font-bold">{{ $pagesCount }}</p>
        <a href="{{ route('admin.pages.index') }}" class="text-blue-600 text-sm">View all</a>
    </div>
    <div class="bg-white rounded-xl shadow p-6">
        <p class="text-gray-500 text-sm">Internet Plans</p>
        <p class="text-2xl font-bold">{{ $plansCount }}</p>
        <a href="{{ route('admin.internet-plans.index') }}" class="text-blue-600 text-sm">View all</a>
    </div>
    <div class="bg-white rounded-xl shadow p-6">
        <p class="text-gray-500 text-sm">Articles</p>
        <p class="text-2xl font-bold">{{ $articlesCount }}</p>
        <a href="{{ route('admin.articles.index') }}" class="text-blue-600 text-sm">View all</a>
    </div>
    <div class="bg-white rounded-xl shadow p-6">
        <p class="text-gray-500 text-sm">Testimonials</p>
        <p class="text-2xl font-bold">{{ $testimonialsCount }}</p>
        <a href="{{ route('admin.testimonials.index') }}" class="text-blue-600 text-sm">View all</a>
    </div>
</div>
<div class="bg-white rounded-xl shadow p-6">
    <h2 class="text-lg font-semibold mb-4">Welcome to Livenet CMS</h2>
    <p class="text-gray-600">Manage your website content from the sidebar.</p>
</div>
@endsection
