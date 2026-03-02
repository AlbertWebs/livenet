<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') | Livenet CMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="flex h-screen overflow-hidden">
        {{-- Sidebar --}}
        <aside id="sidebar" class="fixed lg:static inset-y-0 left-0 z-40 w-64 h-screen lg:h-full flex-shrink-0 bg-gray-900 text-gray-300 transform -translate-x-full lg:translate-x-0 transition-transform duration-200 border-r border-gray-700/80 shadow-xl overflow-hidden flex flex-col">
            <div class="flex flex-col h-full min-h-0 overflow-hidden">
                <div class="p-5 border-b border-gray-700/80">
                    <a href="{{ route('admin.dashboard') }}" class="flex flex-col items-center gap-2">
                        @if(!empty($siteSettings['favicon'] ?? null))
                            <img src="{{ asset('storage/' . $siteSettings['favicon']) }}" alt="" class="h-10 w-10 object-contain rounded-lg bg-white/10 p-1 shrink-0" aria-hidden="true">
                        @else
                            <span class="h-10 w-10 rounded-lg bg-blue-600 flex items-center justify-center text-white font-bold text-lg shrink-0" aria-hidden="true">L</span>
                        @endif
                        <span class="text-xl font-bold text-white tracking-tight">Livenet CMS</span>
                    </a>
                </div>
                <nav class="flex-1 p-3 space-y-0 overflow-y-auto border-b border-gray-700/50 [&>a:last-child]:border-b-0">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg border-b border-gray-700/50 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white' : 'hover:bg-gray-800 hover:text-white' }} transition">
                        <span>📊</span> Dashboard
                    </a>
                    <a href="{{ route('admin.pages.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg border-b border-gray-700/50 {{ request()->routeIs('admin.pages.*') ? 'bg-blue-600 text-white' : 'hover:bg-gray-800 hover:text-white' }} transition">
                        <span>📄</span> Pages
                    </a>
                    <a href="{{ route('admin.home-sections.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg border-b border-gray-700/50 {{ request()->routeIs('admin.home-sections.*') ? 'bg-blue-600 text-white' : 'hover:bg-gray-800 hover:text-white' }} transition">
                        <span>🏠</span> Home Sections
                    </a>
                    <a href="{{ route('admin.internet-plans.index') }}?type=home" class="flex items-center gap-3 px-3 py-2.5 rounded-lg border-b border-gray-700/50 {{ request()->routeIs('admin.internet-plans.*') && request('type') != 'business' ? 'bg-blue-600 text-white' : 'hover:bg-gray-800 hover:text-white' }} transition">
                        <span>📶</span> Home Internet
                    </a>
                    <a href="{{ route('admin.internet-plans.index') }}?type=business" class="flex items-center gap-3 px-3 py-2.5 rounded-lg border-b border-gray-700/50 {{ request()->routeIs('admin.internet-plans.*') && request('type') == 'business' ? 'bg-blue-600 text-white' : 'hover:bg-gray-800 hover:text-white' }} transition">
                        <span>🏢</span> Business Internet
                    </a>
                    <a href="{{ route('admin.articles.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg border-b border-gray-700/50 {{ request()->routeIs('admin.articles.*') ? 'bg-blue-600 text-white' : 'hover:bg-gray-800 hover:text-white' }} transition">
                        <span>📝</span> Articles
                    </a>
                    <a href="{{ route('admin.testimonials.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg border-b border-gray-700/50 {{ request()->routeIs('admin.testimonials.*') ? 'bg-blue-600 text-white' : 'hover:bg-gray-800 hover:text-white' }} transition">
                        <span>💬</span> Testimonials
                    </a>
                    <a href="{{ route('admin.media.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg border-b border-gray-700/50 {{ request()->routeIs('admin.media.*') ? 'bg-blue-600 text-white' : 'hover:bg-gray-800 hover:text-white' }} transition">
                        <span>🖼️</span> Media Manager
                    </a>
                    <a href="{{ route('admin.coverage.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg border-b border-gray-700/50 {{ request()->routeIs('admin.coverage.*') ? 'bg-blue-600 text-white' : 'hover:bg-gray-800 hover:text-white' }} transition">
                        <span>🗺️</span> Coverage
                    </a>
                    <a href="{{ route('admin.settings.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg border-b border-gray-700/50 {{ request()->routeIs('admin.settings.*') ? 'bg-blue-600 text-white' : 'hover:bg-gray-800 hover:text-white' }} transition">
                        <span>⚙️</span> Site Settings
                    </a>
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg border-b border-gray-700/50 hover:bg-gray-800 hover:text-white transition">
                        <span>👥</span> Users
                    </a>
                </nav>
                <div class="p-3 border-t border-gray-700/80">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center gap-3 w-full px-3 py-2.5 rounded-lg border border-gray-600/60 hover:bg-gray-800 hover:border-gray-600 text-left text-sm font-medium transition">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <div class="flex-1 flex flex-col min-h-0 overflow-hidden lg:ml-0">
            {{-- Top Header --}}
            <header class="flex-shrink-0 z-30 bg-white border-b border-gray-200 px-4 py-3 flex items-center justify-between shadow-sm">
                <button type="button" id="sidebar-toggle" class="lg:hidden p-2.5 rounded-lg border border-gray-200 hover:bg-gray-50" aria-label="Toggle menu">
                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
                <h1 class="text-lg font-semibold text-gray-800">@yield('page_title', 'Dashboard')</h1>
                <div class="relative" id="header-user-dropdown">
                    <button type="button" id="header-user-btn" class="flex items-center gap-2 px-3 py-2 rounded-lg border border-gray-200 hover:bg-gray-50 hover:border-gray-300 transition" aria-expanded="false" aria-haspopup="true">
                        <span class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center text-white text-sm font-medium shrink-0">{{ substr(auth()->user()->name ?? 'A', 0, 1) }}</span>
                        <span class="hidden sm:inline text-gray-700 font-medium text-sm">{{ auth()->user()->name ?? 'Admin' }}</span>
                        <svg class="w-4 h-4 text-gray-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div id="header-user-menu" class="hidden absolute right-0 mt-2 w-52 bg-white rounded-xl shadow-lg border border-gray-200 py-1.5 z-50">
                        <div class="px-4 py-2.5 border-b border-gray-100">
                            <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Account</p>
                            <p class="text-sm font-medium text-gray-800 truncate">{{ auth()->user()->name ?? 'Admin' }}</p>
                            <p class="text-xs text-gray-500 truncate">{{ auth()->user()->email ?? '' }}</p>
                        </div>
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6z"/></svg>
                            Dashboard
                        </a>
                        <a href="{{ route('admin.settings.index') }}" class="flex items-center gap-2 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            Settings
                        </a>
                        <div class="border-t border-gray-100 mt-1 pt-1">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="flex items-center gap-2 w-full px-4 py-2.5 text-sm text-red-600 hover:bg-red-50">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-1 min-h-0 overflow-y-auto p-4 lg:p-6">
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

        (function() {
            var btn = document.getElementById('header-user-btn');
            var menu = document.getElementById('header-user-menu');
            if (!btn || !menu) return;
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                var open = menu.classList.toggle('hidden');
                btn.setAttribute('aria-expanded', !open);
            });
            document.addEventListener('click', function() {
                menu.classList.add('hidden');
                btn.setAttribute('aria-expanded', 'false');
            });
        })();
    </script>
    @stack('scripts')
</body>
</html>
