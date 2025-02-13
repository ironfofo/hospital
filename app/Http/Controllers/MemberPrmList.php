<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PrmList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MemberPrmList extends Controller
{
    public function list()
    {
        $list=PrmList::get();
        return view("admin.member.prm.list",compact("list"));
    }
    public function add(Request $req)
    {
        $list=PrmList::get();
        return view("admin.member.prm.add", compact("list"));
    }

    public function insert(Request $req)
    {
        
        $prm = new PrmList();
        $prm->prm = $req->prm;
        $prm->prmTitle = $req->prmTitle;

        $prm->save();
        Session::flash("message", "已新增");
        return redirect("/admin/member/prm/list");
    }

    public function edit(Request $req)
    {
        $prm=PrmList::find($req->id);
        return view("admin.member.prm.edit", compact("prm"));
        
    }

    public function update(Request $req)
    {
        $prm=PrmList::find($req->id);

        $prm->prm = $req->prm;
        $prm->prmTitle = $req->prmTitle;

        $prm->update();

        Session::flash("message", "已修改");
        return redirect("/admin/member/prm/list");
    }

    public function delete(Request $req)
    {
        if($req->has("id"))
        {
        PrmList::wherein("id",$req->id)->delete();
        Session::flash("message","已刪除");
        }

        return redirect("/admin/member/prm/list");
    }
}
