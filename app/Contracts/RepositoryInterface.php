<?php

declare(strict_types=1);

namespace App\Contracts;

use Flame\Database\Model;

interface RepositoryInterface
{
    public function model(): Model;
}
