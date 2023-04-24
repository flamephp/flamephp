<?php

declare(strict_types=1);

namespace Tests;

use Flame\Config;
use Flame\Facade\DB;
use Flame\Support\Http;
use Exception;
use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        require dirname(__DIR__) . '/bootstrap/app.php';

        Config::init();

        DB::setConfig(Config::get('database'));
    }

    /**
     * @throws Exception
     */
    protected function get($url, $params = [], $opts = []): string
    {
        return Http::getUrl($url, $params, $opts);
    }

    /**
     * @throws Exception
     */
    protected function post($url, $data = [], $opts = []): string
    {
        return Http::getUrl($url, $data, $opts);
    }
}
