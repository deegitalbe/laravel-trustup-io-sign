<?php

namespace Deegitalbe\TrustupIoSign\Tests\Unit\Models;


use Mockery\MockInterface;
use Henrotaym\LaravelTestSuite\TestSuite;
use Deegitalbe\TrustupIoSign\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Deegitalbe\TrustupIoSign\Services\SignUrlService;
use Henrotaym\LaravelApiClient\Contracts\RequestContract;
use Deegitalbe\TrustupIoSign\Tests\Models\UserWithRelations;
use Henrotaym\LaravelPackageVersioning\Testing\Traits\InstallPackageTest;
use Deegitalbe\TrustupIoSign\Contracts\Models\TrustupIoSignedDocumentContract;
use Deegitalbe\TrustupIoSign\Contracts\Models\TrustupIoSignedDocumentRelatedModelContract;

class SignUrlServiceTest extends TestCase
{
    use InstallPackageTest, TestSuite, RefreshDatabase;

    /**
     * Mocking RequestContract.
     *
     * @return RequestContract|MockInterface
     */
    protected function mockRequestContract(): MockInterface
    {
        /** @var UserWithRelations */
        return $this->mockThis(RequestContract::class);
    }

    /**
     * Mocking TrustupIoSignedDocumentContract.
     *
     * @return TrustupIoSignedDocumentContract|MockInterface
     */
    protected function mockTrustupIoSignedDocument(): MockInterface
    {
        /** @var TrustupIoSignedDocumentContract */
        return $this->mockThis(TrustupIoSignedDocumentRelatedModelContract::class);
    }

    public function test_that_it_can_generate_an_url()
    {
        $callback = "test";
        $url = "trustup-io-sign?callback=https%3A%2F%2Fwww.{$callback}.com&modelId={$callback}&modelType={$callback}&documentUrl={$callback}";
        $array = [
            "callback" => $callback,
            "model_id" => $callback,
            "model_type" => $callback,
            "file_url" => $callback,
            "webhook" => $callback,
            "app_key" => $callback
        ];

        $model = $this->mockTrustupIoSignedDocument();
        $service = $this->mockThis(SignUrlService::class);

        $request = $this->mockRequestContract();
        $request->shouldReceive("setUrl")->once()->with("https://sign.trustup.io.test")->andReturnSelf();
        $request->shouldReceive("addQuery")->once()->with($array)->andReturnSelf();
        $request->shouldReceive("url")->once()->withNoArgs()->andReturn($url);
        $model->shouldReceive("getTrustupIoSignCallbackUrl")->once()->withNoArgs()->andReturn($callback);
        $model->shouldReceive("getTrustupIoSignModelId")->once()->withNoArgs()->andReturn($callback);
        $model->shouldReceive("getTrustupIoSignModelType")->once()->withNoArgs()->andReturn($callback);
        $model->shouldReceive("getTrustupIoSignOriginalPdfUrl")->once()->withNoArgs()->andReturn($callback);
        $model->shouldReceive("getTrustupIoSignWebhookUrl")->once()->withNoArgs()->andReturn($callback);
        $model->shouldReceive("getTrustupIoSignAppKey")->once()->withNoArgs()->andReturn($callback);

        $service->shouldReceive("generateUrl")->once()->with($model)->passthru();

        $urlService = app()->make(SignUrlService::class);
        $this->assertEquals($url, $urlService->generateUrl($model));
    }
}
