# laravel-trustup-io-sign

## Prerequisite

This package uses `deegitalbe/server-authorization` package to authenticate requests. Refer to its [documentation](https://github.com/deegitalbe/server-authorization) to make sure it's correctly configured on your project.

## Installation

```shell
composer require deegitalbe/laravel-trustup-io-sign
```

## Publish configuration

```shell
php artisan vendor:publish --provider="Deegitalbe\TrustupIoSign\Providers\TrustupIoSignServiceProvider" --tag="config"
```

## 🛠️ config.

Provide all model where you need your relations.

```shell

    "models" => [
        YourModel::class,
    ]
```

## 🛠️ Default trait.

With DefaultTrustupIoSignedDocumentRelatedModel. All necessary methods are already defined.
Default model type identifier is set to uuid.

```shell
<?php

namespace App\Models;

use Deegitalbe\TrustupIoSign\Contracts\Models\DefaultTrustupIoSignedDocumentRelatedModelContract;
use Deegitalbe\TrustupIoSign\Models\DefaultTrustupIoSignedDocumentRelatedModel;

class Ticket implements DefaultTrustupIoSignedDocumentRelatedModelContract
{
    use DefaultTrustupIoSignedDocumentRelatedModel;

    public function getTrustupIoSignOriginalPdfUrl(): string
    {
        return 'https://eforms.com/download/2019/08/Service-Contract-Template.pdf';
    }

    public function getTrustupIoSignCallbackUrl(): string
    {
        return 'https://www.google.com';
    }
}
```

## 🛠️ trait with relation trait.

```shell
<?php

namespace App\Models;

use Deegitalbe\TrustupIoSign\Contracts\Models\TrustupIoSignedDocumentRelatedModelWithRelationsContract;
use Deegitalbe\TrustupIoSign\Models\IsTrustupIoSignedDocumentRelatedModelWithRelations;

class Ticket implements TrustupIoSignedDocumentRelatedModelWithRelationsContract
{
    use IsTrustupIoSignedDocumentRelatedModelWithRelations;

    public function getTrustupIoSignedDocumentColumn(): string
    {
        return 'you-column';
    }

        public function getTrustupIoSignModelTypeIdentifier(): string
    {
        // id,uuid,etc
        return "your-model-identifier";
    }

    // DEFINE YOUR RELATION.
    // see: https://github.com/deegitalbe/laravel-trustup-io-external-model-relations.
    public function trustupIoSignedDocuments(): ExternalModelRelationContract
    {   /**
         *  Also available
         *  $this->hasManyTrustupIoSignedDocuments($this->getTrustupIoSignedDocumentColumn());
         */
        return $this->belongsToTrustupIoSignedDocument($this->getTrustupIoSignedDocumentColumn());
    }

    /** @return ?TrustupIoSignedDocumentContract */
    public function getTrustupIoSignedDocument(): ?TrustupIoSignedDocumentContract
    {
        return $this->getExternalModels('trustupIoSignedDocuments');
    }

    public function getTrustupIoSignOriginalPdfUrl(): string
    {
        return 'https://eforms.com/download/2019/08/Service-Contract-Template.pdf';
    }

    public function getTrustupIoSignCallbackUrl(): string
    {
        return 'https://www.google.com';
    }
}
```

## 🛠️ Common trait.

Both trait implements IsTrustupIoSignedDocumentRelatedModel.
Feel free to overide it for your use case.

```shell
<?php

namespace Deegitalbe\TrustupIoSign\Models;

use Illuminate\Support\Str;
use Deegitalbe\TrustupIoSign\Services\SignUrlService;
use Deegitalbe\TrustupIoSign\Facades\TrustupIoSignFacade;

trait IsTrustupIoSignedDocumentRelatedModel
{

    protected string $trustupIoSignCallback;
    protected string $trustupIoSignWebhook;

    /**
     * Getting model identifier
     */
    public function getTrustupIoSignModelId(): string
    {
        /** @var Model $this */
        return $this->uuid ??
            $this->id;
    }

    /**
     * Getting model type for media.trustup.io
     */
    public function getTrustupIoSignModelType(): string
    {
        /** @var Model $this */
        return Str::slug(str_replace('\\', '-', $this->getMorphClass()));
    }


    public function getTrustupIoSignAppKey(): string
    {
        return TrustupIoSignFacade::getConfig("app_key");
    }

    public function getTrustupIoSignWebHookUrl(): string
    {
        // use this adress for locale container 'trustup-io-ticketing/webhooks/trustup-io-sign/signed-document/stored'.
        return route("webhooks.trustup-io-sign.signed-document.stored");
    }

    public function getTrustupIoSignUrl(?string $callback = null, ?string $webhook = null): string
    {
        /** @var SignUrlService */
        $signUrlService = app()->make(SignUrlService::class);
        if ($callback) $this->setTrustupIoSignCallback($callback);
        if ($webhook) $this->setTrustupIoSignWebhook($webhook);

        return $signUrlService->generateUrl($this);
    }

    protected function setTrustupIoSignCallback(string $callback): self
    {
        $this->trustupIoSignCallback = $callback;
        return $this;
    }

    protected function setTrustupIoSignWebhook($webhook): self
    {
        $this->trustupIoSignWebhook = $webhook;
        return $this;
    }
}

```

## ⚡⚡ Migration relation trait.

By default the column is set to trustup_io_signed_document_uuid and type `string` but feel free to overide it.

```shell
<?php


use Deegitalbe\TrustupIoSign\Services\Traits\TrustupioSignedDocumentRelatedMigrations;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    use TrustupioSignedDocumentRelatedMigrations;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            /**
            Your stuff
             */
        });
            $this->addSignedDocumentColumn("tickets", "trustup_io_signed_document_uuid");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        // $this->removeSignedDocumentColumn('users', 'trustup_io_audit_log_uuids');
    }
}
```

Webhook data structure

```js

{
  "id": 54,
  "uuid": "507e8842-0312-437e-aedd-795463661de2",
  "model_id": "2eaadfed-3f6c-409e-960b-059f0490445d",
  "model_type": "ticket",
  "app_key": "trustup-io-ticketing",
  "document_uuid": "6d1441ad-617c-4ae3-8089-754a76c960e9",
  "file_url": "https://eforms.com/download/2019/08/Service-Contract-Template.pdf",
  "ip": "192.168.144.8",
  "device": "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36",
  "screen_width": 708,
  "screen_height": 750,
  "created_at": "2023-03-16T11:21:30.000000Z",
  "updated_at": "2023-03-16T11:21:30.000000Z",
  "deleted_at": null,
  "location": []
}

```

## Listener configuration

Add any of those interfaces to your listener to customize it.

### Limit to your current app only

```php
use Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Contracts\Listeners\Config\ListenToCorrespondingAppKey;

class MessageCreatedListener implements ListenToCorrespondingAppKey
```
