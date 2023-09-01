<?php

declare(strict_types=1);

namespace App\Entities;

use Flame\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ArticleSchema')]
class Article
{
    use ArrayObject;

    #[OA\Property(property: 'id', description: '', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'title', description: '文章标题', type: 'string')]
    private string $title;

    #[OA\Property(property: 'image', description: '文章海报', type: 'string')]
    private string $image;

    #[OA\Property(property: 'content', description: '文章描述', type: 'string')]
    private string $content;

    #[OA\Property(property: 'status', description: '状态（1正常，2禁用）', type: 'integer')]
    private int $status;

    #[OA\Property(property: 'created_time', description: '创建时间', type: 'string')]
    private string $createdTime;

    #[OA\Property(property: 'updated_time', description: '更新时间', type: 'string')]
    private string $updatedTime;

    #[OA\Property(property: 'deleted_time', description: '删除时间', type: 'string')]
    private string $deletedTime;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    public function getCreatedTime(): string
    {
        return $this->createdTime;
    }

    public function setCreatedTime(string $createdTime): void
    {
        $this->createdTime = $createdTime;
    }

    public function getUpdatedTime(): string
    {
        return $this->updatedTime;
    }

    public function setUpdatedTime(string $updatedTime): void
    {
        $this->updatedTime = $updatedTime;
    }

    public function getDeletedTime(): string
    {
        return $this->deletedTime;
    }

    public function setDeletedTime(string $deletedTime): void
    {
        $this->deletedTime = $deletedTime;
    }
}
