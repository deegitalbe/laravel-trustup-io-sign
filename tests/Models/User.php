<?php

namespace Deegitalbe\TrustupIoSign\Tests\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as BaseUser;
use Deegitalbe\TrustupIoSign\Contracts\Models\TrustupIoSignedDocumentRelatedModelContract;
use Deegitalbe\TrustupIoSign\Models\IsTrustupIoSignedDocumentRelatedModel as ModelsIsTrustupIoSignedDocumentRelatedModel;

class User extends BaseUser implements TrustupIoSignedDocumentRelatedModelContract
{
    use ModelsIsTrustupIoSignedDocumentRelatedModel, SoftDeletes;
    protected $table = "users";
    protected $uuid = "test";
    protected $fillable = ["id", "name", "email", "password", "uuid"];

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
}
