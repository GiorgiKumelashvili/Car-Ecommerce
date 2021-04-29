<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller {
    // no need for middleware
    public function index(): Renderable {
        return view('home');
    }
}
