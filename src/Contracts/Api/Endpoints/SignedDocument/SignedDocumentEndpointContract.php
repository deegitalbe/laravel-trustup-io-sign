<?php

namespace Deegitalebe\PackageSign\Contracts\Api\Endpoints\SignedDocument;


use Deegitalebe\PackageSign\Contracts\api\Requests\SignedDocument\IndexSignedDocumentRequestContract;
use Deegitalebe\PackageSign\Contracts\Api\Responses\signedDocument\IndexSignedDocumentResponseContract;

interface SignedDocumentEndpointContract
{

    public function index(IndexSignedDocumentRequestContract $request): IndexSignedDocumentResponseContract;
}
