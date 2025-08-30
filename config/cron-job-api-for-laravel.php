<?php

declare(strict_types=1);

return [
    'base_url' => env('CRON_JOB_API_BASE_URL', 'https://api.cron-job.org'),
    'api_key' => env('CRON_JOB_API_KEY', ''),
];
