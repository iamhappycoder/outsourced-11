<?php

declare(strict_types=1);

namespace Tests\Unit\Infrastructure\External\ShopWired;

use Illuminate\Http\Client\Factory as HttpClient;
use App\Infrastructure\External\ShopWired\GetProducts;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Mockery;
use PHPUnit\Framework\TestCase;

class GetProductsUnitTest extends TestCase
{
    public function testSuccess(): void
    {
        $clientMock = Mockery::mock(HttpClient::class);
        $responseMock = Mockery::mock(Response::class);
        $pendingRequestMock = Mockery::mock(PendingRequest::class);

        $responseMock->shouldReceive('throw')->once()
            ->andReturnSelf();
        $responseMock->shouldReceive('json')->once()
            ->andReturn(['the-json']);

        $pendingRequestMock->shouldReceive('get')->once()
            ->with('https://api.ecommerceapi.uk/v1/products', ['count' => 2, 'offset' => 0])
            ->andReturn($responseMock);

        $clientMock->shouldReceive('withHeaders')->once()
            ->with(['Authorization' => 'Basic a2V5OnNlY3JldA=='])
            ->andReturn($pendingRequestMock);

        $products = (new GetProducts('key', 'secret', $clientMock))(2, 0);

        $this->assertSame(['the-json'], $products);
    }
}
