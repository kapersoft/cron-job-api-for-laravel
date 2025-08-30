<?php

declare(strict_types=1);

namespace Kapersoft\CronJobApiForLaravel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Kapersoft\CronJobApi\JobList list()
 * @method static \Kapersoft\CronJobApi\DetailedJob get(int $id)
 * @method static int create(\Kapersoft\CronJobApi\Job $job)
 * @method static void update(int $id, \Kapersoft\CronJobApi\Job $job)
 * @method static void delete(int $id)
 * @method static \Kapersoft\CronJobApi\History history(int $id)
 * @method static \Kapersoft\CronJobApi\HistoryDetails historyItem(int $id, string $identifier)
 *
 * @see \Kapersoft\CronJobApi\Client
 */
final class CronJobApi extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Kapersoft\CronJobApi\Client::class;
    }
}
