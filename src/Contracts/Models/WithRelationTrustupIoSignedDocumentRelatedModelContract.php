<?php

namespace Deegitalbe\TrustupIoSign\Contracts\Models;


use Illuminate\Support\Collection;
use Deegitalbe\TrustupIoSign\Contracts\Models\TrustupIoSignedDocumentContract;
use Deegitalbe\TrustupIoSign\Contracts\Models\TrustupIoSignedDocumentRelatedModelWithRelationsContract;
use Deegitalbe\LaravelTrustupIoExternalModelRelations\Contracts\Models\Relations\ExternalModelRelationContract;

interface WithRelationTrustupIoSignedDocumentRelatedModelContract extends TrustupIoSignedDocumentRelatedModelWithRelationsContract
{
    public function trustupIoSignedDocuments(): ExternalModelRelationContract;

    /** @return Collection<int, TrustupIoSignedDocumentContract> */
    public function getTrustupIoSignedDocuments(): Collection;

    /**
     * Trait should define a defalut value for this column.
     */
    public function getTrustupIoSignedDocumentsColumn(): string;

    public function getTrustupIoSignModelTypeIdentifier(): string;
}
