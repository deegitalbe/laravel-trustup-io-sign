<?php
namespace Deegitalebe\PackageSign\Tests;

use Deegitalebe\PackageSign\PackageSign;
use Henrotaym\LaravelPackageVersioning\Testing\VersionablePackageTestCase;
use Deegitalebe\PackageSign\Providers\PackageSignServiceProvider;

class TestCase extends VersionablePackageTestCase
{
    public static function getPackageClass(): string
    {
        return PackageSign::class;
    }

    public function getEnvironmentSetUp($app)
    {
        $this->loadMigrations();
    }
    
    public function getServiceProviders(): array
    {
        return [
            PackageSignServiceProvider::class
        ];
    }

    protected function loadMigrations()
    {
        foreach($this->getMigrations() as $migration):
            app()->make($migration)->up();
        endforeach;
    }

    /**
     * Define your migrations files here.
     * 
     * @return array<int, string> 
     */
    protected function getMigrations(): array
    {
        return [];
    }
}