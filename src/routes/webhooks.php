namespace Deegitalbe\TrustupIoSign\routes;

<?php

use Illuminate\Support\Facades\Route;
use Deegitalbe\TrustupIoSign\Http\Controllers\Webhooks\SignedDocuments\SignedDocumentStoredController;

Route::prefix('signed-document')
    ->name('signed-document.')
    ->group(function () {
        Route::post("stored", SignedDocumentStoredController::class)->name('stored');
    });
