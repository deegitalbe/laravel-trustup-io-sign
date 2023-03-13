<?php

namespace Deegitalbe\TrustupIoSign\Api\Responses\SignedDocument;

use Illuminate\Support\Collection;
use Deegitalbe\LaravelTrustupIoAudit\Contracts\Models\LogContract;
use Deegitalbe\TrustupIoSign\Contracts\Api\Responses\signedDocument\IndexSignedDocumentResponseContract;

class IndexSignedDocumentResponse extends IndexSignedDocumentResponse implements IndexSignedDocumentResponseContract
{
    /**
     * @return Collection<int, LogContract>
     */
    protected Collection $logs;

    /**
     * @return Collection<int, LogContract>
     */
    public function getSignedDocument(): Collection
    {
        if ($this->getResponse()->failed()) return collect();

        $body = $this->getResponse()->response()->get(true);
        // TODO
        dd($body);
    }
}
