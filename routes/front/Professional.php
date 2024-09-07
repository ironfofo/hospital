<?php
use App\Http\Controllers\Front\FrontAboutController;
use Illuminate\Support\Facades\Route;


Route::get('/about', function () {
    return view("front.Professional.list");
});