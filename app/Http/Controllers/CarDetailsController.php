<?php

namespace App\Http\Controllers;

use App\Models\Car;

class CarDetailsController extends Controller {
    public function index($id) {
        $car_detailed = Car::withDetailsAndImages('cars.id', $id);

        return view('car.car_detailed_view', ['car' => $car_detailed]);
    }
}
