<?php

declare(strict_types=1);

namespace App\Gateways\Auth\Responses;

use Flame\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'LoginResponse')]
class LoginResponse
{
    use ArrayObject;

    #[OA\Property(property: 'jwt', description: '用户JSON Web Token凭证', example: '123456'), ]
    private string $jwt;

    public function getJwt(): string
    {
        return $this->jwt;
    }

    public function setJwt(string $jwt): void
    {
        $this->jwt = $jwt;
    }
}
