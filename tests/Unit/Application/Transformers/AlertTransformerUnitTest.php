<?php

namespace Tests\Unit\Application\Transformers;

use App\Application\Transformers\Product\AlertTransformer;
use App\Domain\Products\Entities\Alert;
use Tests\Mother\Products\UpdateAlertDTOMother;
use PHPUnit\Framework\TestCase;

class AlertTransformerUnitTest extends TestCase
{
    public function testFromUpdateAlertDTOSuccess(): void
    {
        $alert = AlertTransformer::fromUpdateAlertDTO(UpdateAlertDTOMother::getSingle());

        $this->assertInstanceOf(Alert::class, $alert);
        $this->assertSame(1, $alert->productId);
        $this->assertSame(101, $alert->level);
    }
}
