<?php

declare(strict_types=1);

namespace App\Domain\Products\Entities;

readonly class Alert
{
    public function __construct(
        public int $productId,
        public int $level,
    ) {
    }
}
