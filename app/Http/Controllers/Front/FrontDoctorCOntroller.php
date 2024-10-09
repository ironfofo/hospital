<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;

class FrontDoctorCOntroller extends Controller
{
    public function list()
    {
        $doctor=Doctor::get();

        return view("front.doctor.list",compact("doctor"));
    }
}
