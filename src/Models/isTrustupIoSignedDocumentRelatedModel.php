<?php

namespace Deegitalbe\TrustupIoSign\Models;

use Illuminate\Support\Str;
use Deegitalebe\PackageSign\Services\SignUrlService;
use Deegitalbe\TrustupIoSign\Facades\PackageSignFacade as FacadesPackageSignFacade;

trait IsTrustupIoSignedDocumentRelatedModel
{

    protected string $trustupIoSignCallback;
    protected string $trustupIoSignWebhook;

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
        return FacadesPackageSignFacade::getConfig("app_key");
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
        if ($callback) $this->setTrustupIoSignCallback($callback);
        if ($webhook) $this->setTrustupIoSignWebhook($webhook);

        return $signUrlService->generateUrl($this);
    }

    protected function setTrustupIoSignCallback(string $callback): self
    {
        $this->trustupIoSignCallback = $callback;
        return $this;
    }

    protected function setTrustupIoSignWebhook($webhook): self
    {
        $this->trustupIoSignWebhook = $webhook;
        return $this;
    }
}
