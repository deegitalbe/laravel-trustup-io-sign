<?php

namespace Deegitalbe\TrustupIoSign\Models;


use Deegitalbe\LaravelTrustupIoExternalModelRelations\Traits\Models\IsExternalModelRelatedModel;
use Deegitalbe\LaravelTrustupIoExternalModelRelations\Contracts\Models\Relations\ExternalModelRelationContract;

trait IsTrustupIoSignedDocumentRelatedModelWithRelations
{
    use IsExternalModelRelatedModel;
    /**
     * Defining a has many relation to signed documents external model.
     * 
     * @param string $columnName Column where signed documents identifiers are stored.
     * @param string $name
     * @return ExternalModelRelationContract
     */
    public function hasManyTrustupIoSignedDocuments(string $columnName, ?string $name = null): ExternalModelRelationContract
    {
        return $this->hasManyExternalModels(
            app()->make(TrustupIoSignedDocumentLoadingCallback::class),
            $columnName,
            $name
        );
    }
    /**
     * Defining a belongs to relation to signed documents external model.
     * 
     * @param string $columnName Column where signed document identifier is stored.
     * @param string $name
     * @return ExternalModelRelationContract
     */
    public function belongsToTrustupIoSignedDocument(string $columnName, ?string $name = null): ExternalModelRelationContract
    {
        return $this->belongsToExternalModel(
            app()->make(TrustupIoSignedDocumentLoadingCallback::class),
            $columnName,
            $name
        );
    }
}
