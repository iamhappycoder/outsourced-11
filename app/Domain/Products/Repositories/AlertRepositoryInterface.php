<?php

declare(strict_types=1);

namespace App\Domain\Products\Repositories;

use App\Domain\Products\Entities\Alert;

interface AlertRepositoryInterface
{
    public function updateAlert(Alert $alert): void;
}
