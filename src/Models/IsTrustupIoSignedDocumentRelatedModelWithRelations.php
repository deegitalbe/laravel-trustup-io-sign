<?php

namespace Deegitalbe\TrustupIoSign\Models;

use Illuminate\Support\Collection;
use Deegitalbe\LaravelTrustupIoExternalModelRelations\Contracts\Models\ExternalModelContract;
use Deegitalbe\LaravelTrustupIoExternalModelRelations\Traits\Models\IsExternalModelRelatedModel;
use Deegitalbe\TrustupIoSign\Models\IsTrustupIoSignedDocumentRelatedModelWithRelations as ModelsIsTrustupIoSignedDocumentRelatedModelWithRelations;

trait IsTrustupIoSignedDocumentRelatedModelWithRelations
{
    use IsExternalModelRelatedModel, ModelsIsTrustupIoSignedDocumentRelatedModelWithRelations;


    /** @return Collection<int, ExternalModelContract> */
    public function getTrustupIoSignDocument(): Collection
    {
        return $this->getExternalModels('trustupIoSignDocument');
    }

    public function initializeIsTrustupIoAuditRelatedModelWithRelations()
    {
        $this->getExternalModelRelationSubscriber()->register($this->trustupIoSignDocument());
    }
}
