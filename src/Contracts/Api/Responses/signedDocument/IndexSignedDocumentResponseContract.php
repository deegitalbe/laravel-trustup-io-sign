<?php

namespace Deegitalbe\TrustupIoSign\Contracts\Api\Responses\signedDocument;

use Illuminate\Support\Collection;
use Deegitalbe\LaravelTrustupIoAudit\Contracts\Api\Requests\Logs\LogContract;
use Deegitalbe\TrustupIoSign\Contracts\Api\Responses\signedDocument\SignedDocumentResponseContract;

interface IndexSignedDocumentResponseContract extends SignedDocumentResponseContract
{
    /**
     * @return Collection<int, LogContract>
     */
    public function getSignedDocuments(): Collection;
}
