<?php


use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;


Route::group(["prefix" => "member/"], function () {
    Route::get("login", [MemberController::class, "login"]);
    Route::post("doLogin", [MemberController::class, "doLogin"]);
    Route::get("register", [MemberController::class, "register"]);
    Route::post("doRegister", [MemberController::class, "doRegister"]);
    Route::post("checkUser", [MemberController::class, "checkUser"]);
});

// Route::get("login", [MemberController::class, "login"]);
// Route::post("doLogin", [MemberController::class, "doLogin"]);