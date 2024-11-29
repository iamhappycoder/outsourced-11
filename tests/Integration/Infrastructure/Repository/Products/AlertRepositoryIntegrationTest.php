<?php

namespace Tests\Integration\Infrastructure\Repository\Products;

use App\Domain\Products\Entities\Alert;
use App\Domain\Products\Repositories\AlertRepositoryInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Mother\Products\AlertMother;
use Tests\Seeders\Products\AlertSeeder;
use Tests\Seeders\Products\ProductSeeder;
use Tests\TestCase;

class AlertRepositoryIntegrationTest extends TestCase
{
    use RefreshDatabase;

    public function testFindByProductIdFailure(): void
    {
        /** @var AlertRepositoryInterface    $repository */
        $repository = $this->app->make(AlertRepositoryInterface::class);

        $alertModel = $repository->findByProductId(1);

        $this->assertNull($alertModel);
    }

    public function testFindByProductIdSuccess(): void
    {
        $this->seed([
            ProductSeeder::class,
            AlertSeeder::class
        ]);

        /** @var AlertRepositoryInterface    $repository */
        $repository = $this->app->make(AlertRepositoryInterface::class);

        $alert = $repository->findByProductId(1);

        $this->assertInstanceOf(Alert::class, $alert);
    }

    public function testUpdateAlertSuccess(): void
    {
        $this->seed([
            ProductSeeder::class,
            AlertSeeder::class
        ]);

        /** @var AlertRepositoryInterface    $repository */
        $repository = $this->app->make(AlertRepositoryInterface::class);

        $this->assertDatabaseHas('alerts', ['product_id' => 1, 'level' => 101]);

        $repository->updateAlert(AlertMother::createObject(1, 13));

        $this->assertDatabaseHas('alerts', ['product_id' => 1, 'level' => 13]);
    }
}
