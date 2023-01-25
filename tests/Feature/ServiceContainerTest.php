<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use Tests\TestCase;
use App\Data\Person;
use App\Services\HelloService;
use App\Services\HelloServiceIndonesia;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ServiceContainer extends TestCase
{
    public function testDependency()
    {
        $foo1 = $this->app->make(Foo::class);
        $foo2 = $this->app->make(Foo::class);

        self::assertEquals('Foo', $foo1->foo());
        self::assertEquals('Foo', $foo2->foo());
        self::assertNotSame($foo1, $foo2);
    }

    public function testBinding()
    {
        $this->app->bind(Person::class, function($app) {
            return new Person('Chandra', 'Bachtiar');
        });

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals('Chandra', $person1->firstname);
        self::assertEquals('Chandra', $person2->firstname);
        self::assertNotSame($person1, $person2);
    }

    public function testSingeton()
    {
        $this->app->singleton(Person::class, function($app) {
            return new Person('Chandra', 'Bachtiar');
        });

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals('Chandra', $person1->firstname);
        self::assertEquals('Chandra', $person2->firstname);
        self::assertSame($person1, $person2);
    }

    public function testInstance()
    {
        $person = new Person("Chandra", "Bachtiar");
        $this->app->instance(Person::class, $person);

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals('Chandra', $person1->firstname);
        self::assertEquals('Chandra', $person2->firstname);
        self::assertSame($person, $person1);
        self::assertSame($person1, $person2);
    }

    public function testDependencyInjection() {
        $this->app->singleton(Foo::class, function($app) {
            return new Foo();
        });

        $foo = $this->app->make(Foo::class);
        $bar = $this->app->make(Bar::class);

        self::assertSame($foo, $bar->foo);
    }

    public function testDependencyInjectionSingleton() {
        $this->app->singleton(Foo::class, function($app) {
            return new Foo();
        });

        $this->app->singleton(Bar::class, function($app) {
            return new Bar($app->make(Foo::class));
        });

        $foo = $this->app->make(Foo::class);
        $bar1 = $this->app->make(Bar::class);
        $bar2 = $this->app->make(Bar::class);

        self::assertSame($foo, $bar1->foo);
        self::assertSame($foo, $bar2->foo);
        self::assertSame($bar1, $bar2);
    }

    public function testInterfaceToClass() {
        // simple
        // $this->app->singleton(HelloService::class,HelloServiceIndonesia::class);

        //closure
        $this->app->singleton(HelloService::class, function($app) {
            return new HelloServiceIndonesia();
        });

        $helloService = $this->app->make(HelloService::class); 

        self::assertEquals("Hallo Chandra", $helloService->hello("Chandra"));
    }
}
