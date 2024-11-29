<?php

declare(strict_types=1);

namespace Tests\Integration\Domain\Products\Services;

use App\Domain\Products\Services\UpdateAlertServiceInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Mother\Products\UpdateAlertDTOMother;
use Tests\Seeders\Products\AlertSeeder;
use Tests\Seeders\Products\ProductSeeder;
use Tests\TestCase;

class UpdateAlertServiceIntegrationTest extends TestCase
{
    use RefreshDatabase;

    public function testSuccess(): void
    {
        $this->seed([
            ProductSeeder::class,
            AlertSeeder::class,
        ]);

        /** @var UpdateAlertServiceInterface $service */
        $service = $this->app->make(UpdateAlertServiceInterface::class);

        $this->assertDatabaseHas('alerts', ['product_id' => 1, 'level' => 101]);

        $service(UpdateAlertDTOMother::createObject(1, 13));

        $this->assertDatabaseHas('alerts', ['product_id' => 1, 'level' => 13]);
    }
}
