<?php

declare(strict_types=1);

namespace App\Domain\Products\Services;

use App\Application\Transformers\Product\ProductTransformer;
use App\Domain\Products\Repositories\ProductRepositoryInterface;
use App\Infrastructure\External\ShopWired\GetProductsInterface;

readonly class CreateProductsService implements CreateProductServiceInterface
{
    private const PRODUCTS_PER_REQUEST = 50;

    public function __construct(
        private GetProductsInterface $getProducts,
        private ProductRepositoryInterface $productRepository,
    ) {
    }

    public function __invoke(): void
    {
        $offset = 0;
        do {
            $products = ($this->getProducts)(self::PRODUCTS_PER_REQUEST, $offset);
            if ($products) {
                $this->productRepository->createMany(ProductTransformer::toEntityList($products));
            }

            $offset += self::PRODUCTS_PER_REQUEST;

        } while(!empty($products));
    }
}
