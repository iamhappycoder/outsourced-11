<?php

declare(strict_types=1);

namespace App\Infrastructure\Repositories\Products;

use App\Application\Transformers\Product\AlertTransformer;
use App\Domain\Products\Entities\Alert;
use App\Domain\Products\Repositories\AlertRepositoryInterface;
use App\Infrastructure\Persistence\Products\AlertModel;

class AlertRepository implements AlertRepositoryInterface
{
    public function findByProductId(int $productId): ?Alert
    {
        $alertModel = AlertModel::where('product_id', $productId)->first();

        return AlertTransformer::fromAlertModel($alertModel);
    }

    public function updateAlert(Alert $alert): void
    {
        $productModel = AlertModel::where('product_id', $alert->productId)->first();

        if ($productModel) {
            $productModel->level = $alert->level;
            $productModel->save();
        }
    }
}
