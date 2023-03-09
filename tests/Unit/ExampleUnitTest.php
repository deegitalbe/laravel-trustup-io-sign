<?php
namespace Deegitalebe\PackageSign\Tests\Unit;

use Deegitalebe\PackageSign\Tests\TestCase;
use Deegitalebe\PackageSign\Facades\PackageSignFacade;

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