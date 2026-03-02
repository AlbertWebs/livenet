<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('coverage_areas')) {
            return;
        }

        if (DB::table('coverage_areas')->exists()) {
            return;
        }

        $zones = config('coverage.default_zones', []);
        $raw = DB::table('site_settings')->where('key', 'coverage_map_zones')->value('value');
        if ($raw !== null && $raw !== '') {
            $decoded = json_decode($raw, true);
            if (is_array($decoded) && ! empty($decoded)) {
                $zones = $decoded;
            }
        }

        foreach ($zones as $idx => $zone) {
            $name = $zone['name'] ?? 'Unnamed';
            $coords = $zone['coords'] ?? [];
            if (is_array($coords) && ! empty($coords)) {
                DB::table('coverage_areas')->insert([
                    'name' => $name,
                    'coords' => json_encode($coords),
                    'sort_order' => $idx,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }

    public function down(): void
    {
        // no-op
    }
};
