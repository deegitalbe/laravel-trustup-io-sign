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

    public function getTrustupIoSignWebhookUrl(): string;

    public function getTrustupIoSignAppKey(): string;
}
