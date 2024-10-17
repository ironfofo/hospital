<?php

use App\Http\Controllers\Admin\AdminDoctorRestController;
use Illuminate\Support\Facades\Route;



Route::group(["prefix" => "/admin/doctorrest"], function () {
    Route::get("list", [AdminDoctorRestController::class, "list"]);
    Route::get("add", [AdminDoctorRestController::class, "add"]);
    Route::post("insert", [AdminDoctorRestController::class, "insert"]);
    Route::get("edit/{doctorId}", [AdminDoctorRestController::class, "edit"]);
    Route::post("update", [AdminDoctorRestController::class, "update"]);
    Route::post("delete", [AdminDoctorRestController::class, "delete"]);
});