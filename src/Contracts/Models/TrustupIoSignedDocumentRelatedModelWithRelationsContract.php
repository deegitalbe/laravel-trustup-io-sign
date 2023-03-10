<?php

namespace Deegitalebe\PackageSign\Contracts\Models;

use Illuminate\Support\Collection;
use Deegitalbe\LaravelTrustupIoExternalModelRelations\Contracts\Models\ExternalModelRelatedModelContract;
use Deegitalbe\LaravelTrustupIoExternalModelRelations\Contracts\Models\Relations\ExternalModelRelationContract;

interface TrustupIoSignedDocumentRelatedModelWithRelationsContract extends ExternalModelRelatedModelContract, TrustupIoSignedDocumentRelatedModelContract
{
    public function trustupIoSignDocument(): ExternalModelRelationContract;

    /** @return Collection<int, ExternalModelContract> */
    public function getTrustupIoSignDocument(): Collection;
}
