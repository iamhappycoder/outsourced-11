<?php

declare(strict_types=1);

namespace App\Domain\Products\Services;

use App\Application\DTO\Product\UpdateAlertDTO;

interface UpdateAlertServiceInterface
{
    public function __invoke(UpdateAlertDTO $updateAlertDTO);
}
