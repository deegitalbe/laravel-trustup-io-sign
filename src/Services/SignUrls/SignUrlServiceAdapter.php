<?php

namespace Deegitalbe\LaravelTrustupIoAudit\Services\Logs\Adapters;

use Deegitalebe\PackageSign\Facades\PackageSignFacade;

class SignUrlServiceAdapter
{
    public function getAppKey(): string
    {
        return PackageSignFacade::getConfig("app_key");
    }
}
