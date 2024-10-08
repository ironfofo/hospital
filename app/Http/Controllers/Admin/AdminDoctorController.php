<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Photo\Upload;
use App\Models\Doctor;
use App\Models\Professional\Professional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminDoctorController extends Controller
{
    public function list()
    {
        $list=(new Doctor)->getList();
        return view("admin.doctor.list",compact("list"));
    }

    public function add(Request $req)
    {
        $list=Professional::get();
        return view("admin.doctor.add", compact("list"));
    }

    public function insert(Request $req)
    {
        
        $doctor = new Doctor();
        // 如果有上傳圖
        if (!empty($req->photo)) {
            //取得上傳後的檔名
            $fileName = (new Upload())->uploadPhoto($req->photo, "images/doctor", false, "", "", true, 100, 100);
            $doctor->photo = $fileName;
        }

        $doctor->doctorName = $req->doctorName;
        $doctor->doctorId = $req->doctorId;
        $doctor->position = $req->position;
        $doctor->edu = $req->edu;
        $doctor->typeId = $req->typeId;
        $doctor->content = $req->content;

        $doctor->save();
        Session::flash("message", "已新增");
        return redirect("/admin/doctor/list");
        dd($fileName);
    }

    public function edit(Request $req)
    {
        $doctor=Doctor::find($req->doctorId);
        $pr=Professional::get();
        return view("admin.doctor.edit", compact("doctor","pr"));
        
    }

    public function update(Request $req)
    {
        $photo = $req->photo;
        $doctor = Doctor::find($req->doctorId);
        //如果要變更圖檔
        if (!empty($photo)) {
            $fileName = (new Upload())->uploadPhoto($req->photo, "images/doctor", false, "", "", true, 100, 100);

            if (!empty($doctor->photo)) {
                @unlink("images/doctor/" . $doctor->photo);
            }
            //圖檔設定新的檔名
            $doctor->photo = $fileName;
        }
        $doctor->doctorId = $req->doctorId;
        $doctor->doctorName = $req->doctorName;
        $doctor->position = $req->position;
        $doctor->edu = $req->edu;
        $doctor->typeId = $req->typeId;
        $doctor->content = $req->content;
        $doctor->update();

        Session::flash("message", "已修改");
        return redirect("/admin/doctor/list");
    }

    public function delete(Request $req)
    {
        $ids = $req->doctorId;
        foreach ($ids as $id) {
            $doctor = Doctor::find($id);
            if (!empty($doctor->photo)) {
                @unlink("images/doctor/" . $doctor->photo);
            }
            $doctor->delete();
        }

        Session::flash("message", "已刪除");
        return redirect("/admin/doctor/list");
    }
}
