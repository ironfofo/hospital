<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Professional\Professional;
use Illuminate\Http\Request;

class FrontProfessionalController extends Controller
{
    public function list()
    {
        $list=new Professional()->get();
    }

}
