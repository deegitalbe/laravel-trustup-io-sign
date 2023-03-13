<?php

namespace Deegitalbe\TrustupIoSign\Providers;

use Deegitalbe\TrustupIoSign\TrustupIoSign;
use Deegitalbe\TrustupIoSign\Api\Endpoints\SignedDocument\SignedDocumentEndpoint;
use Deegitalbe\TrustupIoSign\Api\Responses\SignedDocument\SignedDocumentResponse;
use Deegitalbe\TrustupIoSign\Api\Requests\SignedDocument\IndexSignedDocumentRequest;
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
    }

    protected function addToBoot(): void
    {
        //
    }
}