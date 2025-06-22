<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\PrmList;
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
        if (captcha_check($req->code) == false) {
            return back()->withInput()->withErrors(["code" => "驗證碼錯誤"]);
            exit;
        }


        $member = (new Member())->getMember($req->userId, $req->pwd);
        if ($member === null) {
            //back():可到前一頁
            //withInput:保留前一頁輸入資料
            //withErrors:回傳錯誤資訊到前一頁
            return back()->withInput()->withErrors(["msg" => "帳戶或密碼錯誤"]);
        } else {
            if ($member->state == 0) {
                session()->put("state", $member->state);
                return back()->withInput()->withErrors(["msg" => "帳戶已停用"]);
            }else{
                session()->put("state", $member->state);

                //系統站存，在config/session裡有設定
                // 另外寫在CheckManager
                echo '{"message","成功"}';
                session()->put("userId", $req->userId);
                //帳密符合，轉址
                return response()->json(['message' => '登入成功']);
            }

        }
    }

    public function logOut()
    {
        session()->forget("state");
        session()->forget("userId");
        return response()->json(['message' => '登出成功']);
    }

    public function register()
    {
        $list = Member::get();
        return view("front.member.register", compact("list"));
    }

    public function doRegister(Request $req)
    {
        $member = new Member();
        $member->userName = $req->userName;
        $member->email = $req->email;
        $member->phone = $req->phone;
        $member->adr = $req->adr;
        $member->bir = $req->bir;
        $member->userId = $req->userId;
        $member->pwd = $req->pwd1;
        $member->save();
        Session::flash("message", "註冊成功");
        return redirect("/");
    }

    public function checkUser(Request $req)
    {
        $member = (new Member())->checkUser($req->userId);
        if (!empty($member)) {
            echo ("exist");
        }
    }


    public function list()
    {
        $list = (new Member())->getList();
        return view("admin.member.list", compact("list"));
    }


    public function add()
    {
        $list = Member::get();
        return view("admin.member.add", compact("list"));
    }

    //Request接收資料 定義為$req
    public function insert(Request $req)
    {
        $member = new Member();
        $member->userName = $req->userName;
        $member->email = $req->email;
        $member->phone = $req->phone;
        $member->adr = $req->adr;
        $member->bir = $req->bir;
        $member->userId = $req->userId;
        $member->pwd = $req->pwd;
        $member->save();
        

        Session::flash("message", "已新增");
        //redirect轉址
        return redirect("/admin/member/list");
    }

    public function edit(Request $req)
    {
        $member = Member::find($req->id);
        $prm = PrmList::get();

        return view("admin.member.edit", compact("member","prm"));
    }

    public function update(Request $req)
    {
        //find找尋相對應資料
        $member = Member::find($req->id); 
        $member->userName = $req->userName;
        $member->email = $req->email;
        $member->phone = $req->phone;
        $member->adr = $req->adr;
        $member->bir = $req->bir;
        $member->userId = $req->userId;
        $member->pwd = $req->pwd;
        $member->prm = $req->prm;

        //也可以用$member->update
        $member->save();

        Session::flash("message", "已修改");
        //redirect轉址
        return redirect("/admin/member/list");
    }


    public function state(Request $req)
    {
        $member=Member::find($req->id);
        if($member){
            $member->state=$req->state;
            $member->save();
            return response()->json(['message'=>'no']);
        }
        return response()->json(['message'=>'error'],404);
        
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $list = (new Member())->getList($search);

    
        return view('admin.member.search', compact('list'));
    }
}
