<?php

namespace Tests\Integration\Domain\Products\Services;

use App\Domain\Products\Services\CreateProductsService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateProductServiceIntegrationTest extends TestCase
{
    use RefreshDatabase;

    public function testSuccess(): void
    {
        $service = $this->app->make(CreateProductsService::class);

        $service();

        $this->assertDatabaseCount('products', 8);
    }
}
