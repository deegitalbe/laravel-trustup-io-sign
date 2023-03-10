<?php

namespace Deegitalebe\PackageSign\Api\Responses\Logs;

use Illuminate\Support\Collection;
use Deegitalbe\LaravelTrustupIoAudit\Contracts\Models\LogContract;
use Deegitalebe\PackageSign\Contracts\Api\Responses\signedDocument\IndexSignedDocumentResponseContract;

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
