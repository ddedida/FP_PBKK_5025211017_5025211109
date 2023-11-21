<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teamsJson = file_get_contents(storage_path('../database/teams.json'));
        $teams = json_decode($teamsJson, true);

        foreach ($teams as $team) {
            Team::updateOrCreate(
                ['id' => $team['team_id']],
                [
                    'team_name' => $team['team_name'],
                    'homebase' => $team['homebase'],
                    'city' => $team['city']
                ]
            );
        }
    }
}
