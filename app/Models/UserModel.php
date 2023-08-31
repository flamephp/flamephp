<?php

declare(strict_types=1);

namespace App\Models;

class UserModel extends CommonModel
{
    /**
     * 设置表
     */
    protected $name = 'user';

    /**
     * 设置字段
     */
    protected $field = [
        'id',
        'name',
        'avatar',
        'birthday',
        'mobile',
        'mobile_verified_at',
        'password',
        'status',
        'remember_token',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
