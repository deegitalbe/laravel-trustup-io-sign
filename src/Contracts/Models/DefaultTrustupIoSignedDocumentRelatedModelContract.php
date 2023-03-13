<?php

namespace Deegitalbe\TrustupIoSign\Contracts\Models;


use Deegitalbe\TrustupIoSign\Contracts\Models\TrustupIoSignedDocumentContract;
use Deegitalbe\LaravelTrustupIoExternalModelRelations\Contracts\Models\Relations\ExternalModelRelationContract;

interface DefaultTrustupIoSignedDocumentRelatedModelContract extends TrustupIoSignedDocumentRelatedModelWithRelationsContract
{
    public function trustupIoSignedDocument(): ExternalModelRelationContract;

    /** @return ?TrustupIoSignedDocumentContract */
    public function getTrustupIoSignedDocument(): ?TrustupIoSignedDocumentContract;

    /**
     * Trait should define a defalut value for this column.
     */
    public function getTrustupIoSignedDocumentColumn(): string;

    /**
     * Setting related signed document.
     * 
     * @param ?TrustupIoSignedDocumentContract $document
     * @return static
     */
    public function setTrustupIoSignedDocument(?TrustupIoSignedDocumentContract $document): TrustupIoSignedDocumentRelatedModelWithRelationsContract;
}
