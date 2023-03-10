<?php

namespace Deegitalebe\PackageSign\Contracts\Api\Responses\signedDocument;

use Henrotaym\LaravelApiClient\Contracts\TryResponseContract;

interface SignedDocumentResponseContract
{
    public function getResponse(): TryResponseContract;

    /** @return static */
    public function setResponse(TryResponseContract $response): SignedDocumentResponseContract;
}
