<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Professional\Professional;
use App\Models\Professional\Professional_layer1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminProfessionalLayer1 extends Controller
{
    public function list()
    {

        $professional=(new Professional)->getList();
        $professional_layer1=Professional_layer1::get();
        return view("admin.professional.professional_layer1.list",compact("professional","professional_layer1"));
    }
    public function add(Request $req)
    {
        $list=Professional_layer1::get();
        return view("admin.professional.professional_layer1.add", compact("list"));
    }

    public function insert(Request $req)
    {
        
        $pro = new Professional_layer1();
        $pro->department = $req->department;
        $pro->lan = $req->lan;

        $pro->save();
        Session::flash("message", "已新增");
        return redirect("/admin/professional/professional_layer1/list");
    }

    public function edit(Request $req)
    {
        $pro=Professional_layer1::find($req->typeId);
        return view("admin.professional.professional_layer1.edit", compact("pro"));
        
    }

    public function update(Request $req)
    {
        $pro=Professional_layer1::find($req->typeId);

        $pro->department = $req->department;
        $pro->lan = $req->lan;

        $pro->update();

        Session::flash("message", "已修改");
        return redirect("/admin/professional/professional_layer1/list");
    }

    public function delete(Request $req)
    {
        if ($req->has("typeId")) {
            // 刪除選取的 timeId
            Professional_layer1::whereIn("typeId", $req->input("typeId"))->delete();
            Session::flash("message", "已刪除");
        }
        return redirect("/admin/professional/professional_layer1/list");

    }
}
