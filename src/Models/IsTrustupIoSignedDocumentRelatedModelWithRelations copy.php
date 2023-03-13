<?php

namespace Deegitalbe\TrustupIoSign\Models;

use Deegitalbe\LaravelTrustupIoAudit\Models\TrustupIoSignedDocumentLoadingCallback;
use Illuminate\Support\Collection;
use Deegitalbe\LaravelTrustupIoExternalModelRelations\Contracts\Models\ExternalModelContract;
use Deegitalbe\LaravelTrustupIoExternalModelRelations\Traits\Models\IsExternalModelRelatedModel;
use Deegitalbe\LaravelTrustupIoExternalModelRelations\Contracts\Models\Relations\ExternalModelRelationContract;

trait IsTrustupIoSignedDocumentRelatedModelWithRelations
{
    use IsExternalModelRelatedModel, IsTrustupIoSignedDocumentRelatedModel;


    public function trustupIobelongsToExternalModelSignDocument(): ExternalModelRelationContract
    {
        return $this->belongsToExternalModel(app()->make(TrustupIoSignedDocumentLoadingCallback::class), $this->getTrustupIoSignedDocumentColumn());
    }

    public function trustupIohasManyExternalModelsSignDocument(): ExternalModelRelationContract
    {
        return $this->hasManyExternalModels(app()->make(TrustupIoSignedDocumentLoadingCallback::class), $this->getTrustupIoSignedDocumentColumn());
    }

    /** @return Collection<int, ExternalModelContract> */
    public function getTrustupIoSignDocument(): Collection
    {
        return $this->getExternalModels('trustupIoSignDocument');
    }
}
