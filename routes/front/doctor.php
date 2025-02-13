<?php

use App\Http\Controllers\Front\FrontDoctorCOntroller;
use Illuminate\Support\Facades\Route;


Route::group(["prefix" => "/doctor"], function () {
    Route::get("list", [FrontDoctorCOntroller::class, "list"]);

});

