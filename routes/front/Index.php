<?php

use Illuminate\Support\Facades\Route;

require "booking.php";
require "doctor.php";
require "member.php";

Route::get('/', function () {
    return view("front.index");
});