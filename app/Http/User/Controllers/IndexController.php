<?php

declare(strict_types=1);

namespace App\Http\User\Controllers;

use App\Exceptions\CustomException;
use Flame\Http\Response;
use Flame\Log\Log;
use Throwable;

class IndexController extends BaseController
{
    public function index(): Response
    {
        try {
            return $this->success('user server');
        } catch (CustomException $e) {
            return $this->fail($e->getMessage());
        } catch (Throwable $e) {
            Log::error($e);

            return $this->fail('发送错误');
        }
    }
}
