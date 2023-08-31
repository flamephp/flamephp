<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\UserRepository;
use Flame\Contracts\ServiceInterface;

class UserService extends CommonService implements ServiceInterface
{
    public function getRepository(): UserRepository
    {
        return UserRepository::getInstance();
    }
}
