<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\User;
use Exception;
use Flame\Database\Contracts\RepositoryInterface;
use Flame\Database\Model;
use Flame\Database\Repositorys\CurdRepository;

class UserRepository extends CurdRepository implements RepositoryInterface
{
    private static ?UserRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): UserRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new UserRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function createByInput(User $entity): int
    {
        return $this->create($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnUserOutput(int $id): ?User
    {
        $data = $this->findOneById($id);
        if (empty($data)) {
            return null;
        }

        $output = new User();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询
     */
    public function findOneByWhereReturnUserOutput(array $condition): ?User
    {
        $data = $this->findOneByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new User();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     *
     * @throws Exception
     */
    public function findAllReturnUserOutput(array $condition = []): array
    {
        $result = $this->findAll($condition);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new User();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     *
     * @throws Exception
     */
    public function paginateReturnUserOutput(array $condition, int $page, int $pageSize): array
    {
        $result = $this->paginate($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new User();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(string $modelName = 'User'): Model
    {
        $model = '\\App\\Models\\'.$modelName.'Model';

        return new $model();
    }
}
