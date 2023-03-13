<?php

namespace Deegitalbe\TrustupIoSign\Tests\Unit\Models;

use Deegitalbe\TrustupIoSign\Services\SignUrlService;
use Mockery\MockInterface;
use Henrotaym\LaravelTestSuite\TestSuite;
use Deegitalbe\TrustupIoSign\Tests\TestCase;
use Deegitalbe\TrustupIoSign\Tests\Models\User;
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

    public function test_that_it_can_get_trustup_io_signed_document_related_document_url()
    {
        $class = $this->mockUser();
        $class->shouldReceive("getTrustupIoSignOriginalPdfUrl")->once()->withNoArgs()->passthru();
        $this->assertEquals("https://eforms.com/download/2019/08/Service-Contract-Template.pdf", $class->getTrustupIoSignOriginalPdfUrl());
    }


    // TODO WHEN IMPLEMENTING WEBHOOK
    // public function test_that_it_can_get_trustup_io_signed_document_related_webhook_url()
    // {
    //     $class = $this->mockUser();
    //     $class->shouldReceive("getTrustupIoSignWebHookUrl")->once()->withNoArgs()->passthru();
    //     $this->assertEquals("https://eforms.com/download/2019/08/Service-Contract-Template.pdf", $class->getTrustupIoSignWebHookUrl());
    // }

    public function test_that_it_can_get_trust_up_io_sign_url()
    {
        $url = "trustup-io-sign?callback=https%3A%2F%2Fwww.google.com&modelId=1&modelType=user&documentUrl=https%3A%2F%2Feforms.com%2Fdownload%2F2019%2F08%2FService-Contract-Template.pdf";

        $class = $this->mockUser();
        $signUrlService = $this->mockThis(SignUrlService::class);
        $class->shouldNotReceive("setTrustupIoSignCallback");
        $class->shouldNotReceive("setTrustupIoSignWebhook");
        $signUrlService->shouldReceive("generateUrl")->with($class)->andReturn($url);
        $class->shouldReceive("getTrustupIoSignUrl")->once()->withNoArgs()->passthru();
        $this->assertEquals($url, $class->getTrustupIoSignUrl());
    }

    public function test_that_it_can_get_trust_up_io_sign_url_with_parameters()
    {
        $callback = "test";
        $url = "trustup-io-sign?callback=https%3A%2F%2Fwww.{$callback}.com&modelId=1&modelType=user&documentUrl=https%3A%2F%2Feforms.com%2Fdownload%2F2019%2F08%2FService-Contract-Template.pdf";

        $class = $this->mockUser();
        $signUrlService = $this->mockThis(SignUrlService::class);
        $class->shouldReceive("setTrustupIoSignCallback")->once()->with($callback)->andReturnSelf();
        $class->shouldNotReceive("setTrustupIoSignWebhook");
        $signUrlService->shouldReceive("generateUrl")->with($class)->andReturn($url);
        $class->shouldReceive("getTrustupIoSignUrl")->once()->with($callback)->passthru();
        $this->assertEquals($url, $class->getTrustupIoSignUrl($callback));
    }
}
