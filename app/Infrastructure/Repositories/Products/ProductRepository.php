<?php

declare(strict_types=1);

namespace App\Infrastructure\Repositories\Products;

use App\Application\Transformers\Product\ProductTransformer;
use App\Domain\Products\Repositories\ProductRepositoryInterface;
use App\Infrastructure\Persistence\Products\ProductModel;

class ProductRepository implements ProductRepositoryInterface
{
    public function createMany(array $products): void
    {
        ProductModel::insert(ProductTransformer::toArrayList($products));
    }
}
