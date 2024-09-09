<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Booking extends Model
{
    public $timestamps=false;
    protected $table="booking";
    protected $primaryKey="id";
    protected $fillable=[
        "id",
        "userId",
        "doctorId",
        "createTime",
    ];

    public function bookingList()
    {
        $list = DB::table('booking AS a')
        ->selectRaw('a.*,b.doctorName')
        ->join('doctor AS b', 'b.doctorId', 'a.doctorId')
        ->join('member AS c', 'c.userId', 'a.userId')
        ->join('schedule AS d', 'd.dates', 'a.dates')
        ->join('timelist AS e', 'e.times', 'a.times')
        ->get();

        return $list;
    }
}

