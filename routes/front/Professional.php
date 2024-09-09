<?php

use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;


// Route::get('/Professional', function () {
//     return view("front.Professional.list");
// });

Route::get("booking/list",[BookingController::class,"list"]);
Route::post("booking/booking",[BookingController::class,"booking"]);


