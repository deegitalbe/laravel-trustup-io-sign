<?php

namespace Deegitalbe\TrustupIoSign\Models;

use Illuminate\Support\Str;
use Deegitalbe\TrustupIoSign\Services\SignUrlService;
use Deegitalbe\TrustupIoSign\Facades\TrustupIoSignFacade;

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
        return TrustupIoSignFacade::getConfig("app_key");
    }

    public function getTrustupIoSignWebHookUrl(): string
    {
        return route("webhooks.trustup-io-sign.signed-document.stored");
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
