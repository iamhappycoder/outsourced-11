<?php

declare(strict_types=1);

namespace Tests\Unit\Domain\Product\Services;

use App\Domain\Products\Repositories\AlertRepositoryInterface;
use App\Domain\Products\Services\UpdateAlertService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use PHPUnit\Framework\TestCase;
use Tests\Mother\Products\AlertMother;
use Tests\Mother\Products\UpdateAlertDTOMother;

class UpdateAlertServiceUnitTest extends TestCase
{
    public function testFailureModelNotFound(): void
    {
        $repositoryMock = $this->createMock(AlertRepositoryInterface::class);

        $updateAlertDTO = UpdateAlertDTOMother::getSingle();

        $repositoryMock->expects($this->once())->method('findByProductId')
            ->with(1)
            ->willReturn(null);

        $repositoryMock->expects($this->never())->method('updateAlert');

        $this->expectException(ModelNotFoundException::class);
        $this->expectExceptionMessage('Alert for product 1 not found');

        (new UpdateAlertService($repositoryMock))($updateAlertDTO);
    }

    public function testSuccess(): void
    {
        $repositoryMock = $this->createMock(AlertRepositoryInterface::class);

        $updateAlertDTO = UpdateAlertDTOMother::getSingle();
        $alert = AlertMother::getSingle();

        $repositoryMock->expects($this->once())->method('findByProductId')
            ->with(1)
            ->willReturn($alert);

        $repositoryMock->expects($this->once())->method('updateAlert')
            ->with($alert);

        (new UpdateAlertService($repositoryMock))($updateAlertDTO);
    }
}
