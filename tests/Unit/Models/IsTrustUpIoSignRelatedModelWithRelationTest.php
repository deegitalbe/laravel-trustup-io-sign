<?php

namespace Deegitalbe\TrustupIoSign\Tests\Unit\Models;


use Mockery\MockInterface;
use Henrotaym\LaravelTestSuite\TestSuite;
use Deegitalbe\TrustupIoSign\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Deegitalbe\TrustupIoSign\Tests\Models\UserWithRelations;
use Henrotaym\LaravelPackageVersioning\Testing\Traits\InstallPackageTest;
use Deegitalbe\TrustupIoSign\Models\TrustupIoSignedDocumentLoadingCallback;
use Deegitalbe\TrustupIoSign\Contracts\Models\TrustupIoSignedDocumentContract;
use Deegitalbe\LaravelTrustupIoExternalModelRelations\Contracts\Models\ExternalModelContract;
use Deegitalbe\LaravelTrustupIoExternalModelRelations\Contracts\Models\Relations\ExternalModelRelationContract;
use Deegitalbe\LaravelTrustupIoExternalModelRelations\Contracts\Models\Relations\ExternalModelRelationSubscriberContract;

class IsTrustupSignRelatedModelWithRelationTest extends TestCase
{
    use InstallPackageTest, TestSuite, RefreshDatabase;

    /**
     * Mocking UserWithRelations.
     *
     * @return UserWithRelations|MockInterface
     */
    protected function mockUserWithRelations(): MockInterface
    {
        /** @var UserWithRelations */
        return $this->mockThis(UserWithRelations::class);
    }

    /**
     * Mocking TrustupIoSignedDocumentContract.
     *
     * @return TrustupIoSignedDocumentContract|MockInterface
     */
    protected function mockTrustupIoSignedDocument(): MockInterface
    {
        /** @var TrustupIoSignedDocumentContract */
        return $this->mockThis(TrustupIoSignedDocumentContract::class);
    }

    public function test_that_it_get_document_relation_column()
    {
        $class = $this->mockUserWithRelations();

        $class->shouldReceive('getTrustupIoSignedDocumentColumn')->once()->withNoArgs()->passthru();

        $this->assertEquals("trustup_io_signed_document_uuid", $class->getTrustupIoSignedDocumentColumn());
    }

    public function test_that_it_can_get_relation_document_on_user_with_relation()
    {
        $external = $this->mockThis(ExternalModelRelationContract::class);
        $class = $this->mockUserWithRelations();

        $class->shouldReceive("getTrustupIoSignedDocumentColumn")->once()->withNoArgs()->andReturn("trustup_io_signed_document_uuid");
        $class->shouldReceive("belongsToTrustupIoSignedDocument")->once()->with("trustup_io_signed_document_uuid")->andReturn($external);
        $class->shouldReceive('document')->once()->withNoArgs()->passthru();

        $class->document();
    }


    public function test_that_it_can_set_a_signed_document()
    {
        $external = $this->mockThis(ExternalModelRelationContract::class);
        $class = $this->mockUserWithRelations();
        $model = $this->mockTrustupIoSignedDocument();
        $ext = $this->mockThis(ExternalModelContract::class);
        // TODO FAKE MODEL
        $class->shouldReceive("document")->once()->withNoArgs()->andReturn($external);
        $external->shouldReceive("setRelatedModelsByIds")->once()->with("test")->andReturnSelf();
        $class->shouldReceive("getIdentifier")->once()->with($model)->andReturn("test");
        $class->shouldReceive('setTrustupIoSignedDocument')->once()->with($model)->passthru();

        $class->setTrustupIoSignedDocument($model);
    }

    // public function test_that_it_can_set_a_signed_document_with_null()
    // {
    //     $external = $this->mockThis(ExternalModelRelationContract::class);
    //     $class = $this->mockUserWithRelations();
    //     $model = null;
    //     // TODO FAKE MODEL
    //     $class->shouldReceive("document")->once()->withNoArgs()->andReturn($external);
    //     $external->shouldReceive("setRelatedModels")->once()->with($model)->andReturnSelf();
    //     $class->shouldReceive('setTrustupIoSignedDocument')->once()->with($model)->passthru();

    //     $class->setTrustupIoSignedDocument($model);
    // }


    // TOTO MATHIEU 
    public function test_that_it_set_belongs_to_relation()
    {
        $loadingCallback = $this->mockThis(TrustupIoSignedDocumentLoadingCallback::class);
        $external = $this->mockThis(ExternalModelRelationContract::class);
        $class = $this->mockUserWithRelations();

        $class->shouldReceive("belongsToExternalModel")->once()->with(
            $loadingCallback,
            'id',
            null
        )->andReturn($external);
        $class->shouldReceive('belongsToTrustupIoSignedDocument')->once()->with("id")->passthru();
        $class->belongsToTrustupIoSignedDocument("id");
    }


    // public function test_that_it_set_belongs_to_relation()
    // {

    //     $class = $this->mockUserWithRelations();
    //     $loadingCallback = $this->mockThis(TrustupIoSignedDocumentLoadingCallback::class);


    //     $class->shouldReceive("belongsToExternalModel")->once()->withArgs(
    //         function ($args) use ($loadingCallback) {
    //             return $args === $loadingCallback;
    //         }
    //     )->andReturnSelf();
    //     $class->shouldReceive('belongsToTrustupIoSignedDocument')->once()->with("test")->passthru();


    //     $this->assertEquals("test", $class->belongsToTrustupIoSignedDocument("test"));
    // }
}
