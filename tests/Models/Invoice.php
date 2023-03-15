<?php

namespace Deegitalbe\TrustupIoSign\Tests\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Deegitalbe\TrustupIoSign\Contracts\Models\TrustupIoSignedDocumentRelatedModelWithRelationsContract;
use Deegitalbe\LaravelTrustupIoExternalModelRelations\Contracts\Models\Relations\ExternalModelRelationContract;
use Deegitalbe\TrustupIoSign\Contracts\Models\DefaultTrustupIoSignedDocumentRelatedModelContract;
use Deegitalbe\TrustupIoSign\Models\DefaultTrustupIoSignedDocumentRelatedModel;

class Invoice extends User implements DefaultTrustupIoSignedDocumentRelatedModelContract
{
    use  DefaultTrustupIoSignedDocumentRelatedModel, SoftDeletes;

    protected $table = "invoices";
    protected $fillable =  ["id", "uuid", "trustup_io_signed_document_uuid"];


    public function getTrustupIoSignOriginalPdfUrl(): string
    {
        return "https://eforms.com/download/2019/08/Service-Contract-Template.pdf";
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
}
