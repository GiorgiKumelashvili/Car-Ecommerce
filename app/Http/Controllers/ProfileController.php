<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller {
    public function edit(): Renderable {
        return view('user.profile_details', ['user' => Auth::user()]);
    }

    public function update() {
        dd(request()->all());
    }
}
