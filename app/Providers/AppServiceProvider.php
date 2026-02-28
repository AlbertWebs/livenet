<?php

namespace App\Providers;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::share('siteSettings', Schema::hasTable('site_settings') ? Cache::remember('site_settings', 3600, fn () => SiteSetting::pluck('value', 'key')->toArray()) : []);
    }
}
