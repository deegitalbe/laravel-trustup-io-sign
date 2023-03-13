<?php

namespace Deegitalbe\TrustupIoSign\Services;

use Deegitalebe\PackageSign\Services\SignUrls\SignUrlServiceAdapter;
use Deegitalbe\TrustupIoSign\Contracts\Models\TrustupIoSignedDocumentRelatedModelContract;
use Deegitalbe\TrustupIoSign\Facades\PackageSignFacade;

class SignUrlService
{
    public function __construct(protected SignUrlServiceAdapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function generateUrl(TrustupIoSignedDocumentRelatedModelContract $model): string
    {
        /** @var  RequestContract */
        $request = app()->make(RequestContract::class);
        $request->setUrl(PackageSignFacade::getUrl())->addQuery([
            "callback" => $model->trustupIoSignCallback ?? $model->getTrustupIoSignCallbackUrl(),
            "modelId" => $model->getTrustupIoSignModelId(),
            "modelType" => $model->getTrustupIoSignModelType(),
            "documentUrl" => $model->getTrustupIoSignOriginalPdfUrl()
        ]);
        return $request->url();
    }
}
