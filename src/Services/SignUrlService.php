<?php

namespace Deegitalebe\PackageSign\Services;

use Deegitalebe\PackageSign\Contracts\Models\TrustupIoSignedDocumentRelatedModelContract;
use Deegitalebe\PackageSign\Services\SignUrls\SignUrlServiceAdapter;


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
        $request->setUrl("https://sign.trustup.io.test/api/signatures")->addQuery([
            "redirect" => $model->getTrustupIoSignRedirectUrl(),
            "callback" => $model->getTrustupIoSignCallbackUrl(),
            "modelId" => $model->getTrustupIoSignModelId(),
            "modelType" => $model->getTrustupIoSignModelType(),
            "documentUrl" => $model->getTrustupIoSignDocumentUrl()
        ]);
        return $request->url();
    }
}
