<?php


use App\Http\Controllers\Front\FrontScheduleController;
use Illuminate\Support\Facades\Route;


Route::get('professional', function () {
    return view("front.Professional.list");
});


Route::group(["prefix" => "/schedule"], function () {
    Route::get("list", [FrontScheduleController::class, "list"]);
    Route::post("booking/{date}}}", [FrontScheduleController::class, "booking"]);
    Route::post("booking/insert", [FrontScheduleController::class, "doBooking"]);
});

// Route::get("/schedule/list", [FrontScheduleController::class, "list"]);
