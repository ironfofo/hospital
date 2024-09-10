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
        "prtId",
        "createTime",
    ];

        public function checkUser($userId)
    {
        //self:資料本身，在Member這個class的資
        //first:取締一筆資料
        $member=self::where("userId",$userId)->first();
        return $member;
    }

    public function getList()
    {
        $list=DB::table("member")->paginate(15);
        return $list;
    }

    public function getMember($userId,$pwd)
    {
        // self指table本身 ::是物件
        $member = self::where("userId",$userId)->where("pwd",$pwd)->first();

        return $member;
    }
}

