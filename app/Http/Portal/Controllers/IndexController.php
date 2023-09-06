<?php

declare(strict_types=1);

namespace App\Http\Portal\Controllers;

use App\Exceptions\CustomException;
use Flame\Http\Response;
use Flame\Support\Facade\Log;
use OpenApi\Attributes as OA;
use Throwable;

class IndexController extends BaseController
{
    #[OA\Get(path: '/portal', summary: '获取门户信息', tags: ['门户信息'])]
    #[OA\Response(response: 200, description: 'OK')]
    public function index(): Response
    {
        try {
            return view('welcome');
        } catch (CustomException $e) {
            return $this->fail($e->getMessage());
        } catch (Throwable $e) {
            Log::error($e);

            return $this->fail('发送错误');
        }
    }
}
