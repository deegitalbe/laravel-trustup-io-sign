<?php

namespace Deegitalbe\TrustupIoSign\Tests\traits;

use Deegitalbe\TrustupIoSign\Tests\Models\User;
use Deegitalbe\TrustupIoSign\Tests\Models\UserWithRelations;
use Deegitalbe\Tests\Unit\database\migrations\CreateUsersTable;


trait isUserWithRelated
{
    public function createUserWithoutRelation(): User
    {
        $user = new User();
        return $user->create(["name" => "plop", "email" => "plop", "password" => "plop", "uuid" => "test"]);
    }

    public function createUserWithRelation(): UserWithRelations
    {
        $user = new UserWithRelations();
        return $user->create(["name" => "plop", "email" => "plop", "password" => "plop", "uuid" => "test"]);
    }

    public function migrateUserWithRelations(): void
    {
        app()->make(CreateUsersWithRelationsTable::class)->up();
    }

    public function migrateUserWithoutRelations(): void
    {
        app()->make(CreateUsersTable::class)->up();
    }
}
