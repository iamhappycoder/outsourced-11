<?php

namespace Tests\Unit\Infrastructure\External\ShopWired;

use App\Infrastructure\External\ShopWired\UpdateStock;
use Illuminate\Http\Client\Factory as HttpClient;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Mockery;
use PHPUnit\Framework\TestCase;

class UpdateStockUnitTest extends TestCase
{
    public function testFailureNotUpdated(): void
    {
        $clientMock = Mockery::mock(HttpClient::class);
        $responseMock = Mockery::mock(Response::class);
        $pendingRequestMock = Mockery::mock(PendingRequest::class);

        $responseMock->shouldReceive('throw')->once()
            ->andReturnSelf();
        $responseMock->shouldReceive('json')->once()
            ->andReturn(['quantity' => 0]);

        $pendingRequestMock->shouldReceive('post')->once()
            ->with('https://api.ecommerceapi.uk/v1/stock', ['sku' => 'SKU1', 'quantity' => 2])
            ->andReturn($responseMock);

        $clientMock->shouldReceive('withHeaders')->once()
            ->with(['Authorization' => 'Basic a2V5OnNlY3JldA=='])
            ->andReturn($pendingRequestMock);

        $isUpdated = (new UpdateStock('key', 'secret', $clientMock))('SKU1', 2);

        $this->assertFalse($isUpdated);
    }
    public function testSuccess(): void
    {
        $clientMock = Mockery::mock(HttpClient::class);
        $responseMock = Mockery::mock(Response::class);
        $pendingRequestMock = Mockery::mock(PendingRequest::class);

        $responseMock->shouldReceive('throw')->once()
            ->andReturnSelf();
        $responseMock->shouldReceive('json')->once()
            ->andReturn(['quantity' => 2]);

        $pendingRequestMock->shouldReceive('post')->once()
            ->with('https://api.ecommerceapi.uk/v1/stock', ['sku' => 'SKU1', 'quantity' => 2])
            ->andReturn($responseMock);

        $clientMock->shouldReceive('withHeaders')->once()
            ->with(['Authorization' => 'Basic a2V5OnNlY3JldA=='])
            ->andReturn($pendingRequestMock);

        $isUpdated = (new UpdateStock('key', 'secret', $clientMock))('SKU1', 2);

        $this->assertTrue($isUpdated);
    }
}
