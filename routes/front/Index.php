<?php

use Illuminate\Support\Facades\Route;

require "Member.php";
require "Booking.php";

Route::get('/', function () {
    return view("front.index");
});