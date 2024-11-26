<?php

namespace Tests\Unit\Domain\Product\Services;

use App\Domain\Products\Repositories\ProductRepositoryInterface;
use App\Domain\Products\Services\CreateProductsService;
use App\Infrastructure\External\ShopWired\GetProductsInterface;
use PHPUnit\Framework\TestCase;
use Tests\Mother\Products\ProductMother;

class CreateProductServiceUnitTest extends TestCase
{
    public function testFailureNoProductCreated(): void
    {
        $getProductsMock = $this->createMock(GetProductsInterface::class);
        $productRepositoryMock = $this->createMock(ProductRepositoryInterface::class);

        $getProductsMock->expects($this->once())->method('__invoke')
            ->with(50, 0)
            ->willReturn([]);

         $productRepositoryMock->expects($this->never())->method('createMany');

        (new CreateProductsService(
            $getProductsMock,
            $productRepositoryMock
        ))();
    }

    public function testSuccess(): void
    {
        $getProductsMock = $this->createMock(GetProductsInterface::class);
        $productRepositoryMock = $this->createMock(ProductRepositoryInterface::class);

        $getProductsMock->expects($this->exactly(3))->method('__invoke')
            ->with($this->logicalOr(
                    $this->equalTo(50, 0),
                    $this->equalTo(50, 50),
                    $this->equalTo(50, 100)
            ))
            ->willReturnOnConsecutiveCalls(
                ProductMother::getArrayList(2),
                ProductMother::getArrayList(2),
                [],
            );

         $productRepositoryMock->expects($this->exactly(2))->method('createMany')
            ->with($this->isType('array'));

        (new CreateProductsService(
            $getProductsMock,
            $productRepositoryMock
        ))();
    }
}
