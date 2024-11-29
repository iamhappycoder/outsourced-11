<?php

declare(strict_types=1);

namespace App\Domain\Products\Entities;

class Alert
{
    public function __construct(
        public readonly int $productId,
        public int $level,
    ) {
    }
}
