<?php

declare(strict_types=1);

namespace Tests\Unit\Infrastructure\External\ShopWired;

use App\Infrastructure\External\ShopWired\ApiUrlGenerator;
use PHPUnit\Framework\TestCase;

class ApiUrlGeneratorUnitTest extends TestCase
{
    public function testGetProductsUrl(): void
    {
        $this->assertSame('https://api.ecommerceapi.uk/v1/products', ApiUrlGenerator::getProductsUrl());
    }

    public function testGetProductsUrlWithQueryString(): void
    {
        $this->assertSame('https://api.ecommerceapi.uk/v1/products?count=1', ApiUrlGenerator::getProductsUrl(['count' => '1']));
    }

    public function testUpdateStockUrl(): void
    {
        $this->assertSame('https://api.ecommerceapi.uk/v1/stock', ApiUrlGenerator::getStockUrl());
    }
}
