<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Club;
use Database\Seeders\DatabaseSeeder;

class DatabaseTest extends TestCase
{
    public function test_seeder()
    {
        // Cek jumlah data yang ada di database
        // $this->assertDatabaseCount('clubs', 25);

        // Cek jumlah data yang di-seed dan yang nanti ada di database
        // $this->seed(DatabaseSeeder::class);
        // $this->assertDatabaseCount('clubs', 25);

        // Cek jumlah data dari club yang berasal dari Surabaya
        $this->assertDatabaseHas('clubs', ['city' => 'Surabaya']);
    }
}