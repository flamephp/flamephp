<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\Article;
use Exception;
use Flame\Database\Contracts\RepositoryInterface;
use Flame\Database\Model;
use Flame\Database\Repositories\CurdRepository;

class ArticleRepository extends CurdRepository implements RepositoryInterface
{
    private static ?ArticleRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): ArticleRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new ArticleRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function createByInput(Article $entity): int
    {
        return $this->create($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnArticleOutput(int $id): ?Article
    {
        $data = $this->findOneById($id);
        if (empty($data)) {
            return null;
        }

        $output = new Article();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询
     */
    public function findOneByWhereReturnArticleOutput(array $condition): ?Article
    {
        $data = $this->findOneByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new Article();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     *
     * @throws Exception
     */
    public function findAllReturnArticleOutput(array $condition = []): array
    {
        $result = $this->findAll($condition);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new Article();
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
    public function paginateReturnArticleOutput(array $condition, int $page, int $pageSize): array
    {
        $result = $this->paginate($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new Article();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(string $modelName = 'Article'): Model
    {
        $model = '\\App\\Models\\'.$modelName.'Model';

        return new $model();
    }
}
