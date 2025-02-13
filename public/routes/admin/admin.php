<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "/admin"], function () {
    // Route::get("/", [AdminController::class, "index"]);
    // Route::post("login", [AdminController::class, "login"]);
    Route::get("home", [AdminController::class, "home"]);
});
