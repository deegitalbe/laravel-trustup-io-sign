<?php

namespace Deegitalbe\TrustupIoSign\Http\Controllers\Webhooks\SignedDocuments;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Deegitalbe\TrustupIoSign\Contracts\Services\SignedDocumentStoredServiceContract;

class SignedDocumentStoredController extends Controller
{
    public function __invoke(
        SignedDocumentStoredServiceContract $service,
        Request $request
    ) {
        $service->setModelRelatedSignedDocuments($request->all());
    }
}
