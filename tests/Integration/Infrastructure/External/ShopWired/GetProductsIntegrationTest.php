<?php

namespace Tests\Integration\Infrastructure\External\ShopWired;

use App\Infrastructure\External\ShopWired\GetProductsInterface;
use Coduo\PHPMatcher\PHPUnit\PHPMatcherAssertions;
use Tests\TestCase;

class GetProductsIntegrationTest extends TestCase
{
    use PHPMatcherAssertions;

    public function testSuccess(): void
    {
        /** @var GetProductsInterface $getProducts */
        $getProducts = $this->app->make(GetProductsInterface::class);

        $products = $getProducts(8, 0);

        $this->assertMatchesPattern('@array@', $products);
        $this->assertMatchesPattern(
            [
                'sku' => '@string@',
                'stock' => '@integer@',
            ],
            array_intersect_key($products[0], array_flip(['sku', 'stock'])),
        );
    }
}
