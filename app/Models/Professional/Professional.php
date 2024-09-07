<?php

namespace App\Models\Professional;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Professional extends Model
{
    public $timestamps=false;
    protected $table="professional";
    protected $primaryKey="id";
    protected $fillable=[
        "id",
        "department",
        "createTime",
    ];

    public function list($id)
    {
        $list = DB::table("professional AS a")
            ->selectRaw("a.*,b.title as types")
            ->join("news_type AS b", "a.typeId", "b.id")
            ->where("a.id",$id)
            ->first();

        return $list;
    }
}