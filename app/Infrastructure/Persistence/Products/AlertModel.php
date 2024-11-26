<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Products;

use Illuminate\Database\Eloquent\Model;

class AlertModel extends Model
{
    protected $table = 'alerts';
    protected $fillable = [
        'productId',
        'level',
    ];
}
