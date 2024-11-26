<?php

declare(strict_types=1);

namespace App\Infrastructure\External\ShopWired;

use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;

trait CanMakeAuthorizedRequest
{
    public function get(string $url, $query): PromiseInterface | Response
    {
        return $this->client
            ->withHeaders([
                'Authorization' => 'Basic ' . base64_encode($this->apiKey . ':' . $this->apiSecret),
            ])
            ->get($url, $query);
    }

    public function post(string $url, array $data): PromiseInterface | Response
    {
        return $this->client
            ->withHeaders([
                'Authorization' => 'Basic ' . base64_encode($this->apiKey . ':' . $this->apiSecret),
            ])
            ->post($url, $data);
    }
}
