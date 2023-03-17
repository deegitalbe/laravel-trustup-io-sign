<?php

namespace Deegitalbe\TrustupIoSign\Tests\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Deegitalbe\TrustupIoSign\Contracts\Models\BelongsToTrustupIoSignedDocumentRelatedModelContract;
use Deegitalbe\TrustupIoSign\Models\BelongsToTrustupIoSignedDocumentRelatedModel;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model implements BelongsToTrustupIoSignedDocumentRelatedModelContract
{
    use  BelongsToTrustupIoSignedDocumentRelatedModel, SoftDeletes;

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
}
