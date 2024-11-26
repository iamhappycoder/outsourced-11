<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Products;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'sku',
        'stockLevel',
        'alertLevel',
    ];
}
