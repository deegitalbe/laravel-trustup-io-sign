<?php

namespace Deegitalebe\PackageSign\Models;

use Deegitalebe\PackageSign\Contracts\Models\TrustupIoSignedDocumentRelatedModelContract;
use Illuminate\Support\Str;
use Deegitalebe\PackageSign\Facades\PackageSignFacade;
use Deegitalebe\PackageSign\Services\SignUrlService;

trait IsTrustupIoSignedDocumentRelatedModel
{
    /**
     * Getting model identifier
     */
    public function getTrustupIoSignModelId(): string
    {
        /** @var Model $this */
        return $this->uuid ??
            $this->id;
    }

    /**
     * Getting model type for media.trustup.io
     */
    public function getTrustupIoSignModelType(): string
    {
        /** @var Model $this */
        return Str::slug(str_replace('\\', '-', $this->getMorphClass()));
    }


    public function getTrustupIoSignAppKey(): string
    {
        return PackageSignFacade::getConfig("app_key");
    }


    public function getTrustupIoSignedDocumentColumn(): ?string
    {
        return "trustup_io_signed_document_uuid";
    }

    public function getTrustupIoSignWebHookUrl(): string
    {
        return $this->signWebhookUrl;
    }

    public function getTrustupIoSignUrl(?string $callback = null, ?string $webhook = null): string
    {
        /** @var SignUrlService */
        $signUrlService = app()->make(SignUrlService::class);
        if ($callback) $this->callback = $callback;
        if ($webhook) $this->webhook = $webhook;

        return $signUrlService->generateUrl($this->getUrlRelatedAttributes());
    }

    protected function getUrlRelatedAttributes(): TrustupIoSignedDocumentRelatedModelContract
    {
        return static::get()->first();
    }
}
