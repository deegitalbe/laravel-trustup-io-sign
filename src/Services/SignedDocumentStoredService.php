<?php

namespace Deegitalbe\TrustupIoSign\Services;

use Illuminate\Support\Facades\Log;
use Deegitalbe\TrustupIoSign\Facades\TrustupIoSignFacade;
use Deegitalbe\TrustupIoSign\Contracts\Services\SignedDocumentStoredServiceContract;
use Deegitalbe\TrustupIoSign\Contracts\Models\HasManyTrustupIoSignedDocumentRelatedModelContract;
use Deegitalbe\TrustupIoSign\Contracts\Models\BelongsToTrustupIoSignedDocumentRelatedModelContract;

class SignedDocumentStoredService implements SignedDocumentStoredServiceContract
{
    public function setModelRelatedSignedDocuments(array $attributes): void
    {
        if (!$attributes) {
            Log::alert("SignedDocument Service", ["error" =>  "Something went wrong could not get attrobutes from webhook."]);
        }

        $model = $this->getModel($attributes);

        if (!$model) {
            Log::alert("SignedDocument Service", ["error" =>  "Could not find corresponding model."]);
        }

        if ($model instanceof BelongsToTrustupIoSignedDocumentRelatedModelContract) :
            $model->trustupIoSignedDocument()->setRelatedModelsByIds($attributes['uuid']);
            return;
        endif;

        $model->trustupIoSignedDocuments()->addToRelatedModelsByIds($attributes["uuid"]);
    }


    protected function getModel(array $attributes): BelongsToTrustupIoSignedDocumentRelatedModelContract|HasManyTrustupIoSignedDocumentRelatedModelContract
    {
        foreach (TrustupIoSignFacade::getConfig("models") as $modelClass) :

            if ($modelClass::getModel()->getTrustupIoSignModelType() !== $attributes["modelType"]) continue;

            return $modelClass::where(
                $modelClass::getModel()->getTrustupIoSignModelTypeIdentifier(),
                $attributes["modelId"]
            )->firstOrFail();
        endforeach;
    }
}
