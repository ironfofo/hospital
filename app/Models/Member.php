<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Member extends Model
{
    public $timestamps=false;
    protected $table="member";
    protected $primaryKey="id";
    protected $fillable=[
        "id",
        "userName",
        "email",
        "phone",
        "adr",
        "bir",
        "userId",
        "pwd",
        "petId",
        "prm",
        "createTime",
    ];


    //用於驗證帳號是否重複
    public function checkUser($userId)
    {
        //self:資料本身，在Member這個class的資
        //first:取締一筆資料
        $member=self::where("userId",$userId)->first();
        return $member;
    }

    //用於會用會員清單
    public function getList()
    {
        $list = DB::table('member AS a')
                    ->selectRaw('a.*, b.prmTitle, b.icon,b.text_color')
                    ->join('prm_list AS b', 'b.prm', 'a.prm')
                    ->paginate(15);
        return $list;
    }

    //用於驗證密碼
    public function getMember($userId,$pwd)
    {
        // self指table本身 ::是物件
        $member = self::where("userId",$userId)->where("pwd",$pwd)->first();

        return $member;
    }

    //用於計算會員等級人數
    public function chartJs()
    {
        $list = DB::table('member')
        ->select(DB::raw('COUNT(prm) as prmcount'), 'prm as level')
        ->groupBy('prm')
        ->get();
        return $list;
    }
}

