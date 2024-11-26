<?php

declare(strict_types=1);

namespace App\Infrastructure\External\ShopWired;

use Illuminate\Http\Client\Factory as HttpClient;

readonly class UpdateStock implements UpdateStockInterface
{
    use CanMakeAuthorizedRequest;

    public function __construct(
        private string $apiKey,
        private string $apiSecret,

        private HttpClient $client,
    ) {
    }

    public function __invoke(
        string $sku,
        int $quantity,
    ): bool
    {
        $response = $this->post(
            ApiUrlGenerator::getStockUrl(),
            [
                'sku' => $sku,
                'quantity' => $quantity,
            ],
        );

        $data = $response->throw()->json();

        return ($data['quantity'] ?? null) === $quantity;
    }
}
