<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConfigTest extends TestCase
{
    public function testConfig() {
        $firsname = config('contoh.name.first');
        $lastname = config('contoh.name.last');
        $email = config('contoh.email');
        $homephone = config('contoh.phone.home');
        $mobilephone = config('contoh.phone.mobile');

        self::assertEquals('Chandra', $firsname);
        self::assertEquals('Bachtiar', $lastname);
        self::assertEquals('CB@chand.my.id', $email);
        self::assertEquals('021-123456', $homephone);
        self::assertEquals('081234567890', $mobilephone);
    }
}
