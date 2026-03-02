<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\County;
use Illuminate\Database\Seeder;

class KenyaLocationsSeeder extends Seeder
{
    public function run(): void
    {
        $data = config('kenya_locations.counties', []);
        if (empty($data)) {
            return;
        }

        $sortOrder = 0;
        foreach ($data as $countyName => $areaNames) {
            $county = County::updateOrCreate(
                ['name' => $countyName],
                ['sort_order' => $sortOrder++]
            );
            $areaSort = 0;
            foreach (array_values($areaNames) as $areaName) {
                Area::updateOrCreate(
                    ['county_id' => $county->id, 'name' => $areaName],
                    ['sort_order' => $areaSort++]
                );
            }
        }
    }
}
