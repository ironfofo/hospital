<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Photo\Upload;
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
        // 如果有上傳圖
        if (!empty($req->photo)) {
            //取得上傳後的檔名
            $fileName = (new Upload())->uploadPhoto($req->photo, "images/professional", false, "", "", true, 100, 100);
            $pro->photo = $fileName;
        }
        
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
        $photo = $req->photo;

        //如果要變更圖檔
        if (!empty($photo)) {
            $fileName = (new Upload())->uploadPhoto($req->photo, "images/professional", false, "", "", true, 100, 100);

            if (!empty($doctor->photo)) {
                @unlink("images/professional/" . $pro->photo);
                @unlink("images/professional/S/" . $pro->photo);
            }
            //圖檔設定新的檔名
            $pro->photo = $fileName;
        }

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
