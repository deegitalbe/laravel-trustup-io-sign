<?php

namespace Deegitalbe\TrustupIoSign\Models;

use Deegitalbe\LaravelTrustupIoExternalModelRelations\Traits\IsExternalModelRelated;
use Deegitalbe\TrustupIoSign\Contracts\Models\TrustupIoSignedDocumentRelatedModelWithRelations;

// Full custom trait need to define every fields.
trait HasManyTrustupIoSignedDocumentRelatedModel
{
    use TrustupIoSignedDocumentRelatedModelWithRelations, IsExternalModelRelated;
}
