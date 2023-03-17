<?php

use Deegitalbe\TrustupIoSign\Tests\Models\Invoice;

return [
    'app_key' => env("TRUSTUP_APP_KEY"),
    "models" => [
        Invoice::class,
    ]
];
