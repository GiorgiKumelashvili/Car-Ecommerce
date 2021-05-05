<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/car_catalogue', [App\Http\Controllers\HomeController::class, 'carCatalogue'])->name('carCatalogue');
Route::get('/car_detailed_view/{id}', [App\Http\Controllers\HomeController::class, 'carDetailedView'])->name('carDetailedView');


/*
 * em: gio@gio.com
 * ps: giusha123
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
