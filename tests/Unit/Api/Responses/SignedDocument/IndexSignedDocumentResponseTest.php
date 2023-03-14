<?php

namespace Deegitalbe\TrustupIoSign\Tests\Unit\Api\Responses\SignedDocument;


use Mockery\MockInterface;
use Henrotaym\LaravelTestSuite\TestSuite;
use Deegitalbe\TrustupIoSign\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Henrotaym\LaravelApiClient\Contracts\ResponseContract;
use Henrotaym\LaravelApiClient\Contracts\TryResponseContract;
use Henrotaym\LaravelPackageVersioning\Testing\Traits\InstallPackageTest;
use Deegitalbe\TrustupIoSign\Contracts\Models\TrustupIoSignedDocumentContract;
use Deegitalbe\TrustupIoSign\Api\Responses\SignedDocument\IndexSignedDocumentResponse;

class IndexSignedDocumentResponseTest extends TestCase
{
    use InstallPackageTest, TestSuite, RefreshDatabase;

    /**
     * Mocking IndexSignedDocumentResponse.
     *
     * @return IndexSignedDocumentResponse|MockInterface
     */
    protected function mockIndexSignedDocumentResponse(): MockInterface
    {
        /** @var IndexSignedDocumentResponse */
        return $this->mockThis(IndexSignedDocumentResponse::class);
    }

    /**
     * Mocking TryResponseContract.
     *
     * @return TryResponseContract|MockInterface
     */
    protected function mockTryResponseContract(): MockInterface
    {
        /** @var TryResponseContract */
        return $this->mockThis(TryResponseContract::class);
    }

    /**
     * Mocking ResponseContract.
     *
     * @return ResponseContract|MockInterface
     */
    protected function mockResponseContract(): MockInterface
    {
        /** @var ResponseContract */
        return $this->mockThis(ResponseContract::class);
    }


    /**
     * Mocking TrustupIoSignedDocumentContract.
     *
     * @return TrustupIoSignedDocumentContract|MockInterface
     */
    protected function mockTrustupIoSignedDocumentContract(): MockInterface
    {
        /** @var TrustupIoSignedDocumentContract */
        return $this->mockThis(TrustupIoSignedDocumentContract::class);
    }

    public function test_that_it_cant_get_documents_if_response_failed()
    {


        $signedResponse = $this->mockIndexSignedDocumentResponse();
        $tryResponse = $this->mockThis(TryResponseContract::class);
        $signedResponse->shouldReceive("getResponse")->once()->withNoArgs()->andReturn($tryResponse);
        $tryResponse->shouldReceive("failed")->once()->withNoArgs()->andReturn(true);
        $signedResponse->shouldReceive("getSignedDocuments")->once()->withNoArgs()->passthru();

        $signedResponse->getSignedDocuments();
    }


    public function test_that_it_cant_get_documents_if__there_is_no_data()
    {


        $signedResponse = $this->mockIndexSignedDocumentResponse();
        $tryResponse = $this->mockThis(TryResponseContract::class);
        $responseContract = $this->mockThis(ResponseContract::class);

        $signedResponse->shouldReceive("getResponse")->twice()->withNoArgs()->andReturn($tryResponse);
        $tryResponse->shouldReceive("failed")->once()->withNoArgs()->andReturn(false);
        $tryResponse->shouldReceive("response")->once()->withNoArgs()->andReturn($responseContract);
        $responseContract->shouldReceive("get")->once()->with(true)->andReturn(null);

        $signedResponse->shouldReceive("getSignedDocuments")->once()->withNoArgs()->passthru();

        $signedResponse->getSignedDocuments();
    }

    public function test_that_it_can_get_documents_if__there_is_data()
    {
        $test = ["somekey" => "withdata"];
        $arr = ['data' => [$test]];
        // collect($arr)->map((fn (array $attributes) => dd($attributes)));
        $signedResponse = $this->mockIndexSignedDocumentResponse();
        $tryResponse = $this->mockTryResponseContract();
        $responseContract = $this->mockResponseContract();
        $TrustupIoSignedDocumentContract = $this->mockTrustupIoSignedDocumentContract();

        $signedResponse->shouldReceive('getResponse')->twice()->withNoArgs()->andReturn($tryResponse);

        $tryResponse->shouldReceive('response')->once()->withNoArgs()->andReturn($responseContract);
        $tryResponse->shouldReceive('failed')->once()->withNoArgs()->andReturnFalse();

        $responseContract->shouldReceive('get')->once()->with(true)->andReturn($arr);

        $signedResponse->shouldReceive('transformRawDocument')->once()->with($test)->andReturn($TrustupIoSignedDocumentContract);

        $signedResponse->shouldReceive('getSignedDocuments')->once()->withNoArgs()->passthru();

        $test = app()->make(IndexSignedDocumentResponse::class);
        $test->getSignedDocuments();
    }
}
