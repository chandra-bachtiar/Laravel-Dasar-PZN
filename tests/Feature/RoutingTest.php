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

    public function testRouteParameter()
    {

        $this->get('/barang/test')
            ->assertSeeText("Your ProductId is test");

        $this->get('/barang/test/merk/sanco')
            ->assertSeeText("Your ProductId test Merk sanco");
    }

    public function testRouteParameterRgx()
    {
        $this->get('/kategori/chand')
            ->assertSeeText("Kategori : chand");

        $this->get('/kategori/chand/sub/1')
            ->assertSeeText("Kategori : chand Sub : 1");
    }

    public function testRouteParameterOptional()
    {
        $this->get('/customer/chand')
            ->assertSeeText("Customer : chand");

        $this->get('/customer')
            ->assertSeeText("Customer : C01");
    }

    public function testRouterParameterConflic() {
        $this->get('/conflic/Bachtiar')
            ->assertSeeText("Name Bachtiar");

        $this->get('/conflic/chand')
            ->assertSeeText("Name Chandra bachtiar");
    }

    public function testRouterName() {
        $this->get('produk/brg123')->assertSeeText("Link http://localhost/barang/brg123");
        $this->get('kat/brg123')->assertSeeText("kategori/brg123");
    }
    
}
