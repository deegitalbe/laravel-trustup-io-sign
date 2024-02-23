<?php

namespace Deegitalbe\TrustupIoSign\Api\Requests\SignedDocument;

use Illuminate\Support\Collection;
use Deegitalbe\TrustupIoSign\Contracts\Api\Requests\SignedDocument\IndexSignedDocumentRequestContract;

class IndexSignedDocumentRequest implements IndexSignedDocumentRequestContract
{
    
    /** @var Collection<int, string> */
    protected Collection $uuids;

    /**
     * @param Collection<int, string>
     * @return static
     */
    public function setUuids(Collection $uuids): IndexSignedDocumentRequestContract
    {
        $this->uuids = $uuids;
        return $this;
    }

    /**
     * @return Collection<int, string>
     */
    public function getUuids(): Collection
    {
        return $this->uuids;
    }

    public function hasUuids(): bool
    {
        return $this->getUuids()->isNotEmpty();
    }
}
