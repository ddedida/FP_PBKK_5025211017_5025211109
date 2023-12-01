<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Club;
use App\Models\Player;
use App\Models\Teamstatistic;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //Club::factory(25)->create();
        // Player::factory(100)->create();
        $this->call([
            AdminSeeder::class,
            CoachSeeder::class,
            CountrySeeder::class,
            PlayerSeeder::class,
            PositionSeeder::class,
            SeasonSeeder::class,
            TeamSeeder::class,
            TeamstatisticSeeder::class,
        ]);

    }
}
