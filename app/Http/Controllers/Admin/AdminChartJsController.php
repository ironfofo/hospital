<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;

class AdminChartJsController extends Controller
{
    public function list()
    {
        $list=(new Member())->chartJs();
        return view("admin/member/chartJs",compact("list"));
    }
    public function getList()
    {
        $getList=(new Member())->chartJs();
        return $getList;
    }
}
