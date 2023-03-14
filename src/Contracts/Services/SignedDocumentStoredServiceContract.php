<?php

namespace Deegitalbe\TrustupIoSign\Contracts\Services;


interface SignedDocumentStoredServiceContract
{
    public function setModelRelatedSignedDocuments(array $attributes): void;
}
