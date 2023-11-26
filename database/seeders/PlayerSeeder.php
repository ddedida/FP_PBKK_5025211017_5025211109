<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\Player;
use App\Models\Country;
use App\Models\Position;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PlayerSeeder extends Seeder
{
    public function run(): void
    {
        $teams = Team::all();
        $countries = Country::all();
        $positions = Position::all();

        foreach ($teams as $team) {
            foreach (range(1, 20) as $index) {
                Player::factory()->create([
                    'team_id' => $team->id,
                    'country_id' => $countries->random()->id,
                    'position_id' => $positions->random()->id,
                ]);
            }
        }
    }
}
