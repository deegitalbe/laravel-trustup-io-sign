namespace Deegitalbe\TrustupIoSign\routes;

<?php

use Illuminate\Support\Facades\Route;
use Deegitalbe\TrustupIoSign\Http\Controllers\Webhooks\SignedDocuments\SignedDocumentStoredController;

Route::post(
    "webhooks/trustup-io-sign/signed-documents",
    SignedDocumentStoredController::class
)->name("webhooks.trustup-io-sign.signed-documents.stored");
