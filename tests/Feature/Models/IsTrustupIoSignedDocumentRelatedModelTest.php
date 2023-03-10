<?php

namespace Deegitalebe\PackageSign\Tests\Feature\Models;

use Deegitalebe\PackageSign\Tests\database\migrations\CreateUsersTable;
use Mockery\MockInterface;
use Henrotaym\LaravelTestSuite\TestSuite;
use Deegitalebe\PackageSign\Tests\TestCase;
use Deegitalebe\PackageSign\Tests\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Henrotaym\LaravelPackageVersioning\Testing\Traits\InstallPackageTest;

class IsTrustupIoSignedDocumentRelatedModelTest extends TestCase
{
    use InstallPackageTest, TestSuite, RefreshDatabase;

    /**
     * Mocking User.
     *
     * @return User|MockInterface
     */
    protected function mockUser(): MockInterface
    {
        /** @var User */
        return $this->mockThis(User::class);
    }

    public function test_that_it_can_get_trustup_io_signed_document_related_url_attributes()
    {

        $this->migrateUserWithoutRelations();

        /** Create User */
        $this->be(new User(["id" => 2]));
        $user = $this->createUserWithoutRelation();
        dd($user->getUrlRelatedAttributes());
    }

    public function createUserWithoutRelation(): User
    {
        $user = new User();
        return $user->create(["name" => "plop", "email" => "plop", "password" => "plop", "uuid" => "test"]);
    }

    public function migrateUserWithoutRelations(): void
    {
        app()->make(CreateUsersTable::class)->up();
    }
}
