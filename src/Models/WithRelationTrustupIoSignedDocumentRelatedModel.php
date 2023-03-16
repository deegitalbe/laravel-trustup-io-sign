<?php

namespace Deegitalbe\TrustupIoSign\Models;



use Deegitalbe\TrustupIoSign\Contracts\Models\TrustupIoSignedDocumentRelatedModelWithRelations;

// Full custom trait need to define every fields.
trait HasManyTrustupIoSignedDocumentRelatedModel
{
    use TrustupIoSignedDocumentRelatedModelWithRelations;
}
