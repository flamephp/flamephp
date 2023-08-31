<?php

declare(strict_types=1);

namespace App\Http\Manager\Controllers;

use App\Exceptions\CustomException;
use App\Http\Manager\Requests\User\UserQueryRequest;
use App\Http\Manager\Responses\UserResponse;
use App\Services\UserService;
use Flame\Http\Response;
use Flame\Support\Facade\Log;
use OpenApi\Attributes as OA;
use Throwable;

class UserController extends BaseController
{
    #[OA\Post(path: '/manager/user', summary: '用户列表', security: [['bearerAuth' => []]], tags: ['用户管理'])]
    #[OA\Parameter(name: 'page', description: '当前页码', in: 'query', required: true, example: 1)]
    #[OA\Parameter(name: 'pageSize', description: '每页分页数', in: 'query', required: false, example: 10)]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(ref: UserQueryRequest::class))]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: UserResponse::class))]
    public function index(): Response
    {
        try {
            $request = $this->requestBody();

            // 表单校验
            $v = new UserQueryRequest();
            if (! $v->check($request)) {
                throw new CustomException($v->getError());
            }

            // 接收参数
            $page = $this->input('page', 1);
            $pageSize = $this->input('pageSize', 10);

            // 查询条件
            $condition = [];
            if (! empty($request['name'])) {
                $condition[] = ['name', 'like', '%'.$request['name'].'%'];
            }
            if (! empty($request['mobile'])) {
                $condition[] = ['mobile', 'like', '%'.$request['mobile'].'%'];
            }
            if (! empty($request['status'])) {
                $condition[] = ['status', '=', $request['status']];
            }

            // 查询数据
            $userService = new UserService();
            $result = $userService->page($condition, $page, $pageSize);

            // 格式化数据
            foreach ($result['data'] as $key => $item) {
                $response = new UserResponse();
                $response->setData($item);
                $result['data'][$key] = $response->toArray();
            }

            return $this->success($result);
        } catch (CustomException $e) {
            return $this->fail($e->getMessage());
        } catch (Throwable $e) {
            Log::error($e);

            return $this->fail('发送错误');
        }
    }
}
