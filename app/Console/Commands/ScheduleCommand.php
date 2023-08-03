<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Contracts\ScheduleTaskInterface;
use Flame\Support\Arr;
use Flame\Support\Facade\Cache;
use ReflectionClass;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Throwable;
use Workerman\Crontab\Crontab;
use Workerman\Worker;

class ScheduleCommand extends Command
{
    public function __construct(string $name = null)
    {
        parent::__construct($name);
    }

    protected function configure(): void
    {
        $this->setName('schedule')
            ->addArgument('action')
            ->addOption('mode', '-d')
            ->addOption('grace', '-g')
            ->setDescription('The Task Scheduling.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        global $argv;

        $argv[0] = $input->getArgument('action');
        $argv[1] = $input->getOption('mode');

        // 增加分布式锁
        $lock = Cache::lock('ScheduleCommand', 60);

        if ($argv[0] === 'stop') {
            $lock->forceRelease();
        }

        if (in_array($argv[0], ['start', 'restart', 'reload'])) {
            if ($lock->get()) {
                $tasks = $this->loadTasks();
                $worker = new Worker();
                $worker->onWorkerStart = function () use ($tasks) {
                    foreach ($tasks as $task) {
                        echo $task['worker'].' loaded.'.PHP_EOL;
                        $worker = new $task['worker']();
                        new Crontab($task['rule'], [$worker, 'handle']);
                    }
                };
            }
        }

        Worker::runAll();

        return 0;
    }

    /**
     * 获取全部任务
     */
    private function loadTasks(): array
    {
        $tasks = [];

        $files = glob(app_path('Schedulers/*.php'));
        foreach ($files as $file) {
            $file = str_replace('\\', '/', $file);
            preg_match('#(app/Schedulers/\w+)\.php#', $file, $matches);
            if (isset($matches[1])) {
                $task = '\\'.str_replace('/', '\\', $matches[1]);
                $rule = $this->getTaskRule($task);
                if ($this->validateCrontabSchedule($rule)) {
                    $tasks[] = ['rule' => $rule, 'worker' => $task];
                }
            }
        }

        return $tasks;
    }

    /**
     * 获取任务时间
     */
    private function getTaskRule(string $task): string
    {
        $schedule = '';

        try {
            $reflectionClass = new ReflectionClass($task);
            $reflectionMethod = $reflectionClass->getMethod('handle');
            $attributes = $reflectionMethod->getAttributes();

            foreach ($attributes as $attribute) {
                if ($attribute->getName().'::class' instanceof ScheduleTaskInterface) {
                    $schedule = Arr::first($attribute->getArguments());
                }
            }

            return $schedule;
        } catch (Throwable $e) {
            return $schedule;
        }
    }

    /**
     * 规则校验
     */
    private function validateCrontabSchedule($schedule): bool
    {
        $pattern = '/^(\*|[0-9]{1,2})(\/[0-9]{1,2})?\s+(\*|[0-9]{1,2})(\/[0-9]{1,2})?\s+(\*|[0-9]{1,2})(\/[0-9]{1,2})?\s+(\*|[0-9]{1,2})(\/[0-9]{1,2})?\s+(\*|[0-9]{1,2})(\/[0-9]{1,2})?\s+(\*|[0-9]{1,2})(\/[0-9]{1,2})?\s*$/';

        return preg_match($pattern, $schedule) > 0;
    }
}
