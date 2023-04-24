<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * 用户状态
 */
enum UserStatusEnum: int
{
    /**
     * 正常
     */
    case OK = 1;

    /**
     * 停用
     */
    case DISABLE = 2;
}
