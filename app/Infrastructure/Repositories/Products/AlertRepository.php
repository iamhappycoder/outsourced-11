<?php

declare(strict_types=1);

namespace App\Infrastructure\Repositories\Products;

use App\Domain\Products\Entities\Alert;
use App\Domain\Products\Repositories\AlertRepositoryInterface;
use App\Infrastructure\Persistence\Products\AlertModel;

class AlertRepository implements AlertRepositoryInterface
{

    public function updateAlert(Alert $alert): void
    {
        $productModel = AlertModel::find($alert->productId);

        if ($productModel) {
            $productModel->level = $alert->level;
            $productModel->save();
        }
    }
}
