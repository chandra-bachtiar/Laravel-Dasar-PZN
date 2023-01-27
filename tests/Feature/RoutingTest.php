<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutingTest extends TestCase
{
    public function testGet()
    {
        $this->get('/chand')
            ->assertStatus(200)
            ->assertSeeText("Hello Chand!");
    }

    public function testRedirect()
    {
        $this->get('/bachtiar')
            ->assertRedirect('/chand');
    }

    public function testFallback()
    {
        $this->get('/404')
            ->assertSeeText("404:Not Found!");
    }
}
