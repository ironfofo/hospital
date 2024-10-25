<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Professional\Professional;
use Illuminate\Http\Request;

class FrontIndexController extends Controller
{
    public function index()
    {
        $professional=Professional::get();

        return view("front.index", compact("professional"));

    }
}
