<?php

namespace App\Http\Controllers;


use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller {
    public function index(): Renderable {
        $user = Auth::user();

        return view('user.profile', ['user' => $user]);
    }
}
