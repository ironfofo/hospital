<?php


use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;


Route::group(["prefix" => "member/"], function () {
    Route::get("login", [MemberController::class, "login"]);
    Route::post("doLogin", [MemberController::class, "doLogin"]);
    Route::get("register", [MemberController::class, "register"]);
    Route::post("doRegister", [MemberController::class, "doRegister"]);
    Route::post("checkUser", [MemberController::class, "checkUser"]);
    Route::get("list", [MemberController::class, "list"]);
    Route::get("add", [MemberController::class, "add"]);
    Route::post("insert", [MemberController::class, "insert"]);
    Route::get("edit/{id}", [MemberController::class, "edit"]);
    Route::post("update", [MemberController::class, "update"]);
    Route::post("delete", [MemberController::class, "delete"]);
});

