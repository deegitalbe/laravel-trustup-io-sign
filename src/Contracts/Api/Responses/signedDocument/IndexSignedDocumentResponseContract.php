<?php

namespace Deegitalebe\PackageSign\Contracts\Api\Responses\signedDocument;

use Illuminate\Support\Collection;
use Deegitalbe\LaravelTrustupIoAudit\Contracts\Api\Requests\Logs\LogContract;
use Deegitalebe\PackageSign\Contracts\Api\Responses\signedDocument\SignedDocumentResponseContract;

interface IndexSignedDocumentResponseContract extends SignedDocumentResponseContract
{
    /**
     * @return Collection<int, LogContract>
     */
    public function getSignedDocuments(): Collection;
}
