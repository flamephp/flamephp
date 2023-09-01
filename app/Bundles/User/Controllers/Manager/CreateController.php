<?php

declare(strict_types=1);

namespace App\Bundles\User\Controllers\Manager;

use App\Bundles\User\Requests\UserCreateRequest;
use App\Bundles\User\Responses\UserResponse;
use App\Bundles\User\Services\UserService;
use App\Exceptions\CustomException;
use App\Http\Manager\Controllers\BaseController;
use Flame\Http\Response;
use Flame\Support\Facade\Log;
use OpenApi\Attributes as OA;
use Throwable;

class CreateController extends BaseController
{
    #[OA\Post(path: '/user/manager/create/index', summary: '创建用户接口', tags: ['用户管理'])]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserCreateRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: UserResponse::class))]
    public function index(): Response
    {
        try {
            $userService = new UserService();

            return $this->success(__FILE__);
        } catch (CustomException $e) {
            return $this->fail($e->getMessage());
        } catch (Throwable $e) {
            Log::error($e);

            return $this->fail($e->getMessage());
        }
    }
}
