<?php

declare(strict_types=1);

namespace App\Application\Transformers\Product;

use App\Application\DTO\Product\UpdateAlertDTO;
use App\Domain\Products\Entities\Alert;

readonly class AlertTransformer
{
    public static function fromUpdateAlertDTO(UpdateAlertDTO $updateAlertDTO): Alert
    {
        return new Alert($updateAlertDTO->productId, $updateAlertDTO->level);
    }
}
