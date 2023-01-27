<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewTest extends TestCase
{
    public function testView()
    {
        $this->get('/hello')
            ->assertSeeText("Hello Chand");

        $this->get('/hello-chand')
            ->assertSeeText("Hello Chand!");
    }

    public function testViewNested()
    {
        $this->get('/world')
            ->assertSeeText("World Chand");

        $this->get('/world-chand')
            ->assertSeeText("World Chand!");
    }

    public function testTemplate()
    {
        $this->view('hello',["name"=>"Hello Chand"])
            ->assertSeeText("Hello Chand");
    }
}
