<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MemberController extends Controller
{

    public function login()
    {
        
        return view("front.member.login");
    
    }

    public function doLogin(Request $req)
    {
        if(captcha_check($req->code)==false)
        {
            return back()->withInput()->withErrors(["code"=>"驗證碼錯誤"]);
            exit;
            
        }


        $member=(new Member())->getMember($req->userId,$req->pwd);
        if($member===null)
        {
            //back():可到前一頁
            //withInput:保留前一頁輸入資料
            //withErrors:回傳錯誤資訊到前一頁
            return back()->withInput()->withErrors(["msg" => "帳戶或密碼錯誤"]);
        }else{
            //系統站存，在config/session裡有設定
            // 另外寫在CheckManager
            
            echo '{"message","成功"}';
            session()->put("managerId",$req->userId);
            //帳密符合，轉址
            // return redirect("/booking/list");
        }
    }

    public function register()
    {
        $list=Member::get();
        return view("register",compact("list"));
    }

    public function doRegister(Request $req)
    {
        $member=new Member();

        $member->userName=$req->userName;
        $member->email=$req->email;
        $member->phone=$req->phone;
        $member->adr=$req->adr;
        $member->bir=$req->bir;
        $member->userId=$req->userId;
        //*記得blade要寫function()，確認密碼兩次
        $member->pwd=$req->pwd1;
        $member->save();
        Session::flash("message","註冊成功");
        return redirect("front/index");
    }

    public function list()
    {
        //$list變數名稱
        //Member:Model
        //get:取回資料，也可用all取全部資料
        //$list=Member::取得所有資料() paginate資料幾筆，10是十筆資料為一頁;
        $list=(new Member())->getList();
        
        
        //member.list:member是資料夾，list是檔名
        //view的附檔名為:.blade.php
        //compact將取得的資料打包傳置網頁
        //compact中用引號，沒有$
        return view("member.list", compact("list"));
    }

    public function add()
    {
        $list=City::get();
        return view("member.add",compact("list"));
    }
    //Request接收資料 定義為$req
    public function insert(Request $req)
    {
        $member=new Member();
        $member->userId=$req->userId;
        $member->pwd=$req->pwd;
        $member->userName=$req->userName;
        $member->mobile=$req->mobile;
        $member->city=$req->city;

        $member->save();
        
        //.ajax是邊打邊存
        //google的cookie是將資料留在個人電腦
        //暫存網頁伺服器一段時間，時間一到歸0 ，congfig/seension有設定時間
        //flash快閃儲存一次
        Session::flash("message","已新增");
        //redirect轉址
        return redirect("/member/list");
        
    }

    public function edit(Request $req)
    {   
        //$req->id的id自己輸入的值
        //如果路由參數為ABC 就要更改$req->ABC
        //find:尋找
        $member=Member::find($req->id);
        $list=City::get();

        return view("member.edit",compact("member","list"));
    }

    public function update(Request $req)
    {
        //find找尋相對應資料
        $member=Member::find($req->id);
        $member->userId=$req->userId;
        $member->pwd=$req->pwd;
        $member->userName=$req->userName;
        $member->mobile=$req->mobile;
        $member->city=$req->city;

        //也可以用$member->update
        $member->save();

        Session::flash("message","已修改");
        //redirect轉址
        return redirect("/member/list");   
    }
    public function delete(Request $req)
    {
        Member::find($req->id)->delete();
        echo("ok");

    }
    public function checkUser(Request $req)
    {
        $member=(new Member())->checkUser($req->userId);
        if(!empty($member))
        {
            echo("exist");
        }
    }
}
