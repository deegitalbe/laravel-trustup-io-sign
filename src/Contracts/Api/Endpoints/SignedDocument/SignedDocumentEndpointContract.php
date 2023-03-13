<?php

namespace Deegitalbe\TrustupIoSign\Contracts\Api\Endpoints\SignedDocument;


use Deegitalbe\TrustupIoSign\Contracts\api\Requests\SignedDocument\IndexSignedDocumentRequestContract;
use Deegitalbe\TrustupIoSign\Contracts\Api\Responses\signedDocument\IndexSignedDocumentResponseContract;

interface SignedDocumentEndpointContract
{

    public function index(IndexSignedDocumentRequestContract $request): IndexSignedDocumentResponseContract;
}
