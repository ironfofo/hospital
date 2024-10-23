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
        $professional=Professional::get();
        $professional_layer1=Professional_layer1::get();
        return view("admin.professional.professional_layer1.add", compact("professional","professional_layer1"));
    }

    public function insert(Request $req)
    {
        
        $professional_layer1=new Professional_layer1();
        $professional_layer1->typeId = $req->typeId;
        $professional_layer1->layer1_name = $req->layer1_name;

        $professional_layer1->save();
        Session::flash("message", "已新增");
        return redirect("/admin/professional/professional_layer1/list");
    }

    public function edit(Request $req)
    {
        $professional=Professional::get();
        $professional_layer1=Professional_layer1::find($req->id);
        return view("admin.professional.professional_layer1.edit", compact("professional","professional_layer1"));
        
    }

    public function update(Request $req)
    {
        $professional_layer1=Professional_layer1::find($req->id);

        $professional_layer1->typeId = $req->typeId;
        $professional_layer1->layer1_name = $req->layer1_name;

        $professional_layer1->update();

        Session::flash("message", "已修改");
        return redirect("/admin/professional/professional_layer1/list");
    }

    public function delete(Request $req)
    {
        if ($req->has("id")) {
            // 刪除選取的 timeId
            Professional_layer1::whereIn("id", $req->input("id"))->delete();
            Session::flash("message", "已刪除");
        }   
        return redirect("/admin/professional/professional_layer1/list");

    }
}
