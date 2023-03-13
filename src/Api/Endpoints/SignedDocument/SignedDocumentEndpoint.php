<?php

namespace Deegitalbe\TrustupIoSign\Api\Endpoints\SignedDocument;

use Henrotaym\LaravelApiClient\Contracts\ClientContract;
use Deegitalbe\TrustupIoSign\Api\Credentials\SignedDocumentCredential;
use Deegitalbe\LaravelTrustupIoAudit\Contracts\Api\Responses\Logs\IndexLogResponseContract;
use Deegitalbe\TrustupIoSign\Contracts\Api\Endpoints\SignedDocument\SignedDocumentEndpointContract;
use Deegitalbe\TrustupIoSign\Contracts\api\Requests\SignedDocument\IndexSignedDocumentRequestContract;
use Deegitalbe\TrustupIoSign\Contracts\Api\Responses\signedDocument\IndexSignedDocumentResponseContract;

class SignedDocumentEndpoint implements SignedDocumentEndpointContract
{

    protected ClientContract $client;

    public function __construct(ClientContract $client, SignedDocumentCredential $credential)
    {
        $this->client = $client->setCredential($credential);
    }

    public function index(IndexSignedDocumentRequestContract $indexSignedDocumentRequest): IndexSignedDocumentResponseContract
    {
        $requets = $this->newRequest();
        // filter logs when previous specified identifiers.
        $requets->setVerb("GET")->setUrl("sign");
        if ($indexSignedDocumentRequest->hasUuids()) {
            $requets->addQuery(['uuids' => $indexSignedDocumentRequest->getUuids()->all()]);
        }
        $response = $this->client->try($requets, "Cannot get signed documents");
        /** @var IndexLogResponseContract */
        $formated = app()->make(IndexLogResponseContract::class);
        return $formated->setResponse($response);
    }

    protected function newRequest()
    {
        /** @var RequestContract */
        return app()->make(RequestContract::class);
    }
}
