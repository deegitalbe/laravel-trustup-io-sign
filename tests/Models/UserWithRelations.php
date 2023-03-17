<?php

namespace Deegitalbe\TrustupIoSign\Tests\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Deegitalbe\TrustupIoSign\Contracts\Models\HasManyTrustupIoSignedDocumentRelatedModelContract;
use Deegitalbe\TrustupIoSign\Models\HasManyTrustupIoSignedDocumentRelatedModel;
use Deegitalbe\TrustupIoSign\Models\IsTrustupIoSignedDocumentRelatedModel;
use Illuminate\Database\Eloquent\Model;

class UserWithRelations extends Model implements HasManyTrustupIoSignedDocumentRelatedModelContract
{
    use HasManyTrustupIoSignedDocumentRelatedModel, SoftDeletes;

    protected $table = "users_with_relations";
    protected $fillable =  ["id", "name", "email", "password", "uuid"];


    public function getTrustupIoSignOriginalPdfUrl(): string
    {
        return "https://eforms.com/download/2019/08/Service-Contract-Template.pdf";
    }

    public function getTrustupIoSignCallbackUrl(): string
    {
        return "https://www.google.com/";
    }
}
