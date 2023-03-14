<?php

namespace Deegitalbe\TrustupIoSign\Tests\Feature;

use Deegitalbe\TrustupIoSign\Tests\TestCase;
use Deegitalbe\TrustupIoSign\Facades\TrustupIoSignFacade;

class ExampleFeatureTest extends TestCase
{
    public function test_it_can_assert_true()
    {
        $this->assertTrue(true);
    }

    public function test_if_get_config_return_an_array()
    {
        dd(TrustupIoSignFacade::getConfig("models"));
    }
}
