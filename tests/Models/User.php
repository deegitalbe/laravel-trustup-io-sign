<?php

namespace Deegitalbe\TrustupIoSign\Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Deegitalbe\TrustupIoSign\Contracts\Models\BelongsToTrustupIoSignedDocumentRelatedModelContract;
use Deegitalbe\TrustupIoSign\Models\BelongsToTrustupIoSignedDocumentRelatedModel;

// 
class User extends Model implements BelongsToTrustupIoSignedDocumentRelatedModelContract
{
    use  SoftDeletes, BelongsToTrustupIoSignedDocumentRelatedModel;
    protected $table = "users";
    protected $uuid = "test";
    protected $fillable = ["id", "name", "email", "password", "uuid"];

    public function getTrustupIoSignOriginalPdfUrl(): string
    {
        return "https://eforms.com/download/2019/08/Service-Contract-Template.pdf";
    }

    public function getTrustupIoSignCallbackUrl(): string
    {
        return "https://www.google.com/";
    }
}
