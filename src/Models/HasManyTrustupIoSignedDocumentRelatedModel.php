<?php

namespace Deegitalbe\TrustupIoSign\Models;


use Illuminate\Support\Collection;
use Deegitalbe\TrustupIoSign\Models\IsTrustupIoSignedDocumentRelatedModel;
use Deegitalbe\TrustupIoSign\Contracts\Models\TrustupIoSignedDocumentContract;
use Deegitalbe\TrustupIoSign\Models\TrustupIoSignedDocumentRelatedModelWithRelations;
use Deegitalbe\LaravelTrustupIoExternalModelRelations\Contracts\Models\Relations\ExternalModelRelationContract;

trait HasManyTrustupIoSignedDocumentRelatedModel
{
    use TrustupIoSignedDocumentRelatedModelWithRelations, IsTrustupIoSignedDocumentRelatedModel;


    public function trustupIoSignedDocuments(): ExternalModelRelationContract
    {
        return $this->hasManyTrustupIoSignedDocuments($this->getTrustupIoSignedDocumentsColumn());
    }

    /** @return Collection<int, TrustupIoSignedDocumentContract> */
    public function getTrustupIoSignedDocuments(): Collection
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
