<?php

namespace Deegitalbe\TrustupIoSign\Api\Endpoints\SignedDocument;

use Henrotaym\LaravelApiClient\Contracts\ClientContract;
use Deegitalbe\TrustupIoSign\Api\Credentials\SignedDocumentCredential;
use Deegitalbe\TrustupIoSign\Api\Responses\SignedDocument\IndexSignedDocumentResponse;
use Deegitalbe\TrustupIoSign\Contracts\Api\Endpoints\SignedDocument\SignedDocumentEndpointContract;
use Deegitalbe\TrustupIoSign\Contracts\api\Requests\SignedDocument\IndexSignedDocumentRequestContract;
use Deegitalbe\TrustupIoSign\Contracts\Api\Responses\signedDocument\IndexSignedDocumentResponseContract;
use Deegitalbe\TrustupIoSign\Facades\TrustupIoSignFacade;

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
        // filter documents when previous specified identifiers.
        $requets->setVerb("GET")->setUrl(TrustupIoSignFacade::getUrl());
        if ($indexSignedDocumentRequest->hasUuids()) {
            $requets->addQuery(['uuids' => $indexSignedDocumentRequest->getUuids()->all()]);
        }
        $response = $this->client->try($requets, "Cannot get signed documents");
        /** @var IndexSignedDocumentResponse */
        $formated = app()->make(IndexSignedDocumentResponse::class);
        return $formated->setResponse($response);
    }

    protected function newRequest()
    {
        /** @var RequestContract */
        return app()->make(RequestContract::class);
    }
}
