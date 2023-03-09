<?php

namespace Deegitalbe\LaravelTrustupIoAudit\Models;

use Illuminate\Support\Collection;
use Deegitalbe\LaravelTrustupIoExternalModelRelations\Contracts\Models\ExternalModelContract;
use Deegitalbe\LaravelTrustupIoExternalModelRelations\Traits\Models\IsExternalModelRelatedModel;
use Deegitalbe\LaravelTrustupIoExternalModelRelations\Contracts\Models\Relations\ExternalModelRelationContract;

trait IsTrustupIoSignRelatedModelWithRelations
{
    use IsExternalModelRelatedModel;


    public function getTrustupIoSignColumn(): string
    {
        return 'trustup_io_audit_log_uuids';
    }

    public function trustupIoSigns(): ExternalModelRelationContract
    {
        return $this->hasManyExternalModels(app()->make(TrustupIoLogLoadingCallback::class), $this->getTrustupIoSigns());
    }

    /** @return Collection<int, ExternalModelContract> */
    public function getTrustupIoSigns(): Collection
    {
        return $this->getExternalModels('trustupIoSigns');
    }

    public function initializeIsTrustupIoAuditRelatedModelWithRelations()
    {
        $this->getExternalModelRelationSubscriber()->register($this->trustupIoSigns());
    }
}
