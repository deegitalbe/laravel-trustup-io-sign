<?php

namespace Deegitalbe\LaravelTrustupIoAudit\Models;

use Illuminate\Support\Str;

trait IsTrustupIoSignRelatedModel
{
    /**
     * Getting model identifier
     */
    public function getTrustupIoAuditModelId(): string
    {
        /** @var Model $this */
        return $this->uuid ??
            $this->id;
    }

    /**
     * Getting model type for media.trustup.io
     */
    public function getTrustupIoAuditModelType(): string
    {
        /** @var Model $this */
        return Str::slug(str_replace('\\', '-', $this->getMorphClass()));
    }
}
