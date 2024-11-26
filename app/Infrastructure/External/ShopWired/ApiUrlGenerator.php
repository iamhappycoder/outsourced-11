<?php

declare(strict_types=1);

namespace App\Infrastructure\External\ShopWired;

/**
 * @see https://api.shopwired.co.uk/
 */
readonly class ApiUrlGenerator
{
    private const API_PRODUCTS = 'products';
    private const API_STOCK = 'stock';

    public static function getProductsUrl(array $query = []): string
    {
        return self::getUrl(self::API_PRODUCTS, 1, $query);
    }

    public static function getStockUrl(): string
    {
        return self::getUrl(self::API_STOCK, 1);
    }

    protected static function getUrl(
        string $api,
        int $version,
        array $query = [],
    ): string {
        $url = "https://api.ecommerceapi.uk/v{$version}/$api";

        if ($query) {
            $url .= '?' . http_build_query($query);
        }

        return $url;
    }
}
