<?php

namespace Deegitalbe\TrustupIoSign\Providers;

use Illuminate\Support\Facades\Route;
use Deegitalbe\TrustupIoSign\TrustupIoSign;
use Deegitalbe\TrustupIoSign\Services\SignedDocumentStoredService;
use Deegitalbe\TrustupIoSign\Api\Endpoints\SignedDocument\SignedDocumentEndpoint;
use Deegitalbe\TrustupIoSign\Api\Responses\SignedDocument\SignedDocumentResponse;
use Deegitalbe\TrustupIoSign\Api\Requests\SignedDocument\IndexSignedDocumentRequest;
use Deegitalbe\TrustupIoSign\Contracts\Services\SignedDocumentStoredServiceContract;
use Deegitalbe\TrustupIoSign\Api\Responses\SignedDocument\IndexSignedDocumentResponse;
use Henrotaym\LaravelPackageVersioning\Providers\Abstracts\VersionablePackageServiceProvider;
use Deegitalbe\TrustupIoSign\Contracts\Api\Endpoints\SignedDocument\SignedDocumentEndpointContract;
use Deegitalbe\TrustupIoSign\Contracts\Api\Responses\signedDocument\SignedDocumentResponseContract;
use Deegitalbe\TrustupIoSign\Contracts\api\Requests\SignedDocument\IndexSignedDocumentRequestContract;
use Deegitalbe\TrustupIoSign\Contracts\Api\Responses\signedDocument\IndexSignedDocumentResponseContract;

class TrustupIoSignServiceProvider extends VersionablePackageServiceProvider
{

    public static function getPackageClass(): string
    {
        return TrustupIoSign::class;
    }

    protected function addToRegister(): void
    {
        $this->app->bind(SignedDocumentEndpointContract::class, SignedDocumentEndpoint::class);
        $this->app->bind(SignedDocumentResponseContract::class, SignedDocumentResponse::class);
        $this->app->bind(IndexSignedDocumentResponseContract::class, IndexSignedDocumentResponse::class);
        $this->app->bind(IndexSignedDocumentRequestContract::class, IndexSignedDocumentRequest::class);
        $this->app->bind(SignedDocumentStoredServiceContract::class, SignedDocumentStoredService::class);
    }

    protected function addToBoot(): void
    {
        $this->loadWebhooksRoutes();
    }


    protected function loadWebhooksRoutes(): self
    {
        Route::prefix('webhooks/trustup-io-sign')
            ->middleware(AuthorizedServer::class)
            ->name('webhooks.trustup-io-sign.')
            ->group(function () {
                $this->loadRoutesFrom(__DIR__ . "/../routes/webhooks.php");
            });

        return $this;
    }
}
