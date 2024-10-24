<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Professional\Professional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminProfessionalController extends Controller
{
    public function list()
    {
        $list=Professional::get();
        return view("admin.professional.professional.list",compact("list"));
    }
    public function add(Request $req)
    {
        $list=Professional::get();
        return view("admin.professional.professional.add", compact("list"));
    }

    public function insert(Request $req)
    {
        
        $pro = new Professional();
        $pro->department = $req->department;
        $pro->lan = $req->lan;

        $pro->save();
        Session::flash("message", "已新增");
        return redirect("/admin/professional/professional/list");
    }

    public function edit(Request $req)
    {
        $pro=Professional::find($req->typeId);
        return view("admin.professional.professional.edit", compact("pro"));
        
    }

    public function update(Request $req)
    {
        $pro=Professional::find($req->typeId);

        $pro->department = $req->department;
        $pro->lan = $req->lan;

        $pro->update();

        Session::flash("message", "已修改");
        return redirect("/admin/professional/professional/list");
    }

    public function delete(Request $req)
    {
        if ($req->has("typeId")) {
            // 刪除選取的 timeId
            Professional::whereIn("typeId", $req->input("typeId"))->delete();
            Session::flash("message", "已刪除");
        }
        return redirect("/admin/professional/professional/list");

    }

}
