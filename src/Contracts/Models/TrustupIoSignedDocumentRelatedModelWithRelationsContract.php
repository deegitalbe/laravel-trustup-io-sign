<?php

namespace Deegitalbe\TrustupIoSign\Contracts\Models;

use Deegitalbe\TrustupIoSign\Contracts\Models\TrustupIoSignedDocumentContract;
use Deegitalbe\LaravelTrustupIoExternalModelRelations\Contracts\Models\ExternalModelRelatedModelContract;
use Deegitalbe\LaravelTrustupIoExternalModelRelations\Contracts\Models\Relations\ExternalModelRelationContract;

interface TrustupIoSignedDocumentRelatedModelWithRelationsContract extends ExternalModelRelatedModelContract, TrustupIoSignedDocumentRelatedModelContract
{
    /**
     * Defining a has many relation to signed documents external model.
     * 
     * @param string $columnName Column where signed documents identifiers are stored.
     * @param string $name
     * @return ExternalModelRelationContract
     */
    public function hasManyTrustupIoSignedDocuments(string $columnName, ?string $name = null): ExternalModelRelationContract;

    /**
     * Defining a belongs to relation to signed documents external model.
     * 
     * @param string $columnName Column where signed document identifier is stored.
     * @param string $name
     * @return ExternalModelRelationContract
     */
    public function belongsToTrustupIoSignedDocument(string $columnName, ?string $name = null): ExternalModelRelationContract;
    /*
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