<?php

declare(strict_types=1);

namespace App\Console;

use Flame\Console\Kernel as BaseKernel;

class Kernel extends BaseKernel
{
    public function __construct()
    {
        parent::__construct();

        parent::registerCommands(app_path('Console/Commands/*Command.php'), 'App');
    }
}
