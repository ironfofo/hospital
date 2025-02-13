<?php

use App\Http\Controllers\Admin\AdminBookingController;
use App\Http\Controllers\Front\FrontScheduleController;
use Illuminate\Support\Facades\Route;


Route::get('professional', function () {
    return view("front.Professional.list");
});


Route::group(["prefix" => "/admin/booking"], function () {
    Route::get("list", [AdminBookingController::class, "list"]);

    Route::get("add", [AdminBookingController::class, "add"]);
    Route::post("insert", [AdminBookingController::class, "insert"]);
    Route::get("edit/{id}", [AdminBookingController::class, "edit"]);
    Route::post("update", [AdminBookingController::class, "update"]);
    Route::post("delete", [AdminBookingController::class, "delete"]);
});