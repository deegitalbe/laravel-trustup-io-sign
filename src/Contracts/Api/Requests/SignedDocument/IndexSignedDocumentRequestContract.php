<?php

namespace Deegitalbe\TrustupIoSign\Contracts\Api\Requests\SignedDocument;

use Illuminate\Support\Collection;

interface IndexSignedDocumentRequestContract
{
    /**
     * @param Collection<int, string>
     * @return static
     */
    public function setUuids(Collection $uuids): IndexSignedDocumentRequestContract;

    /**
     * @return Collection<int, string>
     */
    public function getUuids(): Collection;

    /** @return bool */
    public function hasUuids(): bool;
}
