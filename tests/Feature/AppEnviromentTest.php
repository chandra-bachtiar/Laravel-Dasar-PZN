<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class AppEnviromentTest extends TestCase
{
    public function testEnvironment()
    {
        if (App::environment('testing')) {
            self::assertTrue(true);
        } else {
            self::assertTrue(false);
        }
    }
}
