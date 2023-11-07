<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class SimpleMultiplicationTest extends TestCase
{
    public function test_multiplication_of_two_number(): void
    {
        $a = 4;
        $b = 5;
        $c = $a * $b;

        $this->assertEquals($c, 20);
    }
}
