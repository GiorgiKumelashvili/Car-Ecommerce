<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static find(mixed $detailID)
 * @method static where(string $string, mixed $vin_code)
 */
class CarDetails extends Model {
    use HasFactory;

    protected $guarded = [];

}
