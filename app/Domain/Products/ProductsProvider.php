<?php

declare(strict_types=1);

namespace App\Domain\Products;


use App\Domain\Products\Repositories\AlertRepositoryInterface;
use App\Domain\Products\Repositories\ProductRepositoryInterface;
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
