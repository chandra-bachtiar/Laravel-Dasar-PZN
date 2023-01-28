<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ControllerTest extends TestCase
{
    public function testControllerDependencyInjection()
    {
        $this->get('/controller/hello/chand')
            ->assertSeeText("Hallo chand");
    }

    public function testController()
    {
        $this->get('/controller/hallo')
            ->assertSeeText("Hallo Dunia");
    }

    public function testRequest()
    {
        $this->get('/controller/hello-request', [
            "Accept" => "plain/text"
        ])->assertSeeText("controller/hello-request")
            ->assertSeeText("http://localhost/controller/hello-request")
            ->assertSeeText("GET")
            ->assertSeeText("plain/text");
    }

    public function testInput()
    {
        $this->get('/input/hello?name=chandra')->assertSeeText("Name chandra");
        $this->post('/input/hello', ["name" => "chandra"])->assertSeeText("Name chandra");
    }

    public function testInputNested()
    {
        $this->post('/input/helloFirst', ["first" => ["name" => "chandra"]])
            ->assertSeeText("First chandra");
    }

    public function testAllInput()
    {
        $this->post('/input/hello-input', ["name" => "chandra", "city" => "cirebon"])
            ->assertSeeText("name")
            ->assertSeeText("chandra")
            ->assertSeeText("city")
            ->assertSeeText("cirebon");
    }

    public function testAllSelected() {
        $this->post('/input/hello-product',
        [
            "product" => [
                ["name"=>"ABC Saus Sambal","price"=>1000],
                ["name"=>"Indomie Goreng","price"=>3000],
                ["name"=>"Permen Kiss","price"=>10000],
                ["name"=>"Superpel","price"=>5000],
            ],
            "retail"=>"Toko Chandra Bachtiar"
        ])
        ->assertSeeText("product")
        ->assertSeeText("name")
        ->assertSeeText("ABC Saus Sambal")
        ->assertSeeText("Permen Kiss")
        ->assertSeeText("Superpel");
    }
}
