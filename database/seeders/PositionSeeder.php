<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $positionsJson = file_get_contents(storage_path('../database/positions.json'));
        $positions = json_decode($positionsJson, true);

        foreach ($positions as $position) {
            Position::updateOrcreate([
                'position' => $position['position']
            ]);
        }
    }
}