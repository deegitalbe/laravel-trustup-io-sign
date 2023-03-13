<?php

namespace Deegitalbe\TrustupIoSign\Tests\Unit;

use Deegitalbe\TrustupIoSign\Tests\TestCase;
use Deegitalbe\TrustupIoSign\Facades\TrustupIoSign;

class ExampleUnitTest extends TestCase
{
    public function test_it_can_instanciate_facade()
    {
        $this->assertInstanceOf(
            TrustupIoSign::class,
            $this->app->make(TrustupIoSign::class)
        );
    }
}
