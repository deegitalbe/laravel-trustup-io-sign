<?php
namespace Henrotaym\VersioningPackageTemplate\Contracts;

use Henrotaym\LaravelPackageVersioning\Services\Versioning\Contracts\VersionablePackageContract;
use Henrotaym\LaravelContainerAutoRegister\Services\AutoRegister\Contracts\AutoRegistrableContract;

/**
 * Versioning package.
 */
interface VersioningPackageTemplateContract extends VersionablePackageContract, AutoRegistrableContract
{
    
}