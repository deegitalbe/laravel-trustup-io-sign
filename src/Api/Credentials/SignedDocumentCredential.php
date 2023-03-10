<?php

namespace Deegitalbe\LaravelTrustupIoAudit\Api\Credentials;

use Deegitalebe\PackageSign\Facades\PackageSignFacade;
use Henrotaym\LaravelApiClient\JsonCredential;
use Henrotaym\LaravelApiClient\Contracts\RequestContract;

class SignedDocumentCredential extends JsonCredential
{
    public function prepare(RequestContract &$request)
    {
        parent::prepare($request);
        $request->setBaseUrl(PackageSignFacade::getUrl() . '/api');
    }
}
