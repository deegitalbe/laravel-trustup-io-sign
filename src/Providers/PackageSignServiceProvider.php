<?php

namespace Deegitalebe\PackageSign\Providers;

use Deegitalbe\LaravelTrustupIoAudit\Api\Responses\Logs\SignedDocumentResponse;
use Deegitalebe\PackageSign\Api\Endpoints\SignedDocument\SignedDocumentEndpoint;
use Deegitalebe\PackageSign\Api\Responses\Logs\IndexSignedDocumentResponse;
use Deegitalebe\PackageSign\Contracts\Api\Endpoints\SignedDocument\SignedDocumentEndpointContract;
use Deegitalebe\PackageSign\Contracts\api\Requests\SignedDocument\IndexSignedDocumentRequest;
use Deegitalebe\PackageSign\Contracts\api\Requests\SignedDocument\IndexSignedDocumentRequestContract;
use Deegitalebe\PackageSign\Contracts\Api\Responses\signedDocument\IndexSignedDocumentResponseContract;
use Deegitalebe\PackageSign\Contracts\Api\Responses\signedDocument\SignedDocumentResponseContract;
use Deegitalebe\PackageSign\PackageSign;
use Henrotaym\LaravelPackageVersioning\Providers\Abstracts\VersionablePackageServiceProvider;

class PackageSignServiceProvider extends VersionablePackageServiceProvider
{
    public static function getPackageClass(): string
    {
        return PackageSign::class;
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
