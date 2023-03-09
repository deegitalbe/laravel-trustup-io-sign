<?php
namespace Deegitalebe\PackageSign\Facades;

use Deegitalebe\PackageSign\PackageSign;
use Henrotaym\LaravelPackageVersioning\Facades\Abstracts\VersionablePackageFacade;

class PackageSignFacade extends VersionablePackageFacade
{
    public static function getPackageClass(): string
    {
        return PackageSign::class;
    }
}