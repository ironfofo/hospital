<?php

use App\Http\Controllers\Front\FrontContactController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;


Route::group(["prefix" => "contact/"], function () {
    Route::get("list", [FrontContactController::class, "list"]);

});

