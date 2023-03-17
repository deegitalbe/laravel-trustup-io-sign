<?php

namespace Deegitalbe\TrustupIoSign\Tests\Feature;

use Deegitalbe\TrustupIoSign\Tests\TestCase;
use Deegitalbe\TrustupIoSign\Services\SignedDocumentStoredService;
use Deegitalbe\ServerAuthorization\Http\Middleware\AuthorizedServer;

class SignedDocumentControllerTest extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutMiddleware(AuthorizedServer::class);
        $this->withoutExceptionHandling();
    }


    public function test_triggering_signed_document_stored_with_correct_attributes()
    {
        $service = $this->mockThis(SignedDocumentStoredService::class);
        $webhookData = ['test' => 'test'];

        $service->shouldReceive('setModelRelatedSignedDocuments')->once()->with($webhookData);

        $this->setUp();
        $response = $this->json(
            "POST",
            route(
                'webhooks.trustup-io-sign.signed-document.stored',
                ['test' => 'test']
            ),
            $webhookData
        );

        $response->assertStatus(200);
    }
}
