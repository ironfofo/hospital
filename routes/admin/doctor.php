<?php

use App\Http\Controllers\Admin\AdminDoctorController;
use App\Http\Controllers\Admin\AdminDoctorRestController;
use Illuminate\Support\Facades\Route;



Route::group(["prefix" => "/admin/doctor"], function () {
    Route::get("list", [AdminDoctorController::class, "list"]);
    Route::get("add", [AdminDoctorController::class, "add"]);
    Route::post("insert", [AdminDoctorController::class, "insert"]);
    Route::get("edit/{doctorId}", [AdminDoctorController::class, "edit"]);
    Route::post("update", [AdminDoctorController::class, "update"]);
    Route::post("delete", [AdminDoctorController::class, "delete"]);

    Route::group(["prefix" => "doctorrest"], function () {
        Route::get("list", [AdminDoctorRestController::class, "list"]);
        Route::get("add", [AdminDoctorRestController::class, "add"]);
        Route::post("insert", [AdminDoctorRestController::class, "insert"]);
        Route::get("edit", [AdminDoctorRestController::class, "edit"]);
        Route::post("update", [AdminDoctorRestController::class, "update"]);
        Route::post("delete", [AdminDoctorRestController::class, "delete"]);
    });
});