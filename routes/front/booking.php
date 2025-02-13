<?php


use App\Http\Controllers\Front\FrontScheduleController;
use Illuminate\Support\Facades\Route;


Route::get('professional', function () {
    return view("front.Professional.list");
});


Route::group(["prefix" => "/schedule"], function () {
    Route::get("list", [FrontScheduleController::class, "list"])->name('schedule.list');
    // Route::post("booking", [FrontScheduleController::class, "booking"]);
    Route::post("booking/insert", [FrontScheduleController::class, "doBooking"]);
    Route::post("booking/rest", [FrontScheduleController::class, "rest"]);
});

