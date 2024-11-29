<?php

declare(strict_types=1);

namespace App\Domain\Products;


use App\Domain\Products\Repositories\AlertRepositoryInterface;
use App\Domain\Products\Repositories\ProductRepositoryInterface;
use App\Domain\Products\Services\CreateProductServiceInterface;
use App\Domain\Products\Services\CreateProductsService;
use App\Domain\Products\Services\UpdateAlertService;
use App\Domain\Products\Services\UpdateAlertServiceInterface;
use App\Infrastructure\External\ShopWired\UpdateStock;
use App\Infrastructure\External\ShopWired\UpdateStockInterface;
use App\Infrastructure\Repositories\Products\AlertRepository;
use App\Infrastructure\Repositories\Products\ProductRepository;
use App\Infrastructure\External\ShopWired\GetProducts;
use App\Infrastructure\External\ShopWired\GetProductsInterface;
use Illuminate\Support\ServiceProvider;

final class ProductsProvider extends ServiceProvider
{
    public array $bindings = [
        //
        // UseCases
        //
        GetProductsInterface::class => GetProducts::class,
        UpdateStockInterface::class => UpdateStock::class,

        //
        // Services
        //
        CreateProductServiceInterface::class => CreateProductsService::class,
        UpdateAlertServiceInterface::class => UpdateAlertService::class,

        //
        // Repositories
        //
        ProductRepositoryInterface::class => ProductRepository::class,
        AlertRepositoryInterface::class => AlertRepository::class,

    ];

    public function register(): void
    {
        $this->app->when([
            GetProducts::class,
            UpdateStock::class,
        ])
        ->needs('$apiKey')
        ->give(env('SHOPWIRED_API_KEY'));

        $this->app->when([
            GetProducts::class,
            UpdateStock::class,
        ])
        ->needs('$apiSecret')
        ->give(env('SHOPWIRED_API_SECRET'));
    }

    public function boot(): void
    {
    }
}
