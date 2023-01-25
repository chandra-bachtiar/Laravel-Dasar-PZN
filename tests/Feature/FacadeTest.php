<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Config;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FacadeTest extends TestCase
{
    public function testFacadeConfig() {
        //metode 1
        $firstname = config('contoh.name.first');
        $lastname = config('contoh.name.last');

        //metode 2
        $first = Config::get('contoh.name.first');
        $last = Config::get('contoh.name.last');

        //metode 3
        $config = $this->app->make('config');
        $first_name = $config->get('contoh.name.first');
        $last_name = $config->get('contoh.name.last');

        self::assertSame($firstname,$first);
        self::assertSame($lastname,$last);
        self::assertSame($firstname,$first_name);
        self::assertSame($lastname,$last_name);
    }

    public function testFacadeMocking() {
        //before mocking
        $firstname = Config::get('contoh.name.first');
        self::assertEquals('Chandra',$firstname);

        //after mocking
        Config::shouldReceive('get')
            ->with('contoh.name.first')
            ->andReturn('Chandra Mocked');

        $firstname = Config::get('contoh.name.first');

        self::assertSame('Chandra Mocked',$firstname);
    }
}
