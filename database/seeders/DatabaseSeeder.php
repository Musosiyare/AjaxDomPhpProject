<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Country;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $json_data = file_get_contents('provinces_info.json');
        $data = json_decode($json_data, true);
        foreach ($data as $province => $districts) {
            foreach($districts as $district) {
                Country::create([
                    "province" => $province,
                    "district" => $district
                ]);
            }
        }
    }
}
