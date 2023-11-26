<?php

namespace Database\Seeders;

use App\Models\Coach;
use App\Models\Country;
use App\Models\Team;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CoachSeeder extends Seeder
{
    public function run(): void
    {
        $teams = Team::all();
        $countries = Country::all();

        foreach ($teams as $team) {
            Coach::factory()->create([
                'team_id' => $team->id,
                'country_id' => $countries->random()->id
            ]);
        }
    }
}
