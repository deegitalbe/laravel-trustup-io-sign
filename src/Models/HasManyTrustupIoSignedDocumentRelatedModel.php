<?php

namespace Deegitalbe\TrustupIoSign\Models;


use Deegitalbe\TrustupIoSign\Contracts\Models\TrustupIoSignedDocumentContract;
use Deegitalbe\LaravelTrustupIoExternalModelRelations\Traits\IsExternalModelRelated;
use Deegitalbe\TrustupIoSign\Contracts\Models\TrustupIoSignedDocumentRelatedModelWithRelations;
use Deegitalbe\LaravelTrustupIoExternalModelRelations\Contracts\Models\Relations\ExternalModelRelationContract;

trait HasManyTrustupIoSignedDocumentRelatedModel
{
    use IsExternalModelRelated, TrustupIoSignedDocumentRelatedModelWithRelations, IsTrustupIoSignedDocumentRelatedModel;


    public function trustupIoSignedDocuments(): ExternalModelRelationContract
    {
        return $this->hasManyTrustupIoSignedDocuments($this->getTrustupIoSignedDocumentsColumn());
    }

    /** @return ?TrustupIoSignedDocumentContract */
    public function getTrustupIoSignedDocuments(): ?TrustupIoSignedDocumentContract
    {
        return $this->getExternalModels('trustupIoSignedDocuments');
    }

    /**
     * Trait should define a defalut value for this column.
     */
    public function getTrustupIoSignedDocumentsColumn(): string
    {
        return "trustup_io_signed_document_uuids";
    }

    public function getTrustupIoSignModelTypeIdentifier(): string
    {
        return "uuid";
    }
}
