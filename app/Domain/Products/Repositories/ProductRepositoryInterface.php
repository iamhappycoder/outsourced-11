<?php

declare(strict_types=1);

namespace App\Domain\Products\Repositories;

use App\Domain\Products\Entities\Product;

interface ProductRepositoryInterface
{
    /**
     * @param Product[] $products
     */
    public function createMany(array $products): void;
}
