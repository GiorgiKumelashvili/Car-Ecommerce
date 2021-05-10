<?php

namespace App\Models;

use App\Http\Resources\CarDetailsResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @method static where(string $string, $id)
 * @method static paginate(int $int)
 * @method static create(string[] $array)
 * @method static find(mixed $carID)
 */
class Car extends Model {
    use HasFactory;

    protected $hidden = ['password'];
    protected $guarded = [];

    public static function withDetailsAndImages(string $key, string $value): CarDetailsResource {
        $car = DB::table('cars')
            ->join('car_details', 'cars.car_details_id', '=', 'car_details.id')
            ->join('users', 'cars.user_id', '=', 'users.id')
            ->where($key, $value)
            ->get();


        $images = DB::table('images')
            ->where('car_details_id', $car[0]->car_details_id)
            ->select('url')
            ->get()
            ->map(function ($el) { return $el->url; });

        $car[0]->images = $images;

        return new CarDetailsResource($car[0]);
    }

    public function details(): \Illuminate\Database\Eloquent\Relations\HasOne {
        return $this->hasOne(CarDetails::class, 'id', 'car_details_id');
//        return $this->belongsTo(CarDetails::class);
    }
}
