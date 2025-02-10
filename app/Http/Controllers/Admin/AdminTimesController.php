<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TimeList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminTimesController extends Controller
{
    public function list()
    {
        $list=TimeList::get();
        return view("admin.booking.TimeList.list",compact("list"));
    }
    public function add(Request $req)
    {
        $list=TimeList::get();
        return view("admin.booking.TimeList.add", compact("list"));
    }

    public function insert(Request $req)
    {
        
        $TimeList = new TimeList();
        $TimeList->time_period = $req->timeperiod;
        $TimeList->time_start = $req->timestart;
        $TimeList->time_end = $req->timeend;
       


        $TimeList->save();
        Session::flash("message", "已新增");
        return redirect("/admin/booking/TimeList/list");
    }

    public function edit(Request $req)
    {
        $TimeList=TimeList::find($req->timeId);
        return view("admin.booking.TimeList.edit", compact("TimeList"));
        
    }

    public function update(Request $req)
    {
        $TimeList=TimeList::find($req->timeId);
        $TimeList->time_period = $req->timeperiod;
        $TimeList->time_start = $req->timestart;
        $TimeList->time_end = $req->timeend;

        $TimeList->update();

        Session::flash("message", "已修改");
        return redirect("/admin/booking/TimeList/list");
    }

    public function delete(Request $req)
    {
        if ($req->has("timeId")) {
            // 刪除選取的 timeId
            TimeList::whereIn("timeId", $req->input("timeId"))->delete();
            Session::flash("message", "已刪除");
        }
        return redirect("/admin/booking/TimeList/list");
    }
}
