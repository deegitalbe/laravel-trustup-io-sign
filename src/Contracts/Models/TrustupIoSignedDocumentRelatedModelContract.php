<?php

namespace Deegitalebe\PackageSign\Contracts\Models;

interface TrustupIoSignedDocumentRelatedModelContract
{
    public function getTrustupIoSignDocumentUrl(): string;

    public function getTrustupIoSignRedirectUrl(): string;

    public function getTrustupIoSignedDocumentColumn(): ?string;

    public function getTrustupIoSignModelType(): string;

    public function getTrustupIoSignModelId(): string;

    public function getTrustupIoSignCallbackUrl(): string;
}
