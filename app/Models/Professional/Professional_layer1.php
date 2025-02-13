<?php

namespace App\Models\Professional;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Professional_layer1 extends Model
{
    public $timestamps=false;
    protected $table="professional_layer1";
    protected $primaryKey="id";
    protected $fillable=[
        "id",
        "typeId",
        "layer1_name",
        "createTime",
    ];

    public function getList()
    {
 
        $list = DB::table('professional_layer1 AS a')
        ->selectRaw('a.*, b.typeId')  
        ->leftJoin('professional AS b','a.typeId','b.typeId' )
        ->get();

        return $list;
    }
}