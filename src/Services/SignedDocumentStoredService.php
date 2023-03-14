<?php

namespace Deegitalbe\TrustupIoSign\Services;

use Deegitalbe\TrustupIoSign\Contracts\Services\SignedDocumentStoredServiceContract;
use Deegitalbe\TrustupIoSign\Contracts\Models\DefaultTrustupIoSignedDocumentRelatedModelContract;
use Deegitalbe\TrustupIoSign\Facades\TrustupIoSignFacade;

class SignedDocumentStoredService implements SignedDocumentStoredServiceContract
{
    public function setModelRelatedSignedDocuments(array $attributes): void
    {
        $model = $this->getModel($attributes);
        $model->trustupIoSignedDocuments()->setRelatedModelsByIds($attributes["uuid"]);
    }

    protected function getModel(array $attributes): DefaultTrustupIoSignedDocumentRelatedModelContract
    {
        // TODO VERIFY IF I GET AN ARRAY FROM CONFIG
        foreach (TrustupIoSignFacade::getConfig("models") as $modelClass) :

            if ($modelClass::getModel()->getTrustupIoSignModelType() !== $attributes["modelType"]) continue;

            return $modelClass::where(
                $modelClass::getModel()->getTrustupIoSignModelTypeIdentifier(),
                $attributes["modelId"]
            )->firstOrFail();
        endforeach;
    }
}
