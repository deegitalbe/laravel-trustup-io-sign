<?php

namespace Deegitalbe\TrustupIoSign\Facades;

use Henrotaym\LaravelPackageVersioning\Facades\Abstracts\VersionablePackageFacade;

class PackageSignFacade extends VersionablePackageFacade
{
    public static function getPackageClass(): string
    {
        return PackageSignFacade::class;
    }
}
