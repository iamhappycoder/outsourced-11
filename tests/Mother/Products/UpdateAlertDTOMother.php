<?php

namespace Tests\Mother\Products;

use App\Application\DTO\Product\UpdateAlertDTO;

readonly class UpdateAlertDTOMother
{
    public static function createObject(
        int $productId,
        int $level,
    ): UpdateAlertDTO {
        return new UpdateAlertDTO($productId, $level);
    }
}
