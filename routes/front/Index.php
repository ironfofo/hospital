<?php

use Illuminate\Support\Facades\Route;

require "Member.php";
require "booking.php";

Route::get('/', function () {
    return view("front.index");
});