<?php

namespace Deegitalbe\TrustupIoSign\Tests\Models;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Deegitalbe\TrustupIoSign\Tests\traits\isUserWithRelated;
use Deegitalbe\TrustupIoSign\Contracts\Models\TrustupIoSignedDocumentContract;
use Deegitalbe\TrustupIoSign\Models\WithRelationTrustupIoSignedDocumentRelatedModel;
use Deegitalbe\LaravelTrustupIoExternalModelRelations\Traits\Models\IsExternalModelRelatedModel;
use Deegitalbe\TrustupIoSign\Contracts\Models\WithRelationTrustupIoSignedDocumentRelatedModelContract;
use Deegitalbe\LaravelTrustupIoExternalModelRelations\Contracts\Models\Relations\ExternalModelRelationContract;

// 
class User extends Model
{
    use  SoftDeletes;
    protected $table = "users";
    protected $uuid = "test";
    protected $fillable = ["id", "name", "email", "password", "uuid"];

    public function trustupIoSignedDocuments(): ExternalModelRelationContract
    {
        return $this->belongsToTrustupIoSignedDocument($this->getTrustupIoSignedDocumentColumn());
    }

    public function getTrustupIoSignedDocuments(): Collection|TrustupIoSignedDocumentContract
    {
        return $this->getExternalModels('trustupIoSignedDocuments');
    }

    public function getTrustupIoSignedDocumentsColumn(): string
    {
        return 'you-column';
    }

    public function getTrustupIoSignWebhookUrl(): string
    {
        return '';
    }

    public function getTrustupIoSignModelTypeIdentifier(): string
    {
        return '';
    }


    public function getTrustupIoSignOriginalPdfUrl(): string
    {
        return "https://eforms.com/download/2019/08/Service-Contract-Template.pdf";
    }

    public function getTrustupIoSignCallbackUrl(): string
    {
        return "https://www.google.com/";
    }

    public function getTrustupIoSignModelId(): string
    {
        return ';';
    }

    public function getTrustupIoSignModelType(): string
    {
        return ';';
    }

    public function getTrustupIoSignAppKey(): string
    {
        return ';';
    }
}
