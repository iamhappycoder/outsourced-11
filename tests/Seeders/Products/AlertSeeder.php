<?php

namespace Tests\Seeders\Products;

use App\Infrastructure\Persistence\Products\AlertModel;
use Illuminate\Database\Seeder;
use Tests\Mother\Products\AlertMother;

class AlertSeeder extends Seeder
{
    public function run(): void
    {
        AlertModel::insert(AlertMother::createArray(1, 101));
    }
}

