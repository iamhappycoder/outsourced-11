<?php

declare(strict_types=1);

namespace App\Application\DTO\Product;

readonly class UpdateAlertDTO
{
    public function __construct(
        public int $productId,
        public int $level,
    ) {
    }

}

