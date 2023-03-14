<?php

namespace Deegitalbe\TrustupIoSign\Contracts\Models;


use Deegitalbe\TrustupIoSign\Contracts\Models\TrustupIoSignedDocumentContract;
use Deegitalbe\LaravelTrustupIoExternalModelRelations\Contracts\Models\Relations\ExternalModelRelationContract;

interface DefaultTrustupIoSignedDocumentRelatedModelContract extends TrustupIoSignedDocumentRelatedModelWithRelationsContract
{
    public function trustupIoSignedDocuments(): ExternalModelRelationContract;

    /** @return ?TrustupIoSignedDocumentContract */
    public function getTrustupIoSignedDocument(): ?TrustupIoSignedDocumentContract;

    /**
     * Trait should define a defalut value for this column.
     */
    public function getTrustupIoSignedDocumentColumn(): string;

    public function getTrustupIoSignModelTypeIdentifier(): string;
}
