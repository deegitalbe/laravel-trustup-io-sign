<?php

namespace Deegitalbe\TrustupIoSign\Models;


use Deegitalbe\TrustupIoSign\Models\IsTrustupIoSignedDocumentRelatedModel;
use Deegitalbe\TrustupIoSign\Contracts\Models\TrustupIoSignedDocumentContract;
use Deegitalbe\TrustupIoSign\Models\TrustupIoSignedDocumentRelatedModelWithRelations;
use Deegitalbe\LaravelTrustupIoExternalModelRelations\Contracts\Models\Relations\ExternalModelRelationContract;

trait BelongsToTrustupIoSignedDocumentRelatedModel
{
    use  TrustupIoSignedDocumentRelatedModelWithRelations, IsTrustupIoSignedDocumentRelatedModel;

    public function trustupIoSignedDocument(): ExternalModelRelationContract
    {
        return $this->belongsToTrustupIoSignedDocument($this->getTrustupIoSignedDocumentColumn());
    }

    /** @return ?TrustupIoSignedDocumentContract */
    public function getTrustupIoSignedDocument(): ?TrustupIoSignedDocumentContract
    {
        return $this->getExternalModels('trustupIoSignedDocument');
    }

    /**
     * Trait should define a defalut value for this column.
     */
    public function getTrustupIoSignedDocumentColumn(): string
    {
        return "trustup_io_signed_document_uuid";
    }

    public function getTrustupIoSignModelTypeIdentifier(): string
    {
        return "uuid";
    }
}
