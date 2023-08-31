<?php

declare(strict_types=1);

namespace App\Http\Auth\Controllers;

use App\Exceptions\CustomException;
use App\Http\Auth\Requests\Login\LoginMobileRequest;
use App\Http\Auth\Responses\LoginResponse;
use Flame\Http\Response;
use Flame\Support\Facade\Log;
use OpenApi\Attributes as OA;
use Throwable;

class LoginController extends BaseController
{
    #[OA\Post(path: '/auth/login/mobile', summary: '通过手机号码登录', tags: ['登录'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: LoginMobileRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: LoginResponse::class))]
    public function mobile(): Response
    {
        try {
            return $this->success('mobile login');
        } catch (CustomException $e) {
            return $this->fail($e->getMessage());
        } catch (Throwable $e) {
            Log::error($e);

            return $this->fail($e->getMessage());
        }
    }
}
