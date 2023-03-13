<?php

namespace Deegitalbe\TrustupIoSign\Api\Credentials;

use Deegitalbe\TrustupIoSign\Facades\TrustupIoSign;
use Deegitalbe\TrustupIoSign\Facades\TrustupIoSignFacade;
use Henrotaym\LaravelApiClient\JsonCredential;
use Henrotaym\LaravelApiClient\Contracts\RequestContract;

class SignedDocumentCredential extends JsonCredential
{
    public function prepare(RequestContract &$request)
    {
        parent::prepare($request);
        $request->setBaseUrl(TrustupIoSignFacade::getUrl() . '/api');
    }
}
