<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Professional\Professional;
use Illuminate\Http\Request;

class FrontProfessionalController extends Controller
{
    public function list()
    {
        $pr=Professional::get();

        return view("front.Professional.list",compact("pr"));
    }

}
