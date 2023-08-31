<?php

declare(strict_types=1);

namespace App\Http\Web\Controllers;

use App\Exceptions\CustomException;
use Flame\Http\Response;
use Flame\Support\Facade\Log;
use Throwable;

class IndexController extends BaseController
{
    public function index(): Response
    {
        try {
            return $this->success('api server');
        } catch (CustomException $e) {
            return $this->fail($e->getMessage());
        } catch (Throwable $e) {
            Log::error($e);

            return $this->fail('发送错误');
        }
    }
}
