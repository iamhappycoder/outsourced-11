<?php

declare(strict_types=1);

namespace App\Domain\Products\Entities;

class Product
{
    public function __construct(
        public int $id,
        public string $sku,
        public int $stock,
    ) {
    }
}
