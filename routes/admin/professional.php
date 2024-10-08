<?php

use App\Http\Controllers\Admin\AdminDoctorController;
use App\Http\Controllers\Admin\AdminProfessionalController;
use Illuminate\Support\Facades\Route;



Route::group(["prefix" => "/admin/professional"], function () {
    Route::get("list", [AdminProfessionalController::class, "list"]);
    Route::get("add", [AdminProfessionalController::class, "add"]);
    Route::post("insert", [AdminProfessionalController::class, "insert"]);
    Route::get("edit/{typeId}", [AdminProfessionalController::class, "edit"]);
    Route::post("update", [AdminProfessionalController::class, "update"]);
    Route::post("delete", [AdminProfessionalController::class, "delete"]);
});