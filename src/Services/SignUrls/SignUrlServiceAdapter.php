<?php

namespace Deegitalbe\LaravelTrustupIoAudit\Services\Logs\Adapters;

use Deegitalebe\PackageSign\Facades\PackageSignFacade;

class SignUrlServiceAdapter
{
    public function getAppKey(): string
    {
        return PackageSignFacade::getConfig("app_key");
    }

    public function getResponsibleId(): string
    {
        return auth()->user()->id;
    }

    public function getResponsibleType(): string
    {
        return 'user';
    }
}
