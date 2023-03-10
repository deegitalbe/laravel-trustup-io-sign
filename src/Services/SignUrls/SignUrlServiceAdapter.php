<?php

namespace Deegitalebe\PackageSign\Services\SignUrls;

use Deegitalebe\PackageSign\Facades\PackageSignFacade;

class SignUrlServiceAdapter
{
    // TODO DO I NEED IT ? 
    public function getAppKey(): string
    {
        return PackageSignFacade::getConfig("app_key");
    }
}
