<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller {
    // no need for middleware
    public function index(): Renderable {
        return view('home');
    }

    public function carCatalogue(): Renderable {
        return view('car.car_catalogue');
    }

    public function carDetailedView($id): Renderable {
        return view('car.car_detailed_view', ['id' => $id]);
    }
}
