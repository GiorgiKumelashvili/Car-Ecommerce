<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController extends Controller {
    public function index(): Renderable {

        $hotDeals = DB::table('cars')
            ->orderBy('price_usd')
            ->where('price_usd', '>', '1000')
            ->limit(8)
            ->get();

        return view('home', ['hotDeals' => $hotDeals]);
    }

    public function catalogue(Request $request) {
        if ($vincode = $request->input('vin_code')) {
            try {
                // 7QYXZ2665CBVPCRRO
                $car_detailed = Car::withDetailsAndImages('car_details.vin_code', $vincode);
                return view('car.car_detailed_view', ['car' => $car_detailed]);
            }
            catch (Exception $exception) {
                dd("Not Found");
            }
        }

        $query = DB::table('cars');

        // prices
        if ($priceFrom = $request->input('price_from')) {
            $query = $query->where('price_usd', '>=', $priceFrom);
        }

        if ($priceTo = $request->input('price_to')) {
            $query = $query->where('price_usd', '<=', $priceTo);
        }

        // if city_location is in url then join with users
        if ($city = $request->input('city_location')) {
            $query
                ->join('users', 'cars.user_id', '=', 'users.id')
                ->where('city', $city)
                ->select('users.name as username', 'users.city', 'cars.*');
        }

        // if these are in url then join with car_details is needed
        $carDetailsParams = ['engine_from', 'engine_to', 'year_from', 'year_to', 'wheel_side', 'levied', 'gearbox', 'fuel_type', 'manufacturer', 'category'];
        $urlParams = array_filter($request->all(), fn($value) => !is_null($value) && $value !== '');

        if (count(array_intersect($carDetailsParams, array_keys($urlParams))) > 0) {
            $query->join('car_details', 'cars.car_details_id', '=', 'car_details.id');

        }

        // engine
        if ($engineFrom = $request->input('engine_from')) {
            $query->select('car_details.engine_capacity')->select('cars.*');
            $query = $query->where('engine_capacity', '>=', $engineFrom);
        }

        if ($engineTo = $request->input('engine_to')) {
            $query->select('car_details.engine_capacity')->select('cars.*');
            $query = $query->where('engine_capacity', '<=', $engineTo);
        }

        // release year
        if ($yearFrom = $request->input('year_from')) {
            $query->select('car_details.release_year')->select('cars.*');
            $query = $query->where('release_year', '>=', $yearFrom);
        }

        if ($yearTo = $request->input('year_to')) {
            $query->select('car_details.release_year')->select('cars.*');
            $query = $query->where('release_year', '<=', $yearTo);
        }

        //================================================
        //wheel
        if ($wheel = $request->input('wheel_side')) {
            $query->select('car_details.wheel_side')->select('cars.*');
            $query = $query->where('wheel_side', $wheel);
        }

        // levied
        if ($levied = $request->input('levied')) {
            $levied = $levied == 'true' ? 1 : 0;

            $query = $query->where('is_levied', $levied);
            $query->select('car_details.is_levied')->select('cars.*');
        }

        // gearbox
        if ($gearbox = $request->input('gearbox')) {
            $query->select('car_details.gear_box')->select('cars.*');
            $query = $query->where('gear_box', $gearbox);
        }

        // fuel_type
        if ($fuelType = $request->input('fuel_type')) {
            $query->select('car_details.fuel_type')->select('cars.*');
            $query = $query->where('fuel_type', $fuelType);
        }

        // manufacturer
        if ($manufacturer = $request->input('manufacturer')) {
            $query->select('car_details.manufacturer')->select('cars.*');
            $query = $query->where('manufacturer', $manufacturer);
        }

        // category
        if ($category = $request->input('category')) {
            $query->select('car_details.category')->select('cars.*');
            $query = $query->where('category', $category);
        }

        // paginate
        $cars = $query->paginate(20);

        // send data to session for saving
        $request->flash();

        // return view
        return view('car.car_catalogue', ['cars' => $cars]);
    }

    public function create() { }

    public function store(Request $request) { }

    public function show(Car $car) { }

    public function edit(Car $car) { }

    public function update(Request $request, Car $car) { }

    public function destroy(Car $car) { }
}
