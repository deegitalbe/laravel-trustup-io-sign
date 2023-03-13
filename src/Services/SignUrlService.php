<?php

namespace Deegitalbe\TrustupIoSign\Services;

use Deegitalbe\TrustupIoSign\Contracts\Models\TrustupIoSignedDocumentRelatedModelContract;
use Deegitalbe\TrustupIoSign\Facades\TrustupIoSign;
use Deegitalbe\TrustupIoSign\Facades\TrustupIoSignFacade;

class SignUrlService
{

    public function generateUrl(TrustupIoSignedDocumentRelatedModelContract $model): string
    {
        /** @var  RequestContract */
        $request = app()->make(RequestContract::class);
        $request->setUrl(TrustupIoSignFacade::getUrl())->addQuery([
            "callback" => $model->trustupIoSignCallback ?? $model->getTrustupIoSignCallbackUrl(),
            "modelId" => $model->getTrustupIoSignModelId(),
            "modelType" => $model->getTrustupIoSignModelType(),
            "documentUrl" => $model->getTrustupIoSignOriginalPdfUrl()
        ]);
        return $request->url();
    }
}
