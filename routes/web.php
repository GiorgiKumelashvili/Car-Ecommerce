<?php

use App\Http\Controllers\CarDetailsController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();
Route::get('/', [CarController::class, 'index'])->name('home');
Route::get('/home', [CarController::class, 'index'])->name('home');
Route::get('/home/catalogue', [CarController::class, 'catalogue'])->name('carCatalogue');
Route::get('/car/{id}', [CarDetailsController::class, 'index'])->name('carDetailedView');
Route::view('/contact', 'contact')->name('contactUs');
Route::view('/help', 'help')->name('help');

Route::get('/profile/announcements', [ProfileController::class, 'announcements'])->name('profileAnnouncements');
Route::post('/profile/announcements/delete', [ProfileController::class, 'announcementDelete'])->name('announcementDelete');

Route::get('/profile/details', [ProfileController::class, 'profile'])->name('profileDetails');
//Route::post('/profile/details', [ProfileController::class, 'profileChange'])->name('profileChange');


/*
 * todo Insert (!!!!!!)
 * todo delete images from firebase as well (!!!!)
 * todo description detalur naxvaze (!!)
 *
 * todo merec mixedav
 * todo (responsivnes: home page, car details, car catalogue[+], user profile)
 * todo dafavoriteba
 *
 * em: giorgi@giorgi.com
 * ps: giorgi123
 *
 * https://www.myauto.ge/ka/
 * https://undraw.co/illustrations
 *
 * Bodystyle Search ro aris maqedan daascrape
 * https://www.cars.com/shopping/
 *
 * (top)
 * https://dribbble.com/shots/14756705-Carbase-Redesign-Car-shop
 *
 * (bottom)
 * https://dribbble.com/shots/14764444-Car-Catalogue-Carent-purple-ver
 */


/*
Route::get('/seed-users-temp', function () {
    $arr = [
        [
            "email" => "giorgi@giorgi.com",
            "username" => "giorgi",
            "password" => "giorgi123"
        ],
        [
            "email" => "luka@luka.com",
            "username" => "luka",
            "password" => "luka123"
        ],
        [
            "email" => "ana@ana.com",
            "username" => "ana",
            "password" => "ana123"
        ],
        [
            "email" => "levani@levani.com",
            "username" => "levani",
            "password" => "levani123"
        ],
        [
            "email" => "nika@nika.com",
            "username" => "nika",
            "password" => "nika123"
        ],
        [
            "email" => "ricardo@ricardo.com",
            "username" => "ricardo",
            "password" => "ricardo123"
        ],
        [
            "email" => "sandro@sandro.com",
            "username" => "sandro",
            "password" => "sandro123"
        ],
        [
            "email" => "mari@mari.com",
            "username" => "mari",
            "password" => "mari123"
        ],
        [
            "email" => "alexi@alexi.com",
            "username" => "alexi",
            "password" => "alexi123"
        ],
        [
            "email" => "jemali@jemali.com",
            "username" => "jemali",
            "password" => "jemali123"
        ]
    ];


    foreach ($arr as $key => $value) {
        User::create([
            'name' => $value['username'],
            'email' => $value['email'],
            'password' => Hash::make($value['password']),
        ]);
    }

});
 */
