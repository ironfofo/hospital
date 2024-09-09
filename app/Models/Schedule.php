<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Schedule extends Model
{
    public $timestamps = false;
    protected $table = "schedule";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "doctorId",
        "dates",
        "timeId",
        "full",
    ];

    public function getList()
    {
        $list = DB::table('schedule AS a')
            ->selectRaw('a.*, b.times')
            ->join('timelist AS b', 'b.id', 'a.timeId')
            ->get();



        return $list;
    }
}
