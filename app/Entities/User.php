<?php

declare(strict_types=1);

namespace App\Entities;

use Flame\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'UserSchema')]
class User
{
    use ArrayObject;

    #[OA\Property(property: 'id', description: '', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'name', description: '昵称', type: 'string')]
    private string $name;

    #[OA\Property(property: 'avatar', description: '头像', type: 'string')]
    private string $avatar;

    #[OA\Property(property: 'birthday', description: '生日', type: 'string')]
    private string $birthday;

    #[OA\Property(property: 'mobile', description: '手机号码', type: 'string')]
    private string $mobile;

    #[OA\Property(property: 'mobile_verified_at', description: '手机号码验证时间', type: 'string')]
    private string $mobileVerifiedAt;

    #[OA\Property(property: 'password', description: '登录密码', type: 'string')]
    private string $password;

    #[OA\Property(property: 'status', description: '状态:1正常;2禁用', type: 'integer')]
    private int $status;

    #[OA\Property(property: 'remember_token', description: '', type: 'string')]
    private string $rememberToken;

    #[OA\Property(property: 'created_at', description: '', type: 'string')]
    private string $createdAt;

    #[OA\Property(property: 'updated_at', description: '', type: 'string')]
    private string $updatedAt;

    #[OA\Property(property: 'deleted_at', description: '', type: 'string')]
    private string $deletedAt;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getAvatar(): string
    {
        return $this->avatar;
    }

    public function setAvatar(string $avatar): void
    {
        $this->avatar = $avatar;
    }

    public function getBirthday(): string
    {
        return $this->birthday;
    }

    public function setBirthday(string $birthday): void
    {
        $this->birthday = $birthday;
    }

    public function getMobile(): string
    {
        return $this->mobile;
    }

    public function setMobile(string $mobile): void
    {
        $this->mobile = $mobile;
    }

    public function getMobileVerifiedAt(): string
    {
        return $this->mobileVerifiedAt;
    }

    public function setMobileVerifiedAt(string $mobileVerifiedAt): void
    {
        $this->mobileVerifiedAt = $mobileVerifiedAt;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    public function getRememberToken(): string
    {
        return $this->rememberToken;
    }

    public function setRememberToken(string $rememberToken): void
    {
        $this->rememberToken = $rememberToken;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(string $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    public function getDeletedAt(): string
    {
        return $this->deletedAt;
    }

    public function setDeletedAt(string $deletedAt): void
    {
        $this->deletedAt = $deletedAt;
    }
}
