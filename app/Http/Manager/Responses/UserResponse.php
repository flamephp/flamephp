<?php

declare(strict_types=1);

namespace App\Http\Manager\Responses;

use Flame\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'UserResponse')]
class UserResponse
{
    use ArrayObject;

    #[OA\Property(property: 'id', description: '编号', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'name', description: '员工姓名', type: 'string')]
    private string $name;

    #[OA\Property(property: 'avatar', description: '头像', type: 'string')]
    private string $avatar;

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setAvatar(string $avatar): void
    {
        $this->avatar = $avatar;
    }
}
