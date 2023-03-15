<?php

namespace Deegitalbe\TrustupIoSign\Tests\Feature\Services;

use Illuminate\Support\Facades\Config;
use Deegitalbe\TrustupIoSign\TrustupIoSign;
use Deegitalbe\TrustupIoSign\Tests\TestCase;
use Deegitalbe\TrustupIoSign\Tests\Models\Invoice;
use Deegitalbe\TrustupIoSign\Facades\TrustupIoSignFacade;
use Deegitalbe\TrustupIoSign\Tests\traits\invoiceGenerator;
use Deegitalbe\TrustupIoSign\Services\SignedDocumentStoredService;

class SignedDocumentStoredServiceTest extends TestCase
{
    use invoiceGenerator;

    protected $config;


    public function setUp(): void
    {
        parent::setUp();
        Config::set("defaultGatewayProvider", "firstProvider");
    }


    public function test_that_it_can_set_related_document_from_matching_model()
    {
        $this->migrateInvoices();
        $this->createInvoices(3);
        $invoice = Invoice::all()->first();

        $webhookData = ["id" => 25, "uuid" => $invoice->uuid, "ip" => "192.168.144.8", "timezone" => null, "latitude" => null, "longitude" => null, "modelId" => $invoice->uuid, "modelType" => "deegitalbe-trustupiosign-tests-models-invoice", "appKey" => "trustup-io-ticketing", "documentUuid" => "d1ca1262-ee6f-4b03-9f6f-6166c710eb3d", "signedAt" => "2023-03-15T13=>47=>12.000000Z", "document" => ["app_key" => "trustup-io-sign", "collection" => "files", "conversions" => [], "custom_properties" => ["width" => null, "height" => null], "id" => 259, "model_id" => "f80fd56d-a437-411c-a0ec-d18846291517", "model_type" => "signeddocument", "uuid" => "d1ca1262-ee6f-4b03-9f6f-6166c710eb3d", "url" => "https=>//media.trustup.io.test/storage/d1ca1262-ee6f-4b03-9f6f-6166c710eb3d/T9Xxvr1m.pdf", "optimized" => ["url" => "https=>//media.trustup.io.test/storage/d1ca1262-ee6f-4b03-9f6f-6166c710eb3d/T9Xxvr1m.pdf", "name" => "original", "width" => null, "height" => null], "width" => null, "height" => null, "name" => "T9Xxvr1m.pdf"]];

        /** @var  SignedDocumentStoredService*/
        $service = app()->make(SignedDocumentStoredService::class);
        $service->setModelRelatedSignedDocuments($webhookData);

        $this->assertDatabaseHas("invoices", [
            "trustup_io_signed_document_uuid" => $invoice->fresh()->trustup_io_signed_document_uuid,
            "id" => $invoice["id"],
            "uuid" => $invoice["uuid"],
        ]);

        $this->assertEquals($invoice["uuid"], $invoice->fresh()->trustup_io_signed_document_uuid);


        // TODO ASSERTION
    }
}
