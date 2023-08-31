<?php

declare(strict_types=1);

namespace App\Schedulers;

use Flame\Contracts\ScheduleTaskInterface;
use Flame\Foundation\Attribute\ScheduledAttribute;

class HelloTask implements ScheduleTaskInterface
{
    //28号凌晨
    #[ScheduledAttribute('0 0 0 28 * *')]
    public function handle(): void
    {

    }
}
