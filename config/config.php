<?php

use Deegitalbe\LaravelTrustupIoAudit\Services\Logs\Adapters\SignUrlServiceAdapter;

return [
    'adapter' => SignUrlServiceAdapter::class,
    'app_key' => env("TRUSTUP_APP_KEY"),
    'callback' => "https://google.com"
];
