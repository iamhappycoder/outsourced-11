<?php

namespace Tests\Integration\Infrastructure\Repository\Products;

use App\Domain\Products\Repositories\ProductRepositoryInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Mother\Products\ProductMother;
use Tests\TestCase;

class ProductRepositoryIntegrationTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateManySuccess(): void
    {
        /** @var ProductRepositoryInterface $repository */
        $repository = $this->app->make(ProductRepositoryInterface::class);

        $repository->createMany(ProductMother::getObjectList());

        $this->assertDatabaseCount('products', 2);
        $this->assertDatabaseHas('products', ['id' => 1, 'sku' => 'SKU1', 'stock' => 101]);
        $this->assertDatabaseHas('products', ['id' => 2, 'sku' => 'SKU2', 'stock' => 102]);
    }
}
