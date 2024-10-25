<?php

namespace App\Models\Professional;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Professional extends Model
{
    public $timestamps=false;
    protected $table="professional";
    protected $primaryKey="typeId";
    protected $fillable=[
        "typeId",
        "department",
        "lan",
        "photo",
        "createTime",
    ];

    public function getList()
    {
        /*
        SELECT a.*, GROUP_CONCAT(b.layer1_name) AS layer1_names
        FROM professional AS a
        LEFT JOIN professional_layer1 AS b ON a.typeId = b.typeId
        GROUP BY a.typeId;
        */

        $list = DB::table('professional AS a')
        ->selectRaw('a.*,GROUP_CONCAT(b.layer1_name) AS layer1_name')   //使用GROUP_CONCAT聚合layer1_name
        ->leftJoin('professional_layer1 AS b','a.typeId','b.typeId' )
        ->groupBy('a.typeId')   //用typeId來分組
        ->paginate(10);

        return $list;
    }

}