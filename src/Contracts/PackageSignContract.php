<?php

namespace Deegitalbe\TrustupIoSign\Contracts;

use Henrotaym\LaravelPackageVersioning\Services\Versioning\Contracts\VersionablePackageContract;
use Henrotaym\LaravelContainerAutoRegister\Services\AutoRegister\Contracts\AutoRegistrableContract;

/**
 * PackageSign package facade implementation contract.
 */
interface PackageSignContract extends VersionablePackageContract, AutoRegistrableContract
{
}
