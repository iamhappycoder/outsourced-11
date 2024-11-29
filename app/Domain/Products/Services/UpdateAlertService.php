<?php

declare(strict_types=1);

namespace App\Domain\Products\Services;

use App\Application\DTO\Product\UpdateAlertDTO;
use App\Domain\Products\Repositories\AlertRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

readonly class UpdateAlertService implements UpdateAlertServiceInterface
{
    public function __construct(
        private AlertRepositoryInterface $alertRepository,
    ) {
    }

    public function __invoke(UpdateAlertDTO $updateAlertDTO)
    {
        $alert = $this->alertRepository->findByProductId($updateAlertDTO->productId);

        if (null === $alert) {
            throw new ModelNotFoundException("Alert for product {$updateAlertDTO->productId} not found");
        }

        $alert->level = $updateAlertDTO->level;
        $this->alertRepository->updateAlert($alert);
    }
}
