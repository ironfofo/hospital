<?php

use App\Http\Controllers\Admin\AdminDoctorController;
use Illuminate\Support\Facades\Route;



Route::group(["prefix" => "/admin/doctor"], function () {
    Route::get("list", [AdminDoctorController::class, "list"]);
    Route::get("add", [AdminDoctorController::class, "add"]);
    Route::post("insert", [AdminDoctorController::class, "insert"]);
    Route::get("edit/{doctorId}", [AdminDoctorController::class, "edit"]);
    Route::post("update", [AdminDoctorController::class, "update"]);
    Route::post("delete", [AdminDoctorController::class, "delete"]);
});