<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // public function index()
    // {
    //     return view("admin.index");
    // }

    // public function login(Request $req)
    // {
    //     if (captcha_check($req->code) == false)
    //     {
    //         // back()退回上衣葉 withInput()保留原原始資料 
    //         return back()->withInput()->withErrors(["code" => "驗證碼錯誤"]);
    //     }

    //     $manager = (new Manager())->getManager($req->userId,$req->pwd);

    //     if(empty($manager))
    //     {
    //         return back()->withInput()->withErrors(["error"=>"帳號或密碼錯誤"]);
    //         exit;
    //     }
    //     // 儲存項目到session中，以manager為管理者名稱儲存$manager->userId
    //     session()->put("manager",$manager->userId);
    //     return redirect("/admin/home");
    // }

    public function home()
    {
        return view("admin.home");
    }
}
