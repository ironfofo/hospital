<?php

use App\Http\Controllers\Admin\AdminDoctorController;
use App\Http\Controllers\Admin\AdminProfessionalController;
use App\Http\Controllers\Admin\AdminProfessionalLayer1;
use Illuminate\Support\Facades\Route;



Route::group(["middleware"=>"manager","prefix" => "/admin/professional"], function () {
    Route::group(["prefix" => "professional"], function () {
        Route::get("list", [AdminProfessionalController::class, "list"]);
        Route::get("add", [AdminProfessionalController::class, "add"]);
        Route::post("insert", [AdminProfessionalController::class, "insert"]);
        Route::get("edit/{typeId}", [AdminProfessionalController::class, "edit"]);
        Route::post("update", [AdminProfessionalController::class, "update"]);
        Route::post("delete", [AdminProfessionalController::class, "delete"]);
    });
    Route::group(["prefix" => "professional_layer1"], function () {
        Route::get("list", [AdminProfessionalLayer1::class, "list"]);
        Route::get("add", [AdminProfessionalLayer1::class, "add"]);
        Route::post("insert", [AdminProfessionalLayer1::class, "insert"]);
        Route::get("edit/{id}", [AdminProfessionalLayer1::class, "edit"]);
        Route::post("update", [AdminProfessionalLayer1::class, "update"]);
        Route::post("delete", [AdminProfessionalLayer1::class, "delete"]);
    });
});
