<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CoverageArea;
use App\Models\County;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class CoverageController extends Controller
{
    public function index()
    {
        $settings = [
            'coverage_map_embed_url' => SiteSetting::get('coverage_map_embed_url'),
            'coverage_map_center' => SiteSetting::get('coverage_map_center'),
            'coverage_map_zoom' => SiteSetting::get('coverage_map_zoom'),
        ];
        $coverageZones = $this->getCoverageZonesForView();
        $kenyaLocations = $this->getKenyaLocationsForView();
        return view('admin.coverage.index', compact('settings', 'coverageZones', 'kenyaLocations'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'coverage_map_embed_url' => 'nullable|string',
            'coverage_map_center' => 'nullable|string|max:100',
            'coverage_map_zoom' => 'nullable|integer|min:1|max:18',
            'coverage_map_zones' => 'nullable|string|max:200000',
        ]);

        foreach (['coverage_map_embed_url', 'coverage_map_center', 'coverage_map_zoom'] as $key) {
            SiteSetting::set($key, $request->input($key, ''));
        }

        $savedCount = 0;
        $zonesJson = $request->input('coverage_map_zones');
        if ($zonesJson !== null && trim((string) $zonesJson) !== '') {
            $zones = is_string($zonesJson) ? json_decode($zonesJson, true) : $zonesJson;
            if (is_array($zones)) {
                try {
                    CoverageArea::query()->delete();
                    foreach ($zones as $idx => $zone) {
                        $name = $zone['name'] ?? 'Unnamed';
                        $coords = $zone['coords'] ?? [];
                        if (! is_array($coords)) {
                            $coords = [];
                        }
                        CoverageArea::create([
                            'name' => $name,
                            'coords' => $coords,
                            'sort_order' => $idx,
                        ]);
                        $savedCount++;
                    }
                } catch (\Throwable $e) {
                    Log::error('Coverage areas save failed: '.$e->getMessage(), ['trace' => $e->getTraceAsString()]);
                    return redirect()->route('admin.coverage.index')->with('error', 'Could not save coverage areas. Check the logs.');
                }
            } else {
                Log::warning('Coverage update: coverage_map_zones was not valid JSON or not an array.', ['length' => \strlen((string) $zonesJson), 'preview' => substr((string) $zonesJson, 0, 200)]);
            }
        } else {
            Log::warning('Coverage update: coverage_map_zones was empty or missing.', ['has_key' => $request->has('coverage_map_zones')]);
        }

        $message = $savedCount > 0
            ? "Coverage saved. {$savedCount} ".($savedCount === 1 ? 'area' : 'areas').' stored.'
            : 'Coverage settings saved.';
        return redirect()->route('admin.coverage.index')->with('success', $message);
    }

    public function geocode(Request $request)
    {
        try {
            $q = $request->input('q', '')->trim();
            if ($q === '') {
                return response()->json([
                    'lat' => -1.286389,
                    'lng' => 36.817223,
                    'display_name' => 'Nairobi, Kenya',
                ]);
            }

            $normalized = $this->normalizeGeocodeQuery($q);
            $fallback = config('geocode_fallback', []);

            if (isset($fallback[$normalized])) {
                $coords = $fallback[$normalized];
                return response()->json([
                    'lat' => (float) $coords[0],
                    'lng' => (float) $coords[1],
                    'display_name' => $q,
                ]);
            }

            foreach (['', ', kenya'] as $suffix) {
                $key = $normalized . $suffix;
                if (isset($fallback[$key])) {
                    $coords = $fallback[$key];
                    return response()->json([
                        'lat' => (float) $coords[0],
                        'lng' => (float) $coords[1],
                        'display_name' => $q,
                    ]);
                }
            }

            $parts = array_filter(array_map('trim', explode(',', $normalized)));
            if (count($parts) >= 2) {
                $key = implode(', ', array_slice($parts, -2));
                if (isset($fallback[$key])) {
                    $coords = $fallback[$key];
                    return response()->json([
                        'lat' => (float) $coords[0],
                        'lng' => (float) $coords[1],
                        'display_name' => $q,
                    ]);
                }
            }

            try {
                $url = 'https://nominatim.openstreetmap.org/search?' . http_build_query([
                    'q' => $q,
                    'format' => 'json',
                    'limit' => 1,
                ]);
                $response = Http::timeout(10)->withHeaders([
                    'User-Agent' => 'LivenetSolutions/1.0 (Coverage map admin; contact@livenet.co.ke)',
                    'Accept' => 'application/json',
                    'Accept-Language' => 'en',
                ])->get($url);

                if ($response->successful()) {
                    $data = $response->json();
                    if (is_array($data) && ! empty($data)) {
                        $first = $data[0];
                        if (is_array($first) && isset($first['lat'], $first['lon'])) {
                            $lat = (float) $first['lat'];
                            $lng = (float) $first['lon'];
                            $out = [
                                'lat' => $lat,
                                'lng' => $lng,
                                'display_name' => $first['display_name'] ?? $q,
                            ];
                            if (! empty($first['boundingbox']) && is_array($first['boundingbox']) && count($first['boundingbox']) >= 4) {
                                $bb = $first['boundingbox'];
                                $minLat = (float) $bb[0];
                                $maxLat = (float) $bb[1];
                                $minLon = (float) $bb[2];
                                $maxLon = (float) $bb[3];
                                $out['bbox'] = [$minLat, $maxLat, $minLon, $maxLon];
                            }
                            return response()->json($out);
                        }
                    }
                }
            } catch (\Throwable $e) {
                Log::warning('Geocode Nominatim failed: '.$e->getMessage());
            }

            return response()->json([
                'lat' => -1.286389,
                'lng' => 36.817223,
                'display_name' => $q.' (Nairobi area)',
            ]);
        } catch (\Throwable $e) {
            Log::error('Geocode error: '.$e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return response()->json([
                'lat' => -1.286389,
                'lng' => 36.817223,
                'display_name' => 'Nairobi, Kenya',
            ]);
        }
    }

    private function normalizeGeocodeQuery(string $q): string
    {
        $q = preg_replace('/\s*,\s*/', ', ', strtolower(trim($q)));
        $q = preg_replace('/\s+/', ' ', $q);
        return trim($q, " \t,");
    }

    private function getKenyaLocationsForView(): array
    {
        if (! Schema::hasTable('counties')) {
            return config('kenya_locations.counties', []);
        }
        $counties = County::with('areas')->orderBy('sort_order')->get();
        if ($counties->isEmpty()) {
            return config('kenya_locations.counties', []);
        }
        $out = [];
        foreach ($counties as $county) {
            $out[$county->name] = array_values($county->areas->pluck('name')->toArray());
        }
        return $out;
    }

    private function getCoverageZonesForView(): array
    {
        if (! Schema::hasTable('coverage_areas')) {
            return config('coverage.default_zones', []);
        }
        $areas = CoverageArea::orderBy('sort_order')->get();
        if ($areas->isEmpty()) {
            return config('coverage.default_zones', []);
        }
        return $areas->map(fn ($a) => ['name' => $a->name, 'coords' => $a->coords ?? []])->toArray();
    }
}
