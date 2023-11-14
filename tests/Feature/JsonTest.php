<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class JsonTest extends TestCase
{
    public function test_json(): void
    {
        $response = $this->get('/json-test');

        $response->assertStatus(200);
        $response->assertJson([
            'name' => 'Dewangga',
        ]);
    }
}
