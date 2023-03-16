<?php

namespace Deegitalbe\TrustupIoSign\Models;

use Deegitalbe\LaravelTrustupIoExternalModelRelations\Traits\IsExternalModelRelated;
use Deegitalbe\TrustupIoSign\Models\TrustupIoSignedDocumentRelatedModelWithRelations;

// Full custom trait need to define every fields.
trait WithRelationTrustupIoSignedDocumentRelatedModel
{
    use TrustupIoSignedDocumentRelatedModelWithRelations, IsExternalModelRelated;
}
