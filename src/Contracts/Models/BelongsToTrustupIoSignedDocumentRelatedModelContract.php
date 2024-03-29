<?php

namespace Deegitalbe\TrustupIoSign\Contracts\Models;


use Deegitalbe\TrustupIoSign\Contracts\Models\TrustupIoSignedDocumentContract;
use Deegitalbe\TrustupIoSign\Contracts\Models\TrustupIoSignedDocumentRelatedModelWithRelationsContract;
use Deegitalbe\LaravelTrustupIoExternalModelRelations\Contracts\Models\Relations\ExternalModelRelationContract;

interface BelongsToTrustupIoSignedDocumentRelatedModelContract extends TrustupIoSignedDocumentRelatedModelWithRelationsContract
{
    public function trustupIoSignedDocument(): ExternalModelRelationContract;

    /** @return ?TrustupIoSignedDocumentContract */
    public function getTrustupIoSignedDocument(): ?TrustupIoSignedDocumentContract;

    /**
     * Trait should define a defalut value for this column.
     */
    public function getTrustupIoSignedDocumentColumn(): string;

    public function getTrustupIoSignModelTypeIdentifier(): string;
}
