<?php

use Deegitalebe\PackageSign\Services\SignUrls\SignUrlServiceAdapter;

return [
    'adapter' => SignUrlServiceAdapter::class,
    'app_key' => env("TRUSTUP_APP_KEY"),
];
