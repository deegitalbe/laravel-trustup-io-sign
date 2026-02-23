<?php

namespace Deegitalbe\TrustupIoSign\Tests\Unit\Api\Endpoints\SignedDocument;

use Mockery\MockInterface;
use Henrotaym\LaravelTestSuite\TestSuite;
use Deegitalbe\TrustupIoSign\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Henrotaym\LaravelApiClient\Contracts\ClientContract;
use Deegitalbe\TrustupIoSign\Facades\TrustupIoSignFacade;
use Henrotaym\LaravelApiClient\Contracts\RequestContract;
use Henrotaym\LaravelApiClient\Contracts\ResponseContract;
use Henrotaym\LaravelApiClient\Contracts\TryResponseContract;
use Henrotaym\LaravelPackageVersioning\Testing\Traits\InstallPackageTest;
use Deegitalbe\TrustupIoSign\Contracts\Models\TrustupIoSignedDocumentContract;
use Deegitalbe\TrustupIoSign\Api\Endpoints\SignedDocument\SignedDocumentEndpoint;
use Deegitalbe\TrustupIoSign\Api\Responses\SignedDocument\IndexSignedDocumentResponse;
use Deegitalbe\TrustupIoSign\Contracts\Api\Requests\SignedDocument\IndexSignedDocumentRequestContract;

class SignedDocumentEndpointTest extends TestCase
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


    /**
     * Mocking SignedDocumentEndpoint.
     *
     * @return SignedDocumentEndpoint|MockInterface
     */
    protected function mockSignedDocumentEndpoint(): MockInterface
    {
        /** @var TrustupIoSignedDocumentContract */
        return $this->mockThis(SignedDocumentEndpoint::class);
    }

    /**
     * Mocking IndexSignedDocumentRequestContract.
     *
     * @return IndexSignedDocumentRequestContract|MockInterface
     */
    protected function mockIndexSignedDocumentRequestContract(): MockInterface
    {
        /** @var TrustupIoSignedDocumentContract */
        return $this->mockThis(IndexSignedDocumentRequestContract::class);
    }

    public function test_it_can_get_signed_document_index()
    {
        $client = $this->mockThis(ClientContract::class);
        $endpoint = $this->mockSignedDocumentEndpoint();
        $signedRequestContract = $this->mockIndexSignedDocumentRequestContract();
        $tryResponse = $this->mockThis(TryResponseContract::class);
        $request = $this->mockThis(RequestContract::class);
        $this->setPrivateProperty('client', $client, $endpoint);


        $request->shouldReceive('setVerb')->once()->with("GET")->andReturnSelf();
        $request->shouldReceive('setUrl')->once()->with(TrustupIoSignFacade::getUrl())->andReturnSelf();
        $request->shouldReceive('addQuery')->once()->with(['uuids' => []])->andReturnSelf();
        $endpoint->shouldReceive('index')->once()->with($signedRequestContract)->passthru();
        $endpoint->shouldReceive('newRequest')->once()->withNoArgs()->andReturn($request);

        $signedRequestContract->shouldReceive("hasUuids")->once()->withNoArgs()->andReturn(true);
        $signedRequestContract->shouldReceive('getUuids')->once()->withNoArgs()->andReturn(collect());

        $client->shouldReceive('try')->once()->with($request, "Cannot get signed documents")->andReturn($tryResponse);

        $this->assertInstanceOf(IndexSignedDocumentResponse::class, $endpoint->index($signedRequestContract));
    }
}
