<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ControllerTest extends TestCase
{
    public function testControllerDependencyInjection() {
        $this->get('/controller/hello/chand')
            ->assertSeeText("Hallo chand");
    }

    public function testController() {
        $this->get('/controller/hallo')
            ->assertSeeText("Hallo Dunia");
    }

    public function testRequest() {
        $this->get('/controller/hello-request',[
            "Accept" => "plain/text"
        ])->assertSeeText("controller/hello-request")
        ->assertSeeText("http://localhost/controller/hello-request")
        ->assertSeeText("GET")
        ->assertSeeText("plain/text");
    }
}
