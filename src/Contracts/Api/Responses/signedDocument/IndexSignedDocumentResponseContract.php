<?php

namespace Deegitalbe\TrustupIoSign\Contracts\Api\Responses\signedDocument;

use Illuminate\Support\Collection;
use Deegitalbe\TrustupIoSign\Contracts\Api\Responses\signedDocument\SignedDocumentResponseContract;

interface IndexSignedDocumentResponseContract extends SignedDocumentResponseContract
{
    /**
     * @return Collection<int, TrustupIoSignedDocumentContract>
     */
    public function getSignedDocuments(): Collection;
}
