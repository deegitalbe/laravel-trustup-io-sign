<?php

namespace Deegitalbe\TrustupIoSign\Tests\Feature\Services;

use Deegitalbe\TrustupIoSign\Tests\TestCase;
use Deegitalbe\TrustupIoSign\Services\SignedDocumentStoredService;
use Deegitalbe\TrustupIoSign\Tests\Models\Invoice;
use Deegitalbe\TrustupIoSign\Tests\traits\invoiceGenerator;

class SignedDocumentStoredServiceTest extends TestCase
{
    use invoiceGenerator;


    public function test_that_it_can_get_signed_documents()
    {
        $this->migrateInvoices();
        $invoice = $this->createInvoices(3);
        dd(Invoice::all());
        $attributes = ["id" => 25, "uuid" => "f80fd56d-a437-411c-a0ec-d18846291517", "ip" => "192.168.144.8", "timezone" => null, "latitude" => null, "longitude" => null, "modelId" => "c79cce1c-31fb-4696-bc57-29b2326c284e", "modelType" => "invoice", "appKey" => "trustup-io-ticketing", "documentUuid" => "d1ca1262-ee6f-4b03-9f6f-6166c710eb3d", "signedAt" => "2023-03-15T13=>47=>12.000000Z", "document" => ["app_key" => "trustup-io-sign", "collection" => "files", "conversions" => [], "custom_properties" => ["width" => null, "height" => null], "id" => 259, "model_id" => "f80fd56d-a437-411c-a0ec-d18846291517", "model_type" => "signeddocument", "uuid" => "d1ca1262-ee6f-4b03-9f6f-6166c710eb3d", "url" => "https=>//media.trustup.io.test/storage/d1ca1262-ee6f-4b03-9f6f-6166c710eb3d/T9Xxvr1m.pdf", "optimized" => ["url" => "https=>//media.trustup.io.test/storage/d1ca1262-ee6f-4b03-9f6f-6166c710eb3d/T9Xxvr1m.pdf", "name" => "original", "width" => null, "height" => null], "width" => null, "height" => null, "name" => "T9Xxvr1m.pdf"]];

        /** @var  SignedDocumentStoredService*/
        $service = app()->make(SignedDocumentStoredService::class);
        $service->setModelRelatedSignedDocuments($attributes);
    }
}
