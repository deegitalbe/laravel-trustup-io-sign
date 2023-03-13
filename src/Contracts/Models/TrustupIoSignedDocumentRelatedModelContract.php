<?php

namespace Deegitalbe\TrustupIoSign\Contracts\Models;

interface TrustupIoSignedDocumentRelatedModelContract
{
    /**
     * PDF url where document is accessible for sign microservice.
     * 
     * @return string
     */
    public function getTrustupIoSignOriginalPdfUrl(): string;

    public function getTrustupIoSignModelType(): string;

    public function getTrustupIoSignModelId(): string;

    public function getTrustupIoSignCallbackUrl(): string;

    public function getTrustupIoSignUrl(?string $callback = null, ?string $webhook = null): string;
}
