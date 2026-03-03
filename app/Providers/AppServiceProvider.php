<?php

namespace App\Providers;

use App\Models\CoverageArea;
use App\Models\InternetPlan;
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
        View::composer('*', function ($view) {
            $view->with('siteSettings', Schema::hasTable('site_settings')
                ? Cache::remember('site_settings', 3600, fn () => SiteSetting::pluck('value', 'key')->toArray())
                : []);
        });

        View::composer(['home', 'home-internet'], function ($view) {
            if (! Schema::hasTable('internet_plans')) {
                $view->with('homePlans', collect());
                return;
            }
            $view->with('homePlans', InternetPlan::where('type', 'home')->orderBy('sort_order')->get());
        });

        View::composer('home', function ($view) {
            if (! Schema::hasTable('internet_plans')) {
                $view->with('businessPlans', collect());
            } else {
                $view->with('businessPlans', InternetPlan::where('type', 'business')->orderBy('sort_order')->get());
            }
            $coverageZonesForMap = [];
            if (Schema::hasTable('coverage_areas')) {
                $areas = CoverageArea::orderBy('sort_order')->get();
                if ($areas->isNotEmpty()) {
                    $coverageZonesForMap = $areas->map(fn ($a) => ['name' => $a->name, 'coords' => $a->coords ?? []])->toArray();
                }
            }
            if (empty($coverageZonesForMap)) {
                $coverageZonesForMap = config('coverage.default_zones', []);
            }
            $view->with('coverageZonesForMap', $coverageZonesForMap);
        });

        View::composer('our-coverage', function ($view) {
            $coverageAreas = Schema::hasTable('coverage_areas')
                ? CoverageArea::orderBy('sort_order')->get()
                : collect();
            $view->with('coverageAreas', $coverageAreas);
        });
    }
}
