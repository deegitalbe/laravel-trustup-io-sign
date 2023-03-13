<?php

namespace Deegitalbe\TrustupIoSign\Tests\Unit\Models;

use Mockery\MockInterface;
use Henrotaym\LaravelTestSuite\TestSuite;
use Deegitalbe\TrustupIoSign\Tests\TestCase;
use Deegitalebe\PackageSign\Tests\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Henrotaym\LaravelPackageVersioning\Testing\Traits\InstallPackageTest;

class IsTrustupIoSignedDocumentRelatedModelTest extends TestCase
{
    use InstallPackageTest, TestSuite, RefreshDatabase;


    /**
     * Mocking User.
     *
     * @return User|MockInterface
     */
    protected function mockUser(): MockInterface
    {
        /** @var User */
        return $this->mockThis(User::class);
    }

    public function test_that_it_can_get_trustup_io_signed_document_related_model_id()
    {
        $class = $this->mockUser();
        // $this->setPrivateProperty('uuid', "test", $class);
        $class->shouldReceive("getTrustupIoSignModelId")->once()->withNoArgs()->passthru();
        $this->assertEquals("test", $class->getTrustupIoSignModelId());
    }


    public function test_that_it_can_get_trustup_io_signed_document_related_model_type()
    {
        $class = $this->mockUser();
        $class->shouldReceive("getMorphClass")->once()->withNoArgs()->andReturn("app\\model\\test");
        $class->shouldReceive("getTrustupIoSignModelType")->once()->withNoArgs()->passthru();
        $this->assertEquals("app-model-test", $class->getTrustupIoSignModelType());
    }

    public function test_that_it_can_get_trustup_io_signed_document_related_app_key()
    {
        $class = $this->mockUser();
        $class->shouldReceive("getTrustupIoSignAppKey")->once()->withNoArgs()->passthru();
        $this->assertEquals("test_key", $class->getTrustupIoSignAppKey());
    }

    public function test_that_it_can_get_trustup_io_signed_document_related_callback()
    {
        $class = $this->mockUser();
        $class->shouldReceive("getTrustupIoSignCallbackUrl")->once()->withNoArgs()->passthru();
        $this->assertEquals("https://www.google.com/", $class->getTrustupIoSignCallbackUrl());
    }

    public function test_that_it_can_get_trustup_io_signed_document_related_redirect()
    {
        $class = $this->mockUser();
        $class->shouldReceive("getTrustupIoSignRedirectUrl")->once()->withNoArgs()->passthru();
        $this->assertEquals("https://www.google.com/", $class->getTrustupIoSignRedirectUrl());
    }

    public function test_that_it_can_get_trustup_io_signed_document_related_document_url()
    {
        $class = $this->mockUser();
        $class->shouldReceive("getTrustupIoSignDocumentUrl")->once()->withNoArgs()->passthru();
        $this->assertEquals("https://eforms.com/download/2019/08/Service-Contract-Template.pdf", $class->getTrustupIoSignDocumentUrl());
    }


    public function test_that_it_can_get_trustup_io_audit_log_column()
    {

        $class = $this->mockUser();

        $class->shouldReceive('getTrustupIoSignedDocumentColumn')->once()->withNoArgs()->passthru();

        $this->assertEquals("trustup_io_signed_document_uuid", $class->getTrustupIoSignedDocumentColumn());
    }

    // public function test_that_boot_is_trustup_io_audit_related_Model_boot_on_model_and_register_liostener()
    // {
    //     // https://stackoverflow.com/a/36771173
    //     $user = $this->mockUser()->makePartial();
    //     $mode = $this->mockThis(TrustupIoAuditRelatedModelContract::class);
    //     $user->shouldReceive('bootIsTrustupIoAuditRelatedModel')->once();
    //     $user->__construct();
    // }
}
