<?php

namespace Deegitalbe\TrustupIoSign\Api\Responses\SignedDocument;

use Henrotaym\LaravelApiClient\Contracts\TryResponseContract;
use Deegitalbe\TrustupIoSign\Contracts\Api\Responses\signedDocument\SignedDocumentResponseContract;

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
