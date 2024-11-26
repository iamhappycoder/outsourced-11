<?php

declare(strict_types=1);

namespace App\Infrastructure\External\ShopWired;

/**
 * @throw RequestException
 */
readonly class GetProducts extends AbstractApiMethod implements GetProductsInterface
{
    public function __invoke(
        int $count,
        int $offset
    ): array
    {
        $response = $this->get(
            ApiUrlGenerator::getProductsUrl(),
            [
                'count' => $count,
                'offset' => $offset
            ],
        );

        return $response->throw()->json();
    }

}
