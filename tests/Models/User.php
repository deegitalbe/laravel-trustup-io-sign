<?php

namespace Deegitalebe\PackageSign\Tests\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as BaseUser;
use Deegitalebe\PackageSign\Contracts\Models\TrustupIoSignedDocumentRelatedModelContract;
use Deegitalebe\PackageSign\Models\IsTrustupIoSignedDocumentRelatedModel;

class User extends BaseUser implements TrustupIoSignedDocumentRelatedModelContract
{
    use IsTrustupIoSignedDocumentRelatedModel, SoftDeletes;
    protected $table = "users";
    protected $uuid = "test";
    protected $fillable = ["id", "name", "email", "password", "uuid"];

    public function getTrustupIoSignDocumentUrl(): string
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
