<?php

namespace App\Http\Controllers;


use App\Models\Car;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller {
    public function announcements(): Renderable {
        $user = Auth::user();
        $cars = Car::where('user_id', $user->id)->paginate(6);

        return view('user.announcments', ['user' => $user, 'cars' => $cars]);
    }

    public function profile(): Renderable {
        return view('user.profile_details', ['user' => Auth::user()]);
    }

    public function announcementDelete(Request $request) {
        $data = $request->validate(['id' => 'required']);

        // get car
        $car = Car::where('id', $data['id'])->first();

        // get car details
        $details = $car->details()->first();

        // get car images and delete others including images
        DB::table('images')->where('car_details_id', $details->id)->delete();
        $car->delete();
        $details->delete();

        return redirect()->route('profileAnnouncements');
    }

    public function profileChange() {
        dd(request()->all());
    }
}
