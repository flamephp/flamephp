<?php

declare(strict_types=1);

namespace App\Schedulers;

use App\Contracts\ScheduleTaskInterface;
use Flame\Log\Log;
use Throwable;

class HelloTask implements ScheduleTaskInterface
{
    //28号凌晨
    #[ScheduledAttribute('0 0 0 28 * *')]
    public function handle(): void
    {

    }
}
