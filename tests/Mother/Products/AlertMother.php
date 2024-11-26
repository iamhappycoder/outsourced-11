<?php

namespace Tests\Mother\Products;

use App\Domain\Products\Entities\Alert;

readonly class AlertMother
{
    public static function createArray(
        int $productId,
        int $level,
    ): array {
        return ['product_id' => $productId, 'level' => $level];
    }

    public static function createObject(
        int $productId,
        int $level,
    ): Alert {
        return new Alert($productId, $level);
    }
}
