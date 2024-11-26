<?php

namespace Tests\Unit\Application\Transformers;

use App\Application\Transformers\Product\ProductTransformer;
use PHPUnit\Framework\TestCase;
use Tests\Mother\Products\ProductMother;

class ProductTransformerUnitTest extends TestCase
{
    public function testToEntityListSuccess(): void
    {
        $list = ProductTransformer::toEntityList(ProductMother::getArrayList());

        $this->assertEquals(ProductMother::getObjectList(), $list);
    }

    public function testToArrayListSuccess(): void
    {
        $list = ProductTransformer::toArrayList(ProductMother::getObjectList());
        $this->assertEquals(ProductMother::getArrayList(), $list);
    }
}
