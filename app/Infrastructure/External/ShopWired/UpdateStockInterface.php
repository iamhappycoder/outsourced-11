<?php

declare(strict_types=1);

namespace App\Infrastructure\External\ShopWired;

interface UpdateStockInterface
{
    public function __invoke(
        string $sku,
        int $quantity,
    ): bool;
}
