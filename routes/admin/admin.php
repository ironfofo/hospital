<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "/admin"], function () {
    Route::get("/", [AdminController::class, "index"]);
    Route::post("doLogin", [AdminController::class, "doLogin"]);
    Route::get("home", [AdminController::class, "home"])->middleware("manager");
});
