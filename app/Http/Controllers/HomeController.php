<?php

namespace App\Http\Controllers;

use App\Models\CoverageArea;
use App\Models\HomeSection;
use App\Models\InternetPlan;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;

class HomeController extends Controller
{
    /**
     * Homepage: all content (including images) is loaded from the database.
     */
    public function index()
    {
        $siteSettings = $this->getSiteSettings();
        $homeSections = $this->getHomeSectionsKeyedByName();
        $homePlans = $this->getHomePlans();
        $businessPlans = $this->getBusinessPlans();
        $coverageZonesForMap = $this->getCoverageZonesForMap();

        return view('home', [
            'siteSettings' => $siteSettings,
            'homeSections' => $homeSections,
            'homePlans' => $homePlans,
            'businessPlans' => $businessPlans,
            'coverageZonesForMap' => $coverageZonesForMap,
        ]);
    }

    protected function getSiteSettings(): array
    {
        if (! Schema::hasTable('site_settings')) {
            return [];
        }

        return Cache::remember('site_settings', 3600, fn () => SiteSetting::pluck('value', 'key')->toArray());
    }

    protected function getHomeSectionsKeyedByName(): array
    {
        if (! Schema::hasTable('home_sections')) {
            return [];
        }

        $sections = HomeSection::where('is_active', true)->orderBy('sort_order')->get();

        return $sections->keyBy('name')->all();
    }

    protected function getHomePlans()
    {
        if (! Schema::hasTable('internet_plans')) {
            return collect();
        }

        return InternetPlan::where('type', 'home')->orderBy('sort_order')->get();
    }

    protected function getBusinessPlans()
    {
        if (! Schema::hasTable('internet_plans')) {
            return collect();
        }

        return InternetPlan::where('type', 'business')->orderBy('sort_order')->get();
    }

    protected function getCoverageZonesForMap(): array
    {
        if (Schema::hasTable('coverage_areas')) {
            $areas = CoverageArea::orderBy('sort_order')->get();
            if ($areas->isNotEmpty()) {
                return $areas->map(fn ($a) => ['name' => $a->name, 'coords' => $a->coords ?? []])->toArray();
            }
        }

        return config('coverage.default_zones', []);
    }
}
