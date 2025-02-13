<?php

use App\Http\Controllers\Front\FrontIndexController;
use Illuminate\Support\Facades\Route;

require "booking.php";
require "doctor.php";
require "member.php";


Route::group(["prefix" => "/"], function () {
    Route::get("", [FrontIndexController::class, "index"]);

});