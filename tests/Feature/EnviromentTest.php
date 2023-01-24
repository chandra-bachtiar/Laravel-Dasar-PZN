<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EnviromentTest extends TestCase
{
    public function testEnvironment()
    {
        $yt = env('IS_TESTING');
        self::assertEquals('Testing', $yt);
    }
}
