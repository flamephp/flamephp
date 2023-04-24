<?php

declare(strict_types=1);

namespace App\Gateways\Auth\Controllers;

use App\Exceptions\CustomException;
use Flame\Log;
use Flame\Response;
use OpenApi\Attributes as OA;
use Throwable;

class LoginController extends BaseController
{
    #[OA\Post(path: '/api/auth/login/mobile', summary: '通过手机号码登录', tags: ['登录'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: '#/components/schemas/LoginMobileRequest'))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: '#/components/schemas/LoginResponse'))]
    public function mobile(): Response
    {
        
    }
}
