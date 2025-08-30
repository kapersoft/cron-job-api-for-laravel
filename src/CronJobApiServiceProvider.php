<?php

declare(strict_types=1);

namespace Kapersoft\CronJobApiForLaravel;

use Illuminate\Support\ServiceProvider;
use Kapersoft\CronJobApi\Client;
use Override;
use RuntimeException;

final class CronJobApiServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/cron-job-api-for-laravel.php' => config_path('cron-job-api-for-laravel.php'),
        ]);
    }

    #[Override]
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/cron-job-api-for-laravel.php', 'cron-job-api-for-laravel');

        $this->app->singleton(function (): Client {
            $config = config('cron-job-api-for-laravel');

            if ($config['api_key'] === '') {
                throw new RuntimeException('Cron Job API key is not set');
            }

            if ($config['base_url'] === '') {
                throw new RuntimeException('Cron Job API base URL is not set');
            }

            return new Client(
                apiKey: $config['api_key'],
                baseUrl: $config['base_url']
            );
        });
    }
}
