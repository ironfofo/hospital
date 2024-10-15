<?php

namespace App\Models;

use Carbon\Carbon;
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
        "dates",
        "timeId",
        "petName",
        "createTime",
    ];

    public function BookingList()
    {
        $list = DB::table('booking AS a')
        ->selectRaw('a.*,b.doctorName,c.userName,d.time_period')
        ->leftJoin('doctor AS b', 'b.doctorId', 'a.doctorId')
        ->leftJoin('member AS c', 'c.userId', 'a.userId')
        ->leftJoin('times AS d', 'd.timeId', 'a.timeId')
        ->paginate(10);

        return $list;
    }

    // 計算特定日期和時間的預約數量
    public function bookingCount($timeId,$date ,$doctorId)
    {
            return self::where('dates', $date)
                ->where('timeId', $timeId)
                ->where('doctorId', $doctorId)
                ->count();
    }
}

