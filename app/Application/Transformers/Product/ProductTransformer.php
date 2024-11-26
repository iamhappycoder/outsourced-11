<?php

declare(strict_types=1);

namespace App\Application\Transformers\Product;

use App\Domain\Products\Entities\Product;

readonly class ProductTransformer
{
    /**
     * @return Product[]
     */
    public static function toEntityList(array $products): array
    {
        return array_map(function(array $product): Product {
            return new Product(
                $product['id'],
                $product['sku'],
                $product['stock'],
            );
        }, $products);
    }

    /**
     * @param Product[] $products
     */
    public static function toArrayList(array $products): array
    {
        return array_map(function(Product $product): array {
            return [
                'id' => $product->id,
                'sku' => $product->sku,
                'stock' => $product->stock,
            ];
        }, $products);

    }
}
