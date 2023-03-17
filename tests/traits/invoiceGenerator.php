<?php

namespace Deegitalbe\TrustupIoSign\Tests\traits;


use Ramsey\Uuid\Uuid;
use Deegitalbe\TrustupIoSign\Tests\Models\Invoice;
use Deegitalbe\TrustupIoSign\Tests\database\migrations\CreateInvoicesTable;

trait invoiceGenerator
{


    public function createInvoices(int $numberOfInvoice)
    {
        for ($i = 0; $i < $numberOfInvoice; $i++) {
            $invoice = new Invoice();
            $invoice->create(["uuid" => Uuid::uuid7()]);
        }
        return $this;
    }

    public function migrateInvoices(): void
    {
        app()->make(CreateInvoicesTable::class)->up();
    }
}
