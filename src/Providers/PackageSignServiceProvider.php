<?php
namespace Deegitalebe\PackageSign\Providers;

use Deegitalebe\PackageSign\PackageSign;
use Henrotaym\LaravelPackageVersioning\Providers\Abstracts\VersionablePackageServiceProvider;

class PackageSignServiceProvider extends VersionablePackageServiceProvider
{
    public static function getPackageClass(): string
    {
        return PackageSign::class;
    }

    protected function addToRegister(): void
    {
        //
    }

    protected function addToBoot(): void
    {
        //
    }
}