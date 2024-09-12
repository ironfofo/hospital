<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\Front\FrontScheduleController;
use Illuminate\Support\Facades\Route;


Route::get('/professional', function () {
    return view("front.Professional.list");
});


Route::group(["prefix" => "booking/"], function () {
Route::get("list",[BookingController::class,"list"]);
Route::post("booking/{date}/{time_id}",[BookingController::class,"booking"]);
});

Route::group(["prefix" => "Schedule"], function () {
    Route::get("list", [FrontScheduleController::class, "list"]);
    Route::get("", [FrontScheduleController::class, "list"]);
});
