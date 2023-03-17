<?php

namespace Deegitalbe\TrustupIoSign;

use Deegitalbe\TrustupIoSign\Contracts\TrustupIoSignContract;
use Henrotaym\LaravelPackageVersioning\Services\Versioning\VersionablePackage;

/**
 *  @method static string getUrl() 
 */

class TrustupIoSign extends VersionablePackage implements TrustupIoSignContract
{
    public static function prefix(): string
    {
        return "laravel-trustup-io-sign";
    }

    public function getUrl(): string
    {
        if ($environmentUrl = env("TRUSTUP_IO_SIGN_URL")) return $environmentUrl;
        if (app()->environment("staging")) return "https://staging.sign.trustup.io";
        if (app()->environment("production")) return "https://sign.trustup.io";

        return "https://sign.trustup.io.test";
    }
}
