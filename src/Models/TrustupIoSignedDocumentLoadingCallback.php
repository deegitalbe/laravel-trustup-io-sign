<?php

namespace Deegitalbe\LaravelTrustupIoAudit\Models;


use Illuminate\Support\Collection;
use Deegitalebe\PackageSign\Contracts\Api\Endpoints\SignedDocument\SignedDocumentEndpointContract;
use Deegitalbe\LaravelTrustupIoExternalModelRelations\Contracts\Models\Relations\ExternalModelRelationLoadingCallbackContract;
use Deegitalebe\PackageSign\Contracts\api\Requests\SignedDocument\IndexSignedDocumentRequestContract;

class TrustupIoSignedDocumentLoadingCallback implements ExternalModelRelationLoadingCallbackContract
{
    /**
     * @var LogEndpointContract
     */
    protected SignedDocumentEndpointContract $endpoint;

    public function __construct(SignedDocumentEndpointContract $signedDocumentEndpoint, protected IndexSignedDocumentRequestContract $indexSignedDocumentRequest)
    {
        $this->endpoint = $signedDocumentEndpoint;
    }

    /** @return Collection<int, LogContract> */
    public function load(Collection $identifiers): Collection
    {
        $this->indexSignedDocumentRequest->setUuids($identifiers);
        return $this->endpoint->index($this->indexSignedDocumentRequest)->getLogs();
    }
}
