<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Faker\Factory;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseMigrations;
    protected $faker;

    public function setUp() :void
    {
        parent::setUp();
        Artisan::call('db:seed');
        $this->faker = Factory::create();
    }
}