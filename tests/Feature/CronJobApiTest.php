<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Config;
use Kapersoft\CronJobApi\Client;
use Kapersoft\CronJobApiForLaravel\Facades\CronJobApi;

it('created the client with default baseUrl', function () {
    Config::set('cron-job-api-for-laravel.api_key', 'secret');

    $app = app(Client::class);

    expect($app)->toBeInstanceOf(Client::class);
    expect(invade($app)->apiKey)->toBe('secret');
    expect(invade($app)->baseUrl)->toBe('https://api.cron-job.org');
});

it('created the client with custom baseUrl', function () {
    Config::set('cron-job-api-for-laravel.api_key', 'secret');
    Config::set('cron-job-api-for-laravel.base_url', 'https://example.com');

    $app = app(Client::class);

    expect($app)->toBeInstanceOf(Client::class);
    expect(invade($app)->baseUrl)->toBe('https://example.com');
});

it('throws an exception when the api key is not set', function () {
    Config::set('cron-job-api-for-laravel.api_key', '');
    expect(fn () => app(Client::class))->toThrow(RuntimeException::class, 'Cron Job API key is not set');

});

it('throws an exception when the baseUrl is not set', function () {
    // Arrange
    Config::set('cron-job-api-for-laravel.api_key', 'secret');
    Config::set('cron-job-api-for-laravel.base_url', '');

    expect(fn () => app(Client::class))->toThrow(RuntimeException::class, 'Cron Job API base URL is not set');
});

it('returns the client from the facade', function () {
    Config::set('cron-job-api-for-laravel.api_key', 'secret');
    Config::set('cron-job-api-for-laravel.base_url', 'https://example.com');

    $app = CronJobApi::getFacadeRoot();

    expect($app)->toBeInstanceOf(Client::class);
    expect(invade($app)->apiKey)->toBe('secret');
    expect(invade($app)->baseUrl)->toBe('https://example.com');
});
