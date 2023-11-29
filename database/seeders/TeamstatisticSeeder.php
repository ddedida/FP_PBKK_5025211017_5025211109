<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\Season;
use App\Models\Teamstatistic;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TeamstatisticSeeder extends Seeder
{
    public function run(): void
    {
        $teams = Team::all();
        $season = Season::first();
        $seasonId = $season->id;

        foreach ($teams as $team) {
            Teamstatistic::updateOrCreate([
                'win' => 0,
                'draw' => 0,
                'lose' => 0,
                'goal_for' => 0,
                'goal_againts' => 0,
                'goal_diff' => 0,
                'played' => 0,
                'points' => 0,
                'season_id' => $seasonId,
                'team_id' => $team->id,
            ]);
        }
    }
}
