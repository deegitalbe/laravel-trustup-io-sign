<?php

namespace Deegitalbe\TrustupIoSign\Models;


use Deegitalbe\TrustupIoSign\Contracts\Models\TrustupIoSignedDocumentContract;
use Deegitalbe\LaravelTrustupIoExternalModelRelations\Traits\IsExternalModelRelated;
use Deegitalbe\TrustupIoSign\Contracts\Models\TrustupIoSignedDocumentRelatedModelWithRelationsContract;
use Deegitalbe\LaravelTrustupIoExternalModelRelations\Contracts\Models\Relations\ExternalModelRelationContract;
use Deegitalbe\TrustupIoSign\Models\IsTrustupIoSignedDocumentRelatedModelWithRelations as ModelsIsTrustupIoSignedDocumentRelatedModelWithRelations;

trait DefaultTrustupIoSignedDocumentRelatedModel
{
    use IsExternalModelRelated, ModelsIsTrustupIoSignedDocumentRelatedModelWithRelations, IsTrustupIoSignedDocumentRelatedModel;

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

    /**
     * Setting related signed document.
     * 
     * @param ?TrustupIoSignedDocumentContract $document
     * @return static
     */
    public function setTrustupIoSignedDocument(?TrustupIoSignedDocumentContract $document): TrustupIoSignedDocumentRelatedModelWithRelationsContract
    {
        $this->trustupIoSignedDocument()->setRelatedModels($document);
        return $this;
    }
}
