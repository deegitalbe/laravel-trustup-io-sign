<?php
namespace Deegitalebe\PackageSign;

use Deegitalebe\PackageSign\Contracts\PackageSignContract;
use Henrotaym\LaravelPackageVersioning\Services\Versioning\VersionablePackage;

class PackageSign extends VersionablePackage implements PackageSignContract
{
    public static function prefix(): string
    {
        return "package_sign";
    }

    /** Get the generated url with query */
    public function getUrl(){

    }
}