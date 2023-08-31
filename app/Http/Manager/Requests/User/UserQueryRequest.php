<?php

declare(strict_types=1);

namespace App\Http\Manager\Requests\User;

use Flame\Validation\Validator;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'UserQueryRequest',
    properties: [
        new OA\Property(property: 'name', description: '名称', type: 'string', example: ''),
        new OA\Property(property: 'mobile', description: '手机号', type: 'string', example: ''),
        new OA\Property(property: 'status', description: '状态', type: 'integer', example: 1),
    ]
)]
class UserQueryRequest extends Validator
{
    protected array $rule = [

    ];

    protected array $message = [

    ];
}
