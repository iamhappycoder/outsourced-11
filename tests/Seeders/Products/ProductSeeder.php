<?php

namespace Tests\Seeders\Products;

use App\Infrastructure\Persistence\Products\ProductModel;
use Illuminate\Database\Seeder;
use Tests\Mother\Products\ProductMother;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        ProductModel::insert(ProductMother::createArray(1, 'SKU1', 101));
    }
}
