<?php

namespace Deegitalbe\LaravelTrustupIoAudit\Api\Responses\Logs;

use Deegitalebe\PackageSign\Contracts\Api\Responses\signedDocument\SignedDocumentResponseContract;
use Henrotaym\LaravelApiClient\Contracts\TryResponseContract;

class SignedDocumentResponse implements SignedDocumentResponseContract
{
    protected TryResponseContract $response;

    public function getResponse(): TryResponseContract
    {
        return $this->response;
    }

    public function setResponse(TryResponseContract $response): SignedDocumentResponseContract
    {
        $this->response = $response;
        return $this;
    }
}
