<?php

namespace Deegitalbe\TrustupIoSign\Api\Responses\SignedDocument;

use Illuminate\Support\Collection;
use Deegitalbe\TrustupIoSign\Contracts\Api\Responses\signedDocument\IndexSignedDocumentResponseContract;
use Deegitalbe\TrustupIoSign\Contracts\Models\TrustupIoSignedDocumentContract;

class IndexSignedDocumentResponse extends IndexSignedDocumentResponse implements IndexSignedDocumentResponseContract
{
    /**
     * @return Collection<int, TrustupIoSignedDocumentContract>
     */
    protected Collection $document;


    /**
     * @return Collection<int, TrustupIoSignedDocumentContract>
     */
    public function getSignedDocument(): Collection
    {
        if ($this->getResponse()->failed()) return collect();

        $body = $this->getResponse()->response()->get(true)["data"] ?? null;
        // TODO
        if (!$body) return collect();

        return collect($body)->map(
            fn (array $attributes) =>
            $this->transformRawDocument($attributes)
        );
    }

    protected function transformRawDocument(array $attributes): TrustupIoSignedDocumentContract
    {
        /** @var TrustupIoSignedDocumentContract */
        $signedDocument = app()->make(TrustupIoSignedDocumentContract::class);

        return $signedDocument->fromArray($attributes);
    }
}
