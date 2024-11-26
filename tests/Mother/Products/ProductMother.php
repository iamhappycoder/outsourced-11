<?php

namespace Tests\Mother\Products;

use App\Domain\Products\Entities\Product;

readonly class ProductMother
{
    public static function createArray(
        int $id,
        string $sku,
        int $stock,
    ): array {
        return ['id' => $id, 'sku' => $sku, 'stock' => $stock];
    }

    public static function createObject(
        int $id,
        string $sku,
        int $stock,
    ): Product {
        return new Product($id, $sku, $stock);
    }

    public static function getArrayList($count = 2): array
    {
        return array_map(function(int $i): array {
            return self::createArray($i, "SKU{$i}", 100 + $i);
        }, range(1, $count));
    }

    public static function getObjectList($count = 2): array
    {
        return array_map(function(int $i): Product {
            return self::createObject($i, "SKU{$i}", 100 + $i);
        }, range(1, $count));
    }
}

