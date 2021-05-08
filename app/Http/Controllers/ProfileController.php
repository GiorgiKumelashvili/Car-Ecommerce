<?php

namespace App\Http\Controllers;


use App\Models\Car;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller {
    public function announcements(): Renderable {
        $user = Auth::user();
        $cars = Car::where('user_id', $user->id)->paginate(6);
        // $cars = Car::where('user_id', $user->id)->paginate(12);

        return view('user.announcments', ['user' => $user, 'cars' => $cars]);
    }
}
