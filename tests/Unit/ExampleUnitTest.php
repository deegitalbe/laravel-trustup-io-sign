<?php

namespace Deegitalbe\TrustupIoSign\Tests\Unit;

use Deegitalbe\TrustupIoSign\Tests\TestCase;
use Deegitalbe\PackageSign\Facades\PackageSignFacade;

class ExampleUnitTest extends TestCase
{
    public function test_it_can_instanciate_facade()
    {
        $this->assertInstanceOf(
            PackageSignFacade::class,
            $this->app->make(PackageSignFacade::class)
        );
    }
}
