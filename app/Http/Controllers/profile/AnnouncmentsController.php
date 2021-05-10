<?php /** @noinspection SqlNoDataSourceInspection */
/** @noinspection SqlResolve */

/** @noinspection PhpUndefinedFieldInspection */

namespace App\Http\Controllers\profile;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\CarDetails;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AnnouncmentsController extends Controller {
    /**
     * announcments showing page
     */
    public function index(): Renderable {
        $user = Auth::user();
        $cars = Car::where('user_id', $user->id)->paginate(6);

        return view('user.announcments', ['user' => $user, 'cars' => $cars]);
    }

    /**
     * announcment create page
     */
    public function create() {
        return view('user.announcments_add', ['user' => Auth::user()]);
    }

    /**
     * announcment images create page
     */
    public function createImages($detailID, $carID) {
        return view('user.announcments_add_img', [
            'user' => Auth::user(),
            'detailID' => $detailID,
            'carID' => $carID
        ]);
    }

    /**
     * announcment store method
     */
    public function store(Request $request): RedirectResponse {
        $currentYear = date('Y');

        $request->validate([
            "price" => "required|integer|max:2000000000",
            "engine" => "required|numeric|between:0,40.0",
            "year" => "required|integer|min:1970|max:$currentYear",
            "manufacturer" => "required",
            "category" => "required",
            "wheel_side" => "required",
            "gearbox" => "required",
            "fuel_type" => "required",
            "levied" => "required",
            "distance" => "required|integer|max:2000000000",
            "vin_code" => "required|size:17|unique:car_details",
            "color" => "required",
            "cylinders" => "required",
            "model" => "required",
            "description" => "min:3|max:1000" // optional
        ]);

        $request->merge(['levied' => $request->levied === 'true']);

        // first create car details
        CarDetails::create([
            "is_levied" => $request->levied,
            "category" => $request->category,
            "manufacturer" => $request->manufacturer,
            "model" => $request->model,
            "release_year" => $request->year,
            "fuel_type" => $request->fuel_type,
            "engine_capacity" => $request->engine,
            "cylinders" => $request->cylinders,
            "gear_box" => $request->gearbox,
            "wheel_side" => $request->wheel_side,
            "color" => $request->color,
            "vin_code" => $request->vin_code,
            "description" => $request->description ?? '',
            "created_at" => date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s')
        ]);
//
        $details = CarDetails::where('vin_code', $request->vin_code)->first();

        // create car (with image not found and car details id)
        Car::create([
            "name" => "$details->manufacturer $details->model",
            "price_usd" => $request->price,
            "distance" => $request->distance,
            "img_url" => config('carDetails.no_image'),
            "car_details_id" => $details->id,
            "user_id" => Auth::user()->id,
            "created_at" => date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s')
        ]);

        $car = Car::where('car_details_id', $details->id)->first()->id;

        return redirect()->route('announcement.create.images', [
            'detailID' => $details->id,
            'carID' => $car
        ]);
    }

    public function storeImages(Request $request): JsonResponse {
        $request->validate([
            "images" => "required|array|min:1|max:12",
            "detailID" => "required",
            "carID" => "required"
        ]);

        foreach ($request->images as $url) {
            DB::insert('
                insert into images (url, car_details_id, created_at, updated_at) values (?, ?, ?, ?)',
                [$url, $request->detailID, date('Y-m-d H:i:s'), date('Y-m-d H:i:s')]
            );
        }

        // update main image on user with no car image
        Car::find($request->carID)->update([
            'img_url' => $request->images[0]
        ]);

        return response()->json(['message' => 'images added succesfuly']);
    }

    /**
     * announcment delete method
     */
    public function destroy(Request $request): RedirectResponse {
        $data = $request->validate(['id' => 'required']);

        // get car
        $car = Car::where('id', $data['id'])->first();

        // get car details
        $details = $car->details()->first();

        // get car images and delete others including images
        DB::table('images')->where('car_details_id', $details->id)->delete();
        $car->delete();
        $details->delete();

        return redirect()->route('announcements.index');
    }
}
