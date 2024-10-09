<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Doctor extends Model
{
    public $timestamps = false;
    protected $table = "doctor";
    protected $primaryKey = "doctorId";
    protected $fillable = [
        "doctorId",
        "doctorName",
        "position",
        "edu",
        "typeId",
        "content",
        "photo",
        "createTime",
    ];

    public function getList()
    {
        $list = DB::table('doctor AS a')
        ->selectRaw('a.*,b.department,b.lan')
        ->leftJoin('professional AS b', 'b.typeId', 'a.typeId')
        ->paginate(10);

        return $list;
    }
}
