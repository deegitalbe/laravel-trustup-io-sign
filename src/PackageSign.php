<?php

namespace Deegitalbe\TrustupIoSign;

use Deegitalbe\TrustupIoSign\Contracts\PackageSignContract;
use Henrotaym\LaravelPackageVersioning\Services\Versioning\VersionablePackage;

/**
 *  @method static string getUrl() 
 */

class PackageSign extends VersionablePackage implements PackageSignContract
{
    public static function prefix(): string
    {
        return "package_sign";
    }

    public function getUrl(): string
    {
        if ($environmentUrl = env("TRUSTUP_IO_SIGN_URL")) return $environmentUrl;
        if (app()->environment("staging")) return "https://staging.sign.trustup.io";
        if (app()->environment("production")) return "https://sign.trustup.io";

        return "trustup-io-sign";
    }
}
