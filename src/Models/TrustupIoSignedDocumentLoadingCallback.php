<?php

namespace Deegitalbe\TrustupIoSign\Models;


use Illuminate\Support\Collection;
use Deegitalbe\TrustupIoSign\Contracts\Api\Endpoints\SignedDocument\SignedDocumentEndpointContract;
use Deegitalbe\TrustupIoSign\Contracts\api\Requests\SignedDocument\IndexSignedDocumentRequestContract;
use Deegitalbe\LaravelTrustupIoExternalModelRelations\Contracts\Models\Relations\ExternalModelRelationLoadingCallbackContract;

class TrustupIoSignedDocumentLoadingCallback implements ExternalModelRelationLoadingCallbackContract
{
    /**
     * @var SignedDocumentEndpointContract
     */
    protected SignedDocumentEndpointContract $endpoint;

    public function __construct(SignedDocumentEndpointContract $signedDocumentEndpoint, protected IndexSignedDocumentRequestContract $indexSignedDocumentRequest)
    {
        $this->endpoint = $signedDocumentEndpoint;
        $this->indexSignedDocumentRequest = $indexSignedDocumentRequest;
    }

    /** @return Collection<int, TrustupIoSignedDocumentContract> */
    public function load(Collection $identifiers): Collection
    {
        $this->indexSignedDocumentRequest->setUuids($identifiers);
        return $this->endpoint->index($this->indexSignedDocumentRequest)->getSignedDocuments();
    }
}
