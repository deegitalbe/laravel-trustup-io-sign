<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Deegitalbe\TrustupIoSign\Contracts\Models\MediaContract;
use Deegitalbe\TrustupIoSign\Contracts\Models\TrustupIoSignedDocumentContract;

class TrustupIoSignedDocument implements TrustupIoSignedDocumentContract
{

    protected int  $id;
    protected string  $uuid;
    protected string  $ip;
    protected string  $timezone;
    protected string  $latitude;
    protected string  $longitude;
    protected string  $modelId;
    protected string  $modelType;
    protected string  $appKey;
    protected ?string  $documentUuid;
    protected string  $signedAt;

    /** @var Collection<int, MediaContract> */
    protected ?Collection  $document;

    public function getId(): string
    {
        return $this->id;
    }
    public function getUuid(): string
    {
        return $this->uuid;
    }
    public function getIp(): string
    {
        return $this->ip;
    }
    public function getTimezone(): string
    {
        return $this->timezone;
    }
    public function getLatitude(): string
    {
        return $this->latitude;
    }
    public function getLongitude(): string
    {
        return $this->longitude;
    }
    public function getModelId(): string
    {
        return $this->modelId;
    }
    public function getModelType(): string
    {
        return $this->modelType;
    }
    public function getAppKey(): string
    {
        return $this->appKey;
    }
    public function getDocumentUuid(): ?string
    {
        return $this->documentUuid ?? null;
    }
    public function getSignedAt(): string
    {
        return $this->signedAt;
    }
    /** @return MediaContract  */
    public function getDocument(): ?MediaContract
    {
        return $this->document ?? null;
    }

    public function setId(int $id): TrustupIoSignedDocumentContract
    {
        $this->id = $id;
        return $this;
    }
    public function setUuid(string $uuid): TrustupIoSignedDocumentContract
    {
        $this->uuid = $uuid;
        return $this;
    }
    public function setIp(string $ip): TrustupIoSignedDocumentContract
    {
        $this->ip = $ip;
        return $this;
    }
    public function setTimezone(string $timezone): TrustupIoSignedDocumentContract
    {
        $this->timezone = $timezone;
        return $this;
    }
    public function setLatitude(string $latitude): TrustupIoSignedDocumentContract
    {
        $this->latitude = $latitude;
        return $this;
    }
    public function setLongitude(string $longitude): TrustupIoSignedDocumentContract
    {
        $this->longitude = $longitude;
        return $this;
    }
    public function setModelId(string $modelId): TrustupIoSignedDocumentContract
    {
        $this->modelId = $modelId;
        return $this;
    }
    public function setModelType(string $modelType): TrustupIoSignedDocumentContract
    {
        $this->modelType = $modelType;
        return $this;
    }
    public function setAppKey(string $appKey): TrustupIoSignedDocumentContract
    {
        $this->appKey = $appKey;
        return $this;
    }
    public function setDocumentUuid(?string $documentUuid): TrustupIoSignedDocumentContract
    {
        $this->documentUuid = $documentUuid ?? null;
        return $this;
    }
    public function setSignedAt(Carbon $signedAt): TrustupIoSignedDocumentContract
    {
        $this->signedAt = $signedAt;
        return $this;
    }
    /**  @param MediaContract> */
    public function setDocument(?MediaContract $document): TrustupIoSignedDocumentContract
    {
        $this->document = $document ?? null;
        return $this;
    }

    public function fromArray(array $attributes): TrustupIoSignedDocumentContract
    {
        $this->setId($attributes['id'])
            ->setAppKey($attributes['appKey'])
            ->setModelId($attributes['modelId'])
            ->setModelType($attributes['modelType'])
            ->setDocumentUuid($attributes['documentUuid'] ?? null)
            ->setIp($attributes['ip'])
            ->setLongitude($attributes['longitude'])
            ->setLatitude($attributes['latittude'])
            ->setSignedAt($attributes['signedAt'])
            ->setTimezone($attributes['timezone'])
            ->setDocument($attributes['document'] ?? null);

        return $this;
    }
}
