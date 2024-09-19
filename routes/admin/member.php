<?php

use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;


Route::group(["prefix" => "/admin/member"], function () {

    Route::get("list", [MemberController::class, "list"]);
    Route::get("add", [MemberController::class, "add"]);
    Route::post("insert", [MemberController::class, "insert"]);
    Route::get("edit/{id}", [MemberController::class, "edit"]);
    Route::post("update", [MemberController::class, "update"]);
    Route::post("delete", [MemberController::class, "delete"]);
});