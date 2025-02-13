<?php


use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;

//前端登入、登出、註冊用
Route::group(["prefix" => "member/"], function () {
    Route::get("login", [MemberController::class, "login"]);
    Route::post("doLogin", [MemberController::class, "doLogin"]);
    Route::get("register", [MemberController::class, "register"]);
    Route::post("doRegister", [MemberController::class, "doRegister"]);
    Route::post("checkUser", [MemberController::class, "checkUser"]);
    Route::post("logOut", [MemberController::class, "logOut"]);

});

