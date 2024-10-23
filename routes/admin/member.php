<?php

use App\Http\Controllers\Admin\AdminChartJsController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;


Route::group(["middleware"=>"manager","prefix" => "/admin/member"], function () {

    Route::get("list", [MemberController::class, "list"]);
    Route::get("add", [MemberController::class, "add"]);
    Route::post("insert", [MemberController::class, "insert"]);
    Route::get("edit/{id}", [MemberController::class, "edit"]);
    Route::post("update", [MemberController::class, "update"]);
    Route::post("delete", [MemberController::class, "delete"]);
    Route::post("prmUpdate", [MemberController::class, "prmUpdate"]);
});

Route::group(["prefix" => "/admin/chartJs"], function () {
    Route::get("list", [AdminChartJsController::class, "list"]);
    Route::get("getList", [AdminChartJsController::class, "getList"]);
});
