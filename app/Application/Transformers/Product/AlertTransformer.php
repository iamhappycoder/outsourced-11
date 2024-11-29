<?php

declare(strict_types=1);

namespace App\Application\Transformers\Product;

use App\Application\DTO\Product\UpdateAlertDTO;
use App\Domain\Products\Entities\Alert;
use App\Infrastructure\Persistence\Products\AlertModel;

readonly class AlertTransformer
{
    public static function fromUpdateAlertDTO(UpdateAlertDTO $updateAlertDTO): Alert
    {
        return new Alert($updateAlertDTO->productId, $updateAlertDTO->level);
    }

    public static function fromAlertModel(?AlertModel $alertModel): ?Alert
    {
        return $alertModel ? new Alert($alertModel->product_id, $alertModel->level) : null;
    }
}
