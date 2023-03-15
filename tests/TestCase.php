<?php

namespace Deegitalbe\TrustupIoSign\Tests;

use Deegitalbe\TrustupIoSign\TrustupIoSign;
use Henrotaym\LaravelApiClient\Providers\ClientServiceProvider;
use Deegitalbe\TrustupIoSign\Providers\TrustupIoSignServiceProvider;
use Henrotaym\LaravelPackageVersioning\Testing\VersionablePackageTestCase;
use Deegitalbe\ServerAuthorization\Providers\ServerAuthorizationServiceProvider;
use Deegitalbe\LaravelTrustupIoExternalModelRelations\Providers\LaravelTrustupIoExternalModelRelationsServiceProvider;

class TestCase extends VersionablePackageTestCase
{
    public static function getPackageClass(): string
    {
        return TrustupIoSign::class;
    }

    // public function getEnvironmentSetUp($app)
    // {
    //     $this->loadMigrations();
    // }

    public function getServiceProviders(): array
    {
        return [
            TrustupIoSignServiceProvider::class,
            LaravelTrustupIoExternalModelRelationsServiceProvider::class,
            ClientServiceProvider::class,
            // ServerAuthorizationServiceProvider::class,
        ];
    }

    // protected function loadMigrations()
    // {
    //     foreach ($this->getMigrations() as $migration) :
    //         app()->make($migration)->up();
    //     endforeach;
    // }

    /**
     * Define your migrations files here.
     * 
     * @return array<int, string> 
     */
    // protected function getMigrations(): array
    // {
    //     return ['/database/migrations/create_users_table.php', "/tests/database/migrations/create_users_table_with_relations_table.php"];
    // }

    protected function getEnvironmentSetUp($app)
    {
        // $app['config']->set('database.default', 'testbench');
        // $app['config']->set('database.connections.testbench', [
        //     'driver'   => 'sqlite',
        //     'database' => ':memory:',
        //     'prefix'   => '',
        // ]);
        include_once __DIR__ . '/database/migrations/create_invoices_table.php';
        include_once __DIR__ . '/database/migrations/create_users_table.php';
        include_once __DIR__ . '/database/migrations/create_users_with_relations_table.php';
    }
}
