<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use PHPUnit\Framework\Constraint\Count;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countriesJson = file_get_contents(storage_path('../database/countries.json'));
        $countries = json_decode($countriesJson, true);

        foreach ($countries as $country) {
            Country::updateOrCreate([
                'country_name' => $country,
            ]);
        }
    }
}
