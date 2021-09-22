<?php

namespace PatrickJunod\AvsChecker\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use PatrickJunod\AvsChecker\AvsCheckerServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     * @return mixed[]
     */
    protected function getPackageProviders($app)
    {
        return [
            AvsCheckerServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');
    }
}
