<?php

namespace Deegitalbe\TrustupIoSign\Tests\Unit\Models;


use Mockery\MockInterface;
use Henrotaym\LaravelTestSuite\TestSuite;
use Deegitalbe\TrustupIoSign\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Deegitalbe\TrustupIoSign\Tests\Models\UserWithRelations;
use Henrotaym\LaravelPackageVersioning\Testing\Traits\InstallPackageTest;
use Deegitalbe\LaravelTrustupIoExternalModelRelations\Contracts\Models\ExternalModelContract;
use Deegitalbe\LaravelTrustupIoExternalModelRelations\Contracts\Models\Relations\ExternalModelRelationContract;
use Deegitalbe\LaravelTrustupIoExternalModelRelations\Contracts\Models\Relations\ExternalModelRelationSubscriberContract;


class IsTrustupIoAuditRelatedModelWithRelationsTest extends TestCase
{
    use InstallPackageTest, TestSuite, RefreshDatabase;

    /**
     * Mocking UserWithRelations.
     *
     * @return UserWithRelations|MockInterface
     */
    // protected function mockUserWithRelations(): MockInterface
    // {
    //     /** @var UserWithRelations */
    //     return $this->mockThis(UserWithRelations::class);
    // }

    // public function test_that_it_can_get_trustup_io_audit_log_column()
    // {

    //     $class = $this->mockUserWithRelations();

    //     $class->shouldReceive('getTrustupIoSignedDocumentColumn')->once()->withNoArgs()->passthru();

    //     $this->assertEquals("trustup_io_signed_document_uuid", $class->getTrustupIoSignedDocumentColumn());
    // }

    // public function test_that_it_can_it_get_relation()
    // {
    //     $class = $this->mockUserWithRelations();
    //     $ext = $this->mockThis(ExternalModelRelationContract::class);

    //     $class->shouldReceive('getTrustupIoSignedDocumentColumn')->once()->withNoArgs()->andReturn("trustup_io_signed_document_uuid");
    //     $class->shouldReceive('hasOneTrustupMedia')->once()->with("trustup_io_signed_document_uuid")->andReturn($ext);

    //     $class->shouldReceive('trustupIoSignDocument')->once()->withNoArgs()->passthru();

    //     $this->assertEquals($ext, $class->trustupIoSignDocument());
    // }


    // public function test_that_it_can_get_trustup_io_audit_logs_collection()
    // {
    //     $class = $this->mockUserWithRelations();
    //     $ext = $this->mockThis(ExternalModelContract::class);

    //     $class->shouldReceive('getExternalModels')->once()->with("trustupIoAuditLogs")->andReturn(collect($ext));
    //     $class->shouldReceive('getTrustupIoAuditLogs')->once()->withNoArgs()->passthru();

    //     $this->assertEquals(collect($ext), $class->getTrustupIoAuditLogs());
    // }



    // public function test_that_it_can_initialize_trustup_io_audit_related_model_with_relations()
    // {
    //     $class = $this->mockUserWithRelations();
    //     $extSubscriber = $this->mockThis(ExternalModelRelationSubscriberContract::class);
    //     $ext = $this->mockThis(ExternalModelRelationContract::class);


    //     $class->shouldReceive('getExternalModelRelationSubscriber')->once()->withNoArgs()->andReturn($extSubscriber);
    //     $class->shouldReceive('trustupIoAuditLogs')->once()->withNoArgs()->andReturn($ext);
    //     $class->shouldReceive('initializeIsTrustupIoAuditRelatedModelWithRelations')->once()->withNoArgs()->passthru();

    //     $extSubscriber->shouldReceive("register")->once()->with($ext)->andReturnSelf();

    //     $this->assertEquals(null, $class->initializeIsTrustupIoAuditRelatedModelWithRelations());
    // }
}
