<?php

namespace Deegitalbe\TrustupIoSign\Contracts\Models;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;


interface TrustupIoSignedDocumentContract
{
    public function getId(): string;
    public function getUuid(): string;
    public function getIp(): string;
    public function getTimezone(): string;
    public function getLatitude(): string;
    public function getLongitude(): string;
    public function getModelId(): string;
    public function getModelType(): string;
    public function getAppKey(): string;
    public function getDocumentUuid(): ?string;
    public function getSignedAt(): string;


    /** @return Collection */
    public function getDocument(): ?Collection;

    public function setId(int $id): TrustupIoSignedDocumentContract;

    public function setUuid(string $uuid): TrustupIoSignedDocumentContract;

    public function setIp(string $ip): TrustupIoSignedDocumentContract;

    public function setTimezone(string $timezone): TrustupIoSignedDocumentContract;

    public function setLatitude(string $latitude): TrustupIoSignedDocumentContract;

    public function setLongitude(string $longitude): TrustupIoSignedDocumentContract;

    public function setModelId(string $modelId): TrustupIoSignedDocumentContract;

    public function setModelType(string $modelType): TrustupIoSignedDocumentContract;

    public function setAppKey(string $appKey): TrustupIoSignedDocumentContract;

    public function setDocumentUuid(?string $documentUuid): TrustupIoSignedDocumentContract;

    public function setSignedAt(Carbon $signedAt): TrustupIoSignedDocumentContract;

    public function setDocument(?Collection $document): TrustupIoSignedDocumentContract;

    public function fromArray(array $attributes): TrustupIoSignedDocumentContract;
}
