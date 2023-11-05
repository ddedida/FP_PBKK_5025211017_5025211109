<?php

namespace Tests\Feature;

use Tests\TestCase;


class RoutingTest extends TestCase
{
    public function test_example(): void
    {
        $this->get("/routingtest")->assertStatus(200);
    }
}
