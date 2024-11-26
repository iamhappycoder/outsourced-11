<?php

declare(strict_types=1);

namespace App\Infrastructure\External\ShopWired;

use Illuminate\Http\Client\Factory as HttpClient;

readonly abstract class AbstractApiMethod
{
    use CanMakeAuthorizedRequest;

    public function __construct(
        private string $apiKey,
        private string $apiSecret,

        protected HttpClient $client,
    ) {
    }
}
