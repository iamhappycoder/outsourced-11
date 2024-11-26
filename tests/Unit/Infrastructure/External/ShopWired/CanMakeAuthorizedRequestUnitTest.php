<?php

namespace Tests\Unit\Infrastructure\External\ShopWired;

use App\Infrastructure\External\ShopWired\CanMakeAuthorizedRequest;
use Illuminate\Http\Client\Factory as HttpClient;
use Mockery;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Tests\TestCase;

class CanMakeAuthorizedRequestHelper
{
    use CanMakeAuthorizedRequest;

    public function __construct(
        private string $apiKey,
        private string $apiSecret,
        private readonly HttpClient $client)
    {
    }
}

class CanMakeAuthorizedRequestUnitTest extends TestCase
{
    public function testPostSuccess(): void
    {
        $clientMock = Mockery::mock(HttpClient::class);
        $pendingRequestMock = Mockery::mock(PendingRequest::class);

        $pendingRequestMock->shouldReceive('get')->once()
            ->with('the-url', ['x' => 'y'])
            ->andReturn(Mockery::instanceMock(Response::class));

        $clientMock->shouldReceive('withHeaders')->once()
            ->with(['Authorization' => 'Basic a2V5OnNlY3JldA=='])
            ->andReturn($pendingRequestMock);

        (new CanMakeAuthorizedRequestHelper('key', 'secret', $clientMock))
            ->get('the-url', ['x' => 'y']);
    }
}
