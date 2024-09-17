<?php

use Illuminate\Support\Facades\Route;

require "member.php";
require "booking.php";

Route::get('/', function () {
    return view("front.index");
});