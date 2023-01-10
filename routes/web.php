<?php

use App\Http\Controllers\CityController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::prefix('cms/admin')->group(function(){

    Route::view('' , 'cms.parent');
    Route::view('temp' , 'cms.template');
    Route::resource('countries' , CountryController::class);
    Route::post('countries_update/{id}' , [CountryController::class , 'update'])->name('countries_update');

    Route::resource('cities' , CityController::class);
    Route::post('cities_update/{id}' , [CityController::class , 'update'])->name('cities_update');

});
