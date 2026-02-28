<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') | Livenet CMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="flex">
        {{-- Sidebar --}}
        <aside id="sidebar" class="fixed lg:static inset-y-0 left-0 z-40 w-64 bg-gray-900 text-gray-300 transform -translate-x-full lg:translate-x-0 transition-transform duration-200">
            <div class="flex flex-col h-full">
                <div class="p-6 border-b border-gray-700">
                    <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold text-white">Livenet CMS</a>
                </div>
                <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white' : 'hover:bg-gray-800' }}">
                        <span>📊</span> Dashboard
                    </a>
                    <a href="{{ route('admin.pages.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg {{ request()->routeIs('admin.pages.*') ? 'bg-blue-600 text-white' : 'hover:bg-gray-800' }}">
                        <span>📄</span> Pages
                    </a>
                    <a href="{{ route('admin.home-sections.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg {{ request()->routeIs('admin.home-sections.*') ? 'bg-blue-600 text-white' : 'hover:bg-gray-800' }}">
                        <span>🏠</span> Home Sections
                    </a>
                    <a href="{{ route('admin.internet-plans.index') }}?type=home" class="flex items-center gap-3 px-3 py-2 rounded-lg {{ request()->routeIs('admin.internet-plans.*') && request('type') != 'business' ? 'bg-blue-600 text-white' : 'hover:bg-gray-800' }}">
                        <span>📶</span> Home Internet
                    </a>
                    <a href="{{ route('admin.internet-plans.index') }}?type=business" class="flex items-center gap-3 px-3 py-2 rounded-lg {{ request()->routeIs('admin.internet-plans.*') && request('type') == 'business' ? 'bg-blue-600 text-white' : 'hover:bg-gray-800' }}">
                        <span>🏢</span> Business Internet
                    </a>
                    <a href="{{ route('admin.articles.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg {{ request()->routeIs('admin.articles.*') ? 'bg-blue-600 text-white' : 'hover:bg-gray-800' }}">
                        <span>📝</span> Articles
                    </a>
                    <a href="{{ route('admin.testimonials.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg {{ request()->routeIs('admin.testimonials.*') ? 'bg-blue-600 text-white' : 'hover:bg-gray-800' }}">
                        <span>💬</span> Testimonials
                    </a>
                    <a href="{{ route('admin.media.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg {{ request()->routeIs('admin.media.*') ? 'bg-blue-600 text-white' : 'hover:bg-gray-800' }}">
                        <span>🖼️</span> Media Manager
                    </a>
                    <a href="{{ route('admin.settings.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg {{ request()->routeIs('admin.settings.*') ? 'bg-blue-600 text-white' : 'hover:bg-gray-800' }}">
                        <span>⚙️</span> Site Settings
                    </a>
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-800">
                        <span>👥</span> Users
                    </a>
                </nav>
                <div class="p-4 border-t border-gray-700">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center gap-3 w-full px-3 py-2 rounded-lg hover:bg-gray-800 text-left">
                            <span>🚪</span> Logout
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <div class="flex-1 flex flex-col min-h-screen lg:ml-0">
            {{-- Top Header --}}
            <header class="sticky top-0 z-30 bg-white border-b border-gray-200 px-4 py-3 flex items-center justify-between">
                <button type="button" id="sidebar-toggle" class="lg:hidden p-2 rounded-lg hover:bg-gray-100" aria-label="Toggle menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
                <h1 class="text-lg font-semibold text-gray-800">@yield('page_title', 'Dashboard')</h1>
                <div class="relative" x-data="{ open: false }">
                    <button type="button" class="flex items-center gap-2 p-2 rounded-lg hover:bg-gray-100" onclick="this.nextElementSibling.classList.toggle('hidden')">
                        <span class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center text-white text-sm font-medium">{{ substr(auth()->user()->name ?? 'A', 0, 1) }}</span>
                        <span class="hidden sm:inline text-gray-700">{{ auth()->user()->name ?? 'Admin' }}</span>
                    </button>
                    <div class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 py-1">
                        <a href="{{ route('admin.settings.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</button>
                        </form>
                    </div>
                </div>
            </header>

            <main class="flex-1 p-4 lg:p-6">
                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-50 border border-green-200 rounded-lg text-green-800">{{ session('success') }}</div>
                @endif
                @if (session('error'))
                    <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-lg text-red-800">{{ session('error') }}</div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        document.getElementById('sidebar-toggle')?.addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('-translate-x-full');
        });
    </script>
    @stack('scripts')
</body>
</html>
