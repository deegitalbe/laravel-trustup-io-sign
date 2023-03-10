<?php

namespace Deegitalbe\LaravelTrustupIoAudit\Models;

use Illuminate\Support\Str;

trait IsTrustupIoSignRelatedModel
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
}
