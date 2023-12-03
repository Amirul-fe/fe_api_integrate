<?php

use App\Http\Controllers\flight\v1\FlightController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(FlightController::class)->group(function () {

    Route::post('/create-token', 'createToken');
    Route::get('/search', 'flightSearch');
    Route::get('/price', 'price');
    Route::get('/fare-rules', 'fareRules');
    Route::put('/save-travellers', 'saveTraveller');
    Route::post('/book', 'bookTicket');
    Route::post('/ticket', 'storeTicket');
    Route::post('/import-pnr', 'pnrImport');

});
