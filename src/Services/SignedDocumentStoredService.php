<?php

namespace Deegitalbe\TrustupIoSign\Services;

use Deegitalbe\TrustupIoSign\Contracts\Models\BelongsToTrustupIoSignedDocumentRelatedModelContract;
use Deegitalbe\TrustupIoSign\Contracts\Services\SignedDocumentStoredServiceContract;
use Deegitalbe\TrustupIoSign\Contracts\Models\DefaultTrustupIoSignedDocumentRelatedModelContract;
use Deegitalbe\TrustupIoSign\Contracts\Models\HasManyTrustupIoSignedDocumentRelatedModelContract;
use Deegitalbe\TrustupIoSign\Facades\TrustupIoSignFacade;
use Illuminate\Support\Facades\Log;

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
