<?php

namespace Deegitalbe\TrustupIoSign\Tests\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Deegitalbe\TrustupIoSign\Models\IsTrustupIoSignedDocumentRelatedModelWithRelations;
use Deegitalbe\TrustupIoSign\Contracts\Models\TrustupIoSignedDocumentRelatedModelWithRelationsContract;
use Deegitalbe\LaravelTrustupIoExternalModelRelations\Contracts\Models\Relations\ExternalModelRelationContract;
use Deegitalbe\TrustupIoSign\Contracts\Models\TrustupIoSignedDocumentContract;

class UserWithRelations extends User implements TrustupIoSignedDocumentRelatedModelWithRelationsContract
{
    use IsTrustupIoSignedDocumentRelatedModelWithRelations, SoftDeletes;
    protected $table = "users_with_relations";
    protected $fillable =  ["id", "name", "email", "password", "uuid"];
    protected $casts = [
        "trustup_io_audit_log_uuid" => 'object'
    ];

    public function getTrustupIoSignOriginalPdfUrl(): string
    {
        return "https://eforms.com/download/2019/08/Service-Contract-Template.pdf";
    }

    public function getTrustupIoSignRedirectUrl(): string
    {
        return "https://www.google.com/";
    }

    public function getTrustupIoSignCallbackUrl(): string
    {
        return "https://www.google.com/";
    }

    public function getTrustupIoSignedDocumentColumn(): string
    {
        return "trustup_io_signed_document_uuid";
    }

    public function document(): ExternalModelRelationContract
    {
        return $this->belongsToTrustupIoSignedDocument($this->getTrustupIoSignedDocumentColumn());
    }

    public function setTrustupIoSignedDocument(?TrustupIoSignedDocumentContract $document): TrustupIoSignedDocumentRelatedModelWithRelationsContract
    {

        $this->document()->setRelatedModels($document);
        return $this;
    }
}
