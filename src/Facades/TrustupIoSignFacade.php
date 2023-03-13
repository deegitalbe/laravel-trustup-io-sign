<?php

namespace Deegitalbe\TrustupIoSign\Facades;

use Deegitalbe\TrustupIoSign\TrustupIoSign as PackageClass;
use Henrotaym\LaravelPackageVersioning\Facades\Abstracts\VersionablePackageFacade;

class TrustupIoSignFacade extends VersionablePackageFacade
{
    public static function getPackageClass(): string
    {
        return PackageClass::class;
    }
}
