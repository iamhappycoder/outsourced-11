<?php

namespace Tests\Integration\Infrastructure\External\ShopWired;

use App\Infrastructure\External\ShopWired\UpdateStock;
use Tests\TestCase;

class UpdateStockIntegrationTest extends TestCase
{
    public function testSuccess(): void
    {
        $updateStock = $this->app->make(UpdateStock::class);
        $isUpdated = $updateStock('BLUET1', 13);

        $this->assertTrue($isUpdated);
    }
}
