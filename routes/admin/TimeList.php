<?php

use App\Http\Controllers\Admin\AdminTimesController;
use Illuminate\Support\Facades\Route;



Route::group(["middleware"=>"manager","prefix" => "/admin/TimeList"], function () {
    Route::get("list", [AdminTimesController::class, "list"]);
    Route::get("add", [AdminTimesController::class, "add"]);
    Route::post("insert", [AdminTimesController::class, "insert"]);
    Route::get("edit/{timeId}", [AdminTimesController::class, "edit"]);
    Route::post("update", [AdminTimesController::class, "update"]);
    Route::post("delete", [AdminTimesController::class, "delete"]);
});