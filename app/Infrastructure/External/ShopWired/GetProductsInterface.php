<?php

declare(strict_types=1);

namespace App\Infrastructure\External\ShopWired;

interface GetProductsInterface
{
    public function __invoke(int $count, int $offset): array;
}
