<?php

declare(strict_types=1);

namespace App\Contracts;

interface CurdRepositoryInterface
{
    /**
     * 添加业务数据
     */
    public function create(array $data): int;

    /**
     * 按主键ID查询
     */
    public function findOneById(int $id): array;

    /**
     * 按条件查询
     *
     * @return mixed
     */
    public function findOneByWhere(array $condition, string $order, string $sort): array;

    /**
     * 全部查询
     */
    public function findAll(array $condition): array;

    /**
     * 分页查询
     */
    public function paginate(array $condition, int $page, int $pageSize): array;

    /**
     * 按ID更新数据
     */
    public function updateById(array $data, int $id): bool;

    /**
     * 更新数据
     */
    public function update(array $data, array $condition): bool;

    /**
     * 按ID删除数据
     */
    public function deleteById(int $id): bool;

    /**
     * 删除数据
     */
    public function delete(array $condition): bool;

    /**
     * 按ID软删除数据
     */
    public function softDeleteById(int $id): bool;

    /**
     * 按条件软删除数据
     */
    public function softDeleteByWhere(array $condition): bool;
}
