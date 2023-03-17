<?php

namespace Deegitalbe\TrustupIoSign\Tests\Unit;

use Deegitalbe\TrustupIoSign\Tests\TestCase;
use Deegitalbe\TrustupIoSign\Facades\TrustupIoSign;
use Deegitalbe\TrustupIoSign\Facades\TrustupIoSignFacade;

class ExampleUnitTest extends TestCase
{
    public function test_it_can_instanciate_facade()
    {
        $this->assertInstanceOf(
            TrustupIoSignFacade::class,
            $this->app->make(TrustupIoSignFacade::class)
        );
    }
}
